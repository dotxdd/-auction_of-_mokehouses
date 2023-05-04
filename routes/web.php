<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterControllers\RegistrationController;
use App\Http\Controllers\ProductCompanyController;
use App\Http\Controllers\ProductController;
use \App\Http\Controllers\AuctionController;
use App\Http\Controllers\AuctionsAndBidsController;
use App\Http\Controllers\MyBidsController;
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
Route::view('/terms-of-use', 'terms.terms_of_use')->name('terms-of-use');
Route::view('/contact', 'menu.contact')->name('contact');
Route::get('/account/bids', [MyBidsController::class, 'index'])->name('account.bids');
Route::view('/team', 'menu.team')->name('team');
Route::get('/auctions/active', [AuctionsAndBidsController::class, 'index'])->name('auctions.active.index');
Route::get('/auctions/{auctionId}/bid', [AuctionsAndBidsController::class, 'showBidForm'])->name('auctions.bid');
Route::post('/auctions/{auctionId}/bid', [AuctionsAndBidsController::class, 'placeBid'])->name('auctions.placeBid');

Route::middleware(['admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/product-companies', [ProductCompanyController::class, 'index'])->name('admin.product-companies');
        Route::post('/product-companies-post', [ProductCompanyController::class, 'store'])->name('admin.product-companies.post');
        Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
        Route::post('/products-post', [ProductController::class, 'store'])->name('admin.products.store');
        Route::get('/auctions', [AuctionController::class, 'index'])->name('admin.auctions');
        Route::post('/auctions-post', [AuctionController::class, 'store'])->name('admin.auctions.store');
    });
});


