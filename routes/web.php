<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController as SignupController;
use App\Http\Controllers\ExploreController as ExploreController;

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

Route::get('/accounts/signup', [SignupController::class, 'create'])->name('accounts.signup')->middleware([
    'just.unauthenticated',
]);
Route::post('/accounts/signup/do', [SignupController::class, 'store'])->name('accounts.signup.do')->middleware([
    'just.unauthenticated',
]);

Route::get('/', [ExploreController::class, 'explore'])->name('explore')->middleware([
    'just.authenticated',
]);
