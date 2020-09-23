<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;

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

Route::middleware('auth:sanctum')->get('/dashboard', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
// Route::middleware('auth:sanctum')->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::middleware('auth:sanctum')->post('/logout', 'Auth\LoginController@logout')->name('logout');


Route::middleware('auth:sanctum')->post('/admin', function(){
    if (Auth::user()->role == "admin") {
        return response()->json(['message' => 'admin'], 200);
    }
    else{
        return response()->json('Unauthorized Access', 401);
    }
})->name('admin');