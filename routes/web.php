<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController as SignupController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/accounts/signup', [SignupController::class, 'create'])->name('accounts.signup');
Route::post('/accounts/signup/do', [SignupController::class, 'store'])->name('accounts.signup.do');
