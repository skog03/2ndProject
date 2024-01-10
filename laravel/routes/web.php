<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArtistController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [HomeController::class, 'index']);
Route::get('/artists', [ArtistController::class, 'list']);
Route::get('/artists/create', [ArtistController::class, 'create']);
Route::post('/artists/put', [ArtistController::class, 'put']);

Route::get('/artists/update/{artist}', [ArtistController::class, 'update']);
Route::post('/artists/patch/{artist}', [ArtistController::class, 'patch']);

Route::post('/artists/delete/{artist}', [ArtistController::class, 'delete']);


