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
// ------- Login Routes -------- //
Route::get('/', [App\Http\Controllers\auth_controller::class, 'login'])->name('login');
Route::post('/', [App\Http\Controllers\auth_controller::class, 'login_form'])->name('login_form');
// ------- Home Routes -------- //
Route::get('/home', [App\Http\Controllers\global_controller::class, 'index'])->name('home')->middleware('auth');
Route::post('/home', [App\Http\Controllers\global_controller::class, 'create']);
// ------- Stock Routes -------- //
Route::get('/stock', [App\Http\Controllers\global_controller::class, 'stock'])->name('stock')->middleware('auth');
// ------- Factures Routes -------- //
Route::get('/fatures', [App\Http\Controllers\factures_controller::class, 'factures'])->name('factures')->middleware('auth');
Route::get('/fatures/list', [App\Http\Controllers\factures_controller::class, 'factures_list'])->name('factures.list')->middleware('auth');
Route::post('/fatures', [App\Http\Controllers\factures_controller::class, 'create']);
Route::post('/fatures/list', [App\Http\Controllers\factures_controller::class, 'search']);
// ------- Sales Invoice Routes -------- //
Route::get('/sales_invoice', [App\Http\Controllers\factures_controller::class, 'sales_invoice'])->name('sales_invoice')->middleware('auth');
Route::post('/sales_invoice', [App\Http\Controllers\factures_controller::class, 'create']);
// ------- Customer List Routes -------- //
Route::get('/customer_list', [App\Http\Controllers\customer_list_controller::class, 'customer_list'])->name('customer_list')->middleware('auth');
Route::post('/customer_list', [App\Http\Controllers\customer_list_controller::class, 'create']);
// ------- supplier Routes -------- //
Route::get('/supplier_list', [App\Http\Controllers\suppliers_controller::class, 'supplier'])->name('supplier_list')->middleware('auth');
Route::post('/supplier_list', [App\Http\Controllers\suppliers_controller::class, 'create']);
// ------- supplier Routes -------- //
Route::get('/reports', [App\Http\Controllers\global_controller::class, 'reports'])->name('reports')->middleware('auth');
Route::post('/reports', [App\Http\Controllers\global_controller::class, 'select_date']);
// ------- Print facture Routes -------- //
Route::get('/print/factures/{fc_id}', [App\Http\Controllers\global_controller::class, 'print_fc'])->name('print.factures')->middleware('auth');
// ------- Print facture Routes -------- //
Route::get('/print/pay/{pay_id}', [App\Http\Controllers\pays_controller::class, 'fc_pay'])->name('print.pay')->middleware('auth');
// ------- Pay Routes -------- //
Route::get('/pay', [App\Http\Controllers\pays_controller::class, 'pays'])->name('pay')->middleware('auth');
Route::post('/pay', [App\Http\Controllers\pays_controller::class, 'create']);
// ------- Destroy routes ------- //
Route::get('/home/destroy/{id}', [App\Http\Controllers\global_controller::class, 'destroy'])->name('destroy');
Route::get('/supplier_list/destroy/{id}', [App\Http\Controllers\suppliers_controller::class, 'destroy'])->name('destroy.supplier');
Route::get('/customer_list/destroy/{id}', [App\Http\Controllers\customer_list_controller::class, 'destroy'])->name('destroy.customer');
Route::get('/factures/destroy/{id}', [App\Http\Controllers\factures_controller::class, 'destroy'])->name('destroy.factures');
// ------- Updates & Edites routes ------- //
Route::get('/customer_list/edit/{id}', [App\Http\Controllers\customer_list_controller::class, 'edit'])->name('edit.customer')->middleware('auth');
Route::post('/customer_list/edit/{id}', [App\Http\Controllers\customer_list_controller::class, 'update']);
Route::get('/supplier_list/edit/{id}', [App\Http\Controllers\suppliers_controller::class, 'edit'])->name('edit.supplier')->middleware('auth');
Route::post('/supplier_list/edit/{id}', [App\Http\Controllers\suppliers_controller::class, 'update']);
