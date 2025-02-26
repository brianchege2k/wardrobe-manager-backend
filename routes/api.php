<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use App\Http\Controllers\ItemController;

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/items', [ItemController::class, 'index']);  // Get all items
    Route::post('/items', [ItemController::class, 'store']); // Add an item
    Route::get('/items/{id}', [ItemController::class, 'show']); // Get a single item
    Route::put('/items/{id}', [ItemController::class, 'update']); // Update an item
    Route::delete('/items/{id}', [ItemController::class, 'destroy']); // Delete an item
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::middleware('auth:sanctum')->group(function () {
    Route::put('/user/update', [AuthController::class, 'updateProfile']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/user/update-password', [ProfileController::class, 'updatePassword']);
    Route::post('/user/update-profile-picture', [ProfileController::class, 'updateProfilePicture']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/items', [ItemController::class, 'index']);  // Get all items
    Route::post('/items', [ItemController::class, 'store']); // Add an item
    Route::get('/items/{id}', [ItemController::class, 'show']); // Get a single item
    Route::put('/items/{id}', [ItemController::class, 'update']); // Update an item
    Route::delete('/items/{id}', [ItemController::class, 'destroy']); // Delete an item
});


