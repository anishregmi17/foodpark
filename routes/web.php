<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\FoodOrderingController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RestaurantStaffController;
use App\Http\Controllers\FoodDeliveringController;



Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('customers', CustomerController::class);
Route::resource('food-items', FoodItemController::class);
Route::resource('food-orderings', FoodOrderingController::class);
Route::resource('invoices', InvoiceController::class);
Route::resource('payments', PaymentController::class);
Route::resource('restaurant-staff', RestaurantStaffController::class);
Route::resource('food-deliverings', FoodDeliveringController::class);



Route::get('/invoices/{id}/amount', [InvoiceController::class, 'getInvoiceAmount']);

Route::get('/food-orderings/{id}/amount', 'FoodOrderingController@getAmount');
