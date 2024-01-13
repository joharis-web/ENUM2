<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\PembayaranController;

use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\PesananController as FrontendPesananController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\PemmbayaranController as FrontendPemmbayaranController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;



Route::get('/', [WelcomeController::class, 'index']);
Route::get('/redirects', [WelcomeController::class, 'redirects']);
Route::post('/addcart/{id}', [WelcomeController::class, 'addcart']);
Route::get('/remove_cart/{id}', [WelcomeController::class, 'remove_cart']);

Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class, 'index'])->name('menus.index');
// Route::post('/pesan/{id}', [FrontendPesananController::class, 'index']);
Route::get('/pesan/index', [FrontendPesananController::class, 'show'])->name('pesan.index');
Route::patch('/update-pesan/{id}/{newQuantity}', [FrontendPesananController::class, 'updateQuantity']);
Route::get('/get-totals', [FrontendPesananController::class, 'getTotals']);
Route::get('/pembayaran/index', [FrontendPesananController::class, 'pembayaran'])->name('pembayaran.index');
Route::post('/pembayaran/index', [FrontendPemmbayaranController::class, 'processPayment'])->name('payment.process');
Route::get('/pembayaran/success', [FrontendPemmbayaranController::class, 'processPayment'])->name('pembayaran.success');
Route::get('/pesanan/riwayat', [FrontendPemmbayaranController::class, 'riwayat'])->name('pesanan.riwayat');

Route::get('/reservation/step-one', [FrontendReservationController::class, 'stepOne'])->name('reservations.step.one');
Route::post('/reservation/step-one', [FrontendReservationController::class, 'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class, 'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/step-two', [FrontendReservationController::class, 'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankyou', [WelcomeController::class, 'thankyou'])->name('thankyou');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/menus', MenuController::class);
    Route::resource('/tables', TableController::class);
    Route::resource('/reservations', ReservationController::class);
    Route::resource('/pesanan', PesananController::class);
    Route::resource('/pembayaran', PembayaranController::class);
});
require __DIR__.'/auth.php';
