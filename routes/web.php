<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\DiscountController as AdminDiscount;

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


Route::get('/', [CheckoutController::class, 'index']
)->name('welcome');


// Socialite routes
Route::get('sign-in-google', [UserController::class, 'google'])->name('user.login.google');

Route::get('auth/google/callback', [UserController::class, 'handleProviderCallback'])->name('user.google.callback');

// User Manual Register
Route::get('login',[LoginController::class, 'index'])->name('login');
Route::post('login_user',[LoginController::class, 'authenticate'])->name('login-user');

Route::get('signup', [RegisterController::class, 'index'])->name('signup.show');
Route::post('signup', [RegisterController::class, 'store'])->name('signup.store');

// midtrans routes
Route::get('payment/success', [CheckoutController::class, 'midtransCallback']);
Route::post('payment/success', [CheckoutController::class, 'midtransCallback']);

Route::middleware(['auth'])->group(function() {
// checkout routes
Route::get('checkout/{product:slug}', [CheckoutController::class, 'show'])->name('welcome.show')->middleware('ensureUserRole:user');
Route::post('checkout/{product}', [CheckoutController::class, 'store'])->name('checkout.store')->middleware('ensureUserRole:user');
Route::get('checkout/success', [CheckoutController::class, 'success'])->name('checkout.success')->middleware('ensureUserRole:user');

// dashboard
Route::get('dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

// user dashboard
Route::prefix('user/dashboard')->namespace('User')->name('user.')->middleware('ensureUserRole:user')->group(function(){
    Route::get('/', [UserDashboard::class, 'index'])->name('dashboard');
});


// Admin dashboard
Route::prefix('admin/dashboard')->name('admin.')->middleware('ensureUserRole:admin')->group(function(){
    Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');

    // admin discount
    Route::resource('discount', AdminDiscount::class);
});
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
