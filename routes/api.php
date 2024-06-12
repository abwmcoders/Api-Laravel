<?php

use App\Http\Controllers\Api\V1\CompleteTaskController;
use App\Http\Controllers\Api\V1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//! Api Url

Route::prefix('v1')->group(function () {
    Route::apiResource("/tasks", TaskController::class);
    Route::patch("/tasks/{task}/completed", CompleteTaskController::class);
});

//! End of api
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
