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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/demo', function () {
    return view('demo');
});


Route::get('register', '\App\Http\Controllers\Auth\RegisterController@register');
Route::post('register', '\App\Http\Controllers\Auth\RegisterController@store')->name('register');
Route::get('login', '\App\Http\Controllers\Auth\LoginController@login');
Route::post('login', '\App\Http\Controllers\Auth\LoginController@store')->name('login');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');


// Route::get('list_users', '\App\Http\Controllers\Auth\RegisterController@listUsers')->name('list_users');
 Route::get('assignDuty/{id}', '\App\Http\Controllers\Auth\RegisterController@assignDuty')->name('assign_duty');
// Route::get('edit_users/{id}', '\App\Http\Controllers\Auth\RegisterController@editUser')->name('user.edit');
// Route::put('update_user/{id}', '\App\Http\Controllers\Auth\RegisterController@updateUser')->name('user.update');
Route::put('update_duty/{id}', '\App\Http\Controllers\Auth\RegisterController@updateDuty')->name('user.update_duty');

Route::resource('staff', 'App\Http\Controllers\StaffController');
Route::resource('client', 'App\Http\Controllers\ClientController');
Route::resource('quotation','App\Http\Controllers\QuotationController');
Route::resource('transaction','App\Http\Controllers\TransactionController');
Route::resource('purchase','App\Http\Controllers\PurchaseController');



Route::get('/products_list', '\App\Http\Controllers\ProductController@getAllProducts')->name('products_list');
Route::get('/stores', '\App\Http\Controllers\StoreController@index')->name('stores');
Route::get('/edit_stores/{id}', '\App\Http\Controllers\StoreController@edit')->name('edit_stores');
Route::put('/update_stores/{id}', '\App\Http\Controllers\StoreController@update')->name('store.update');
Route::get('/cash_sale', '\App\Http\Controllers\QuotationController@cashSalePage')->name('cash_sale');
Route::get('/dispatch', '\App\Http\Controllers\StockController@dispatchView')->name('dispatch');
Route::post('/dispatch', '\App\Http\Controllers\StockController@storeDispatch')->name('store_dispatch');
Route::get('/confirm_dispatch', '\App\Http\Controllers\StockController@confirmDispatch')->name('confirm_dispatch');
Route::get('/accept_dispatch/{id}', '\App\Http\Controllers\StockController@acceptDispatch')->name('accept_dispatch');
Route::get('/qty_per_store/{id}', '\App\Http\Controllers\StockController@getQtyPerStore')->name('qty_per_store');
Route::get('/pending_dispatches', '\App\Http\Controllers\StockController@getPendingDispatches')->name('pending_dispatches');


Route::post('/store_cash_sales', '\App\Http\Controllers\QuotationController@storeCashSales')->name('store_cash_sales');
Route::post('/store_quotations', '\App\Http\Controllers\QuotationController@storeQuotations')->name('store_quotations');
Route::get('/quot_page', '\App\Http\Controllers\QuotationController@quotPage')->name('quot_page');
Route::get('/view_quot_items/{id}', '\App\Http\Controllers\QuotationController@viewQuotedItems')->name('view_quot_items');
Route::get('/view_quots', '\App\Http\Controllers\QuotationController@pendingQuotations')->name('view_quots');
Route::get('/approve_item_quot/{id}', '\App\Http\Controllers\QuotationController@approveItem')->name('approve_item_quot');
Route::get('/cancel_item_quot/{id}', '\App\Http\Controllers\QuotationController@cancelItem')->name('cancel_item_quot');
Route::get('/approve_quot/{id}', '\App\Http\Controllers\QuotationController@approveQuotation')->name('approve_quot');
Route::get('/get_quot/{id}', '\App\Http\Controllers\QuotationController@getQuotation')->name('get_quot');
Route::get('/approved_quot/{id}', '\App\Http\Controllers\QuotationController@getApprovedQuotation')->name('approved_quot');
Route::post('/purch_receipt', '\App\Http\Controllers\PurchaseController@purchProducts')->name('purch_pro');
Route::get('/getLPO/{id}', '\App\Http\Controllers\PurchaseController@getLPO')->name('get_lpo');
Route::get('/confirmPayment/{id}', '\App\Http\Controllers\PurchaseController@confirmPayment')->name('confirm_payment');
Route::get('/view_lpo', '\App\Http\Controllers\PurchaseController@viewLPOs')->name('view_lpo');
Route::get('/imported_goods', '\App\Http\Controllers\PurchaseController@importedGoods')->name('imported_goods');



Route::get('/reports', '\App\Http\Controllers\DashboardController@reports')->name('reports');




Route::get('/download_work_permit/{id}', '\App\Http\Controllers\ClientController@downloadWorkPermit')->name('download_work_permit');

Route::get('view_cash_sale_rec', '\App\Http\Controllers\QuotationController@viewReceipts')->name('view_cashsale_rec');
Route::get('/view_rec/{id}', '\App\Http\Controllers\QuotationController@getReceipt')->name('view_rec');

Route::get('home', '\App\Http\Controllers\Auth\LoginController@home')->name('home');


Route::resource('product', 'App\Http\Controllers\ProductController');
Route::resource('stock', 'App\Http\Controllers\StockController');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/view_invoices', '\App\Http\Controllers\InvoiceController@index')->name('view_invoices');
Route::get('/create_invoices', '\App\Http\Controllers\InvoiceController@create')->name('create_invoices');
Route::post('/store_invoices', '\App\Http\Controllers\InvoiceController@store')->name('store_invoices');
Route::get('/get_inv/{id}', '\App\Http\Controllers\InvoiceController@getInvoice')->name('get_inv');
Route::get('/get_approved_inv/{id}', '\App\Http\Controllers\InvoiceController@getApprovedInvoice')->name('get_approved_inv');
Route::get('/inv_items/{id}', '\App\Http\Controllers\InvoiceController@viewInvoicedItems')->name('inv_items');
Route::get('/approve_item_inv/{id}', '\App\Http\Controllers\InvoiceController@approveItem')->name('approve_item_inv');
Route::get('/cancel_item_inv/{id}', '\App\Http\Controllers\InvoiceController@cancelItem')->name('cancel_item_inv');
Route::get('/approve_inv/{id}', '\App\Http\Controllers\InvoiceController@approveInvoice')->name('approve_inv');
Route::get('/test', '\App\Http\Controllers\InvoiceController@test')->name('test');
Route::post('/inv_pay/{id}', '\App\Http\Controllers\InvoiceController@invoicePayment')->name('inv_pay');
