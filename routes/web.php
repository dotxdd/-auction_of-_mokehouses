<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterControllers\RegistrationController;
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
})->name('welcome.page');
Route::get('/dbConnection', [\App\Http\Controllers\DatabaseConnectionController::class, 'index']);

Route::controller(RegistrationController::class)->group(function() {
    Route::get('login', 'index')->name('login');
    Route::get('registration', 'registration')->name('registration');
    Route::get('logout', 'logout')->name('logout');
    Route::post('validate_registration', 'validate_registration')->name('validate_registration');
    Route::post('validate_login', 'validate_login')->name('validate_login');
    Route::post('/logout', 'logout')->name('logout');

    Route::view('/dashboard', 'auth.dashboard')->name('dashboard');
});
Route::view('/terms-of-use','terms.terms_of_use')->name('terms-of-use');
Route::view('/contact','menu.contact')->name('contact');
Route::view('/team','menu.team')->name('team');


