<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CalendarEntryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


//  Public Routes
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);



//  Protected Routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::apiResource('/tasks', TaskController::class);
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/calendar-entries', CalendarEntryController::class);
});
