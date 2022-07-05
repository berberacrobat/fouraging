<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ForageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resources([
    'forages' => ForageController::class,
    'areas' => AreaController::class,
]);

Route::get('/forages/{forage}/areas', [ForageController::class,'forageAreas']);
Route::get('/forages/{forage}/areas/{area}', [ForageController::class,'forageArea']);
Route::post('/forages/{forage}/areas', [ForageController::class,'forageAreaStore']);




/*Route::get('areas', [AreaController::class, 'index']); // List Posts
Route::post('areas', [AreaController::class, 'store']); // Create Post
Route::get('areas/{id}', [AreaController::class, 'show']); // Detail of Post
Route::put('areas/{id}', [AreaController::class, 'update']); // Update Post
Route::delete('areas/{id}', [AreaController::class, 'destroy']); // Delete Post*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
