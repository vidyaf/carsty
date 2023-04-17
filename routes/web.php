<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/detail/{car:id}', [HomeController::class, 'detail'])->name('detail');

Route::middleware('auth')->group(function () {
    Route::get('/transaction', [HomeController::class, 'transaction'])->name('transaction');
    Route::post('/transaction-car', [TransactionController::class, 'store'])->name('transactionStore');
    Route::get('/detail-transaction/{transaction:no_transaction}', [TransactionController::class, 'detail'])->name('detailTransaction');
    Route::post('/payment/{transaction:no_transaction}', [TransactionController::class, 'payment'])->name('payment');
    Route::get('/payment/transaction-cancel/{transaction:no_transaction}', [TransactionController::class, 'delete'])->name('transactionDelete');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::get('/register', [LoginController::class, 'register'])->name('register');
    Route::post('/register', [LoginController::class, 'create'])->name('register');
});


Route::middleware('auth', 'admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    Route::get('/admin/mobil', [AdminController::class, 'mobil'])->name('adminMobil');
    Route::get('/admin/mobil-detail/{car:id}', [AdminController::class, 'mobilDetail'])->name('adminMobilDetail');
    Route::get('/admin/mobil-delete/{car:id}', [CarController::class, 'delete'])->name('adminMobilDelete');
    Route::post('/admin/mobil-create', [CarController::class, 'store'])->name('adminMobilCreate');
    Route::get('/admin/mobil-edit/{car:id}', [AdminController::class, 'mobilEdit'])->name('adminMobilEdit');
    Route::post('/admin/mobil-edit/{car:id}', [CarController::class, 'update'])->name('adminMobilEdit');
    Route::get('/admin/transaction', [AdminController::class, 'transaction'])->name('adminTransaction');
    Route::get('/admin/transaction-detail/{transaction:no_transaction}', [AdminController::class, 'transactionDetail'])->name('adminTransactionDetail');
    Route::get('/admin/transaction-delete/{transaction:no_transaction}', [TransactionController::class, 'delete'])->name('adminTransactionDelete');
    Route::get('/admin/category', [AdminController::class, 'category'])->name('adminCategory');
    Route::post('/admin/category-create', [CategoryController::class, 'store'])->name('adminCategoryCreate');
    Route::get('/admin/category-delete/{category:id}', [CategoryController::class, 'delete'])->name('adminCategoryDelete');
    Route::post('/admin/trasaction-print', [AdminController::class, 'transactionPrint'])->name('transactionPrint');
});
