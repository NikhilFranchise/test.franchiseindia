<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\DealersAndDistributorController;

=======
>>>>>>> 2d56f9601e98ea3920a58ef0c5e23b6875874c53
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

<<<<<<< HEAD
Route::group(['middleware' => 'cors'], function () {
    // Your routes here
Route::post('/investor-registration', [DealersAndDistributorController::class, 'dealerhomepage']);

});

=======
>>>>>>> 2d56f9601e98ea3920a58ef0c5e23b6875874c53
