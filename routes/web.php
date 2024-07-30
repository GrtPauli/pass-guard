<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if(auth()->id()){
        return redirect('/dashboard');
    } else {
        return redirect('/login');
    }
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

// Get login page
Route::get('/login', [AuthController::class, 'loginPage']);

// Get register page
Route::get('/register', [AuthController::class, 'registerPage']);

// Log user in
Route::post('/api/login', [AuthController::class, 'login']);

// Register user
Route::post('/api/register', [AuthController::class, 'register']);

// Log user out
Route::post('/api/logout', [AuthController::class, 'logout']);

Route::middleware('custom.auth')->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
});