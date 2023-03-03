<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController as SignupController;
use App\Http\Controllers\ExploreController as ExploreController;
use App\Http\Controllers\SigninController as SigninController;
use App\Http\Controllers\SignoutController as SignoutController;
use App\Http\Controllers\ActivateController as ActivateController;
use App\Http\Controllers\ForgotController as ForgotController;
use App\Http\Controllers\PasswordController as PasswordController;

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

Route::get('/accounts/activate', [ActivateController::class, 'edit'])->name('accounts.activate')->middleware([
    'just.authenticated', 'only.non.activated.accounts',
]);

Route::put('/accounts/activate/do', [ActivateController::class, 'update'])->name('accounts.activate.do')->middleware([
    'just.authenticated', 'only.non.activated.accounts',
]);

Route::get('/accounts/activate/resend', [ActivateController::class, 'resendActivationToken'])->name('accounts.activate.resend')->middleware([
    'just.authenticated', 'only.non.activated.accounts',
]);

Route::get('/accounts/signin', [SigninController::class, 'create'])->name('accounts.signin')->middleware([
    'just.unauthenticated',
]);

Route::post('/accounts/signin/do', [SigninController::class, 'store'])->name('accounts.signin.do')->middleware([
    'just.unauthenticated',
]);

Route::delete('/accounts/signout/do', [SignoutController::class, 'destroy'])->name('accounts.signout.do')->middleware([
    'just.authenticated',
]);

Route::get('/', [ExploreController::class, 'show'])->name('explore')->middleware([
    'just.authenticated', 'only.activated.accounts',
]);

Route::get("/accounts/forgot", [ForgotController::class, 'create'])->name('accounts.forgot')->middleware([
    'just.unauthenticated',
]);

Route::post("/accounts/forgot/do", [ForgotController::class, 'store'])->name('accounts.forgot.do')->middleware([
    'just.unauthenticated',
]);

Route::get("/accounts/password/{token}", [PasswordController::class, "edit"])->name('accounts.password')->middleware([
    'just.unauthenticated',
]);

Route::put("/accounts/password/{token}/do", [PasswordController::class, "update"])->name('accounts.password.do')->middleware([
    'just.unauthenticated',
]);
