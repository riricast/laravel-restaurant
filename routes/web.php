<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/home');

Route::get('/home', [CustomerController::class, 'showAllCustomers'])->name('home');

Route::post('/customers', [CustomerController::class, 'saveCustomerDetails'])->name('saveCustomer');

Route::get('/customers/{cust_id}/edit', [CustomerController::class, 'showCustomerDetails'])->name('customerEdit');

Route::delete('/customers/{cust_id}', [CustomerController::class, 'deleteCustomerDetails'])->name('customerDelete');

Route::put('/customers/{cust_id}', [CustomerController::class, 'saveEditCustomer'])->name('saveEditCustomer');