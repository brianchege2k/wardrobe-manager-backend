<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
        // Fetch all items belonging to the authenticated user
        public function index()
        {
            $user = Auth::user(); // Get the authenticated user
            $items = Item::where('user_id', $user->id)->get(); // Fetch only user's items
    
            if ($items->isEmpty()) {
                return response()->json(['message' => 'No items found for this user'], 404);
            }
    
            return response()->json($items, 200);
        }
    // Store a new item
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'size' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'brand' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|integer|min:1',
            'image' => 'nullable|image|max:2048', // Max 2MB image
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('items', 'public');
        }

        $item = Item::create($data);

        return response()->json($item, 201);
    }

    // Show a single item
    public function show($id)
    {
        $item = Item::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        return response()->json($item);
    }

    // Update an item
    public function update(Request $request, $id)
    {
        $item = Item::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'category' => 'sometimes|string|max:255',
            'size' => 'nullable|string|max:50',
            'color' => 'nullable|string|max:50',
            'brand' => 'nullable|string|max:255',
            'price' => 'nullable|numeric|min:0',
            'quantity' => 'nullable|integer|min:1',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $item->image = $request->file('image')->store('items', 'public');
        }

        $item->update($request->except(['image']));

        return response()->json($item);
    }

    // Delete an item
    public function destroy($id)
    {
        $item = Item::where('id', $id)->where('user_id', auth()->id())->firstOrFail();
        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }
        $item->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }
}
