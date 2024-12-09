<?php


use App\Http\Controllers\Api\ThoughtController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('Thoughts',[ThoughtController::class,'index']);
Route::get('Thoughts/{slug}',[ThoughtController::class,'show']);
Route::post('thoughts', [ThoughtController::class, 'store']);
Route::put('thoughts/{id}', [ThoughtController::class, 'update']);
Route::delete('thoughts/{id}', [ThoughtController::class, 'destroy']);

