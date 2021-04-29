<?php

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

//Route::get('/', function () {
//    return view('welcome');
//})->middleware(['auth']);



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('root');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/play/{id}', [App\Http\Controllers\HomeController::class, 'play'])->name('play');
Route::get('/show_details/{id}', [App\Http\Controllers\HomeController::class, 'show_details'])->name('show_details');
Route::get('/by_category/{id}', [App\Http\Controllers\HomeController::class, 'by_category'])->name('by_category');
Route::get('/mobile', [App\Http\Controllers\HomeController::class, 'mobile'])->name('mobile');
Route::post('/search', [App\Http\Controllers\HomeController::class, 'search'])->name('search');


Route::get('/settings', [App\Http\Controllers\ProfileController::class, 'settings'])->name('settings');
Route::resource('profile','App\Http\Controllers\ProfileController');
Route::get('/change_password', [App\Http\Controllers\ProfileController::class, 'change_password'])->name('change_password');
Route::post('/update_password', [App\Http\Controllers\ProfileController::class, 'update_password'])->name('update_password');

Route::get('/billing', [App\Http\Controllers\PaymentController::class, 'billing'])->name('payment.billing');
Route::post('/subscribe', [App\Http\Controllers\PaymentController::class, 'subscribe'])->name('payment.subscribe');
Route::get('/status', [App\Http\Controllers\PaymentController::class, 'status'])->name('payment.status');
Route::post('/cancel', [App\Http\Controllers\PaymentController::class, 'cancel'])->name('payment.cancel');
Route::post('/resume', [App\Http\Controllers\PaymentController::class, 'resume'])->name('payment.resume');



use Illuminate\Http\Request;

Route::get('/payment/invoice/{invoice}', function (Request $request, $invoiceId) {
    return $request->user()->downloadInvoice($invoiceId, [
        'vendor' => 'yourFLIX VOD',
        'product' => 'VOD Subscription',
    ]);
});

