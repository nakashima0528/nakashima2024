<?php

use Illuminate\Support\Facades\Auth;
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
    return view('index');
})->name('top');
Route::get('/insights', function () {
    return view('insights');
})->name('insights');
Route::get('/tourism', function () {
    return view('tourism.index');
})->name('tourism');
Route::get('/tourism/{prefecture}', function ($prefecture) {
    return view('tourism.prefecture')->with('prefecture', $prefecture);
})->name('tourism.prefecture');
Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');
Route::get('/terms', function () {
    return view('terms');
})->name('terms');
Route::get('/resend', function () {
    Auth::logout();
    return redirect(url('/register'));
});

Auth::routes(['verify' => true]);

// Userメールアドレス変更　確認メール
Route::get('/home/pesonal/email/{token}', [App\Http\Controllers\UserController::class, 'resetEmail'])->name('home.pesonal.email.reset');

// User
Route::middleware('auth:web')->group(function () {

    Route::get('/registration', [App\Http\Controllers\Home\HomeController::class, 'registration'])->name('registration');
    Route::match(['put','patch'],'/registration', [App\Http\Controllers\Home\HomeController::class, 'updateRegistration'])->name('registration.update');

    Route::get('/home', [App\Http\Controllers\Home\HomeController::class, 'index'])->name('home');
    Route::get('/home/pesonal', [App\Http\Controllers\Home\HomeController::class, 'pesonal'])->name('home.pesonal');
    Route::get('/home/pesonal/email', [App\Http\Controllers\Home\HomeController::class, 'pesonalEmail'])->name('home.pesonal.email');
    Route::post('/home/pesonal/email', [App\Http\Controllers\Home\HomeController::class, 'sendChangeEmailLink'])->name('home.pesonal.email.send');

    Route::get('/home/scs', [App\Http\Controllers\Home\HomeController::class, 'scs'])->name('home.scs');
    Route::get('/home/jpaddress', [App\Http\Controllers\Home\HomeController::class, 'jpaddress'])->name('home.jpaddress');
    Route::get('/home/identity', [App\Http\Controllers\Home\HomeController::class, 'identity'])->name('home.identity');
    Route::get('/home/addresses', [App\Http\Controllers\AddressController::class, 'addresses'])->name('home.addresses');
    Route::get('/home/address/create', [App\Http\Controllers\AddressController::class, 'createAddress'])->name('home.address.create');
    Route::post('/home/address', [App\Http\Controllers\AddressController::class, 'storeAddress'])->name('home.address.store');
    Route::get('/home/address/{id}', [App\Http\Controllers\AddressController::class, 'editAddress'])->name('home.address.edit');
    Route::match(['put','patch'],'/home/address', [App\Http\Controllers\AddressController::class, 'updateAddress'])->name('home.address.update');
    Route::delete('/home/address', [App\Http\Controllers\AddressController::class, 'destroyAddress'])->name('home.address.destroy');
    Route::post('/home/address/default', [App\Http\Controllers\AddressController::class, 'updateAddressDefault'])->name('home.address.default');

    Route::get('/home/parcels', [App\Http\Controllers\ParcelController::class, 'parcels'])->name('home.parcels');
    Route::post('/home/parcel', [App\Http\Controllers\ParcelController::class, 'showParcel'])->name('home.parcel.show');
    Route::match(['put','patch'],'/home/parcel', [App\Http\Controllers\ParcelController::class, 'updateParcel'])->name('home.parcel.update');

    Route::get('/home/pcs', [App\Http\Controllers\Home\HomeController::class, 'pcs'])->name('home.pcs');

    Route::get('/home/vip', [App\Http\Controllers\Home\HomeController::class, 'vip'])->name('home.vip');

    Route::get('/home/payment', [App\Http\Controllers\Home\PaymentController::class, 'index'])->name('home.payment');
    Route::get('/home/payment/cc/create', [App\Http\Controllers\Home\PaymentController::class, 'createCC'])->name('home.payment.cc.create');
    Route::post('/home/payment/cc/', [App\Http\Controllers\Home\PaymentController::class, 'storeCC'])->name('home.payment.cc.store');    
    Route::post('/home/payment/cc/destroy', [App\Http\Controllers\Home\PaymentController::class, 'destroyCC'])->name('home.payment.cc.destroy');    

    Route::get('/home/invoices', [App\Http\Controllers\InvoiceController::class, 'invoices'])->name('home.invoices');
    Route::get('/home/invoices/unpaid', [App\Http\Controllers\InvoiceController::class, 'invoicesUnpaid'])->name('home.invoices.unpaid');
    Route::post('/home/invoice',  [App\Http\Controllers\InvoiceController::class, 'showInvoice'])->name('home.invoice.show');
    Route::match(['put','patch'],'/home/invoice/sipping',  [App\Http\Controllers\ParcelController::class, 'updateSipping'])->name('home.parcel.sipping');
    Route::post('/home/invoice/select',  [App\Http\Controllers\InvoiceController::class, 'select'])->name('home.invoice.select');
    Route::post('/home/invoice/proceed',  [App\Http\Controllers\InvoiceController::class, 'proceed'])->name('home.invoice.proceed');

    Route::get('/home/contact', [App\Http\Controllers\Home\HomeController::class, 'contact'])->name('home.contact');
    Route::post('/home/contact', [App\Http\Controllers\Home\HomeController::class, 'sendContact'])->name('home.contact.send');    

    Route::get('/home/password', [App\Http\Controllers\Home\HomeController::class, 'password'])->name('home.password');
    Route::match(['put','patch'],'/home/password', [App\Http\Controllers\Home\HomeController::class, 'updatePassword'])->name('home.password.update');

});

// Admin
Route::get('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm']);
Route::post('/login/admin', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);

Route::middleware('auth:admin')->group(function () {

    Route::get('/admin', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');

    Route::resource('/admin/users', App\Http\Controllers\UserController::class);
    Route::get('/admin/mail/{user_id}/{type}', [App\Http\Controllers\UserController::class, 'mail'])->name('users.mail');
    Route::post('/admin/mail/send', [App\Http\Controllers\UserController::class, 'send'])->name('users.mail.send');
    Route::get('/admin/proxy/{user_id}', [App\Http\Controllers\Home\HomeController::class, 'proxy'])->name('admin.proxy');

    Route::get('/admin/addresses/create/{user_id}', [App\Http\Controllers\AddressController::class, 'create'])->name('addresses.create');
    Route::post('/admin/addresses', [App\Http\Controllers\AddressController::class, 'store'])->name('addresses.store');
    Route::get('/admin/addresses/{id}', [App\Http\Controllers\AddressController::class, 'show'])->name('addresses.show');
    Route::get('/admin/addresses/{id}/edit', [App\Http\Controllers\AddressController::class, 'edit'])->name('addresses.edit');
    Route::match(['put','patch'],'/admin/addresses/{id}', [App\Http\Controllers\AddressController::class, 'update'])->name('addresses.update');
    Route::delete('/admin/addresses/{id}', [App\Http\Controllers\AddressController::class, 'destroy'])->name('addresses.destroy');

    Route::get('/admin/parcels/index', [App\Http\Controllers\ParcelController::class, 'index'])->name('parcels.index');
    Route::get('/admin/parcels/create/{user_id}', [App\Http\Controllers\ParcelController::class, 'create'])->name('parcels.create');
    Route::post('/admin/parcels', [App\Http\Controllers\ParcelController::class, 'store'])->name('parcels.store');
    Route::get('/admin/parcels/{id}', [App\Http\Controllers\ParcelController::class, 'show'])->name('parcels.show');
    Route::get('/admin/parcels/{id}/edit', [App\Http\Controllers\ParcelController::class, 'edit'])->name('parcels.edit');
    Route::match(['put','patch'],'/admin/parcels/{id}', [App\Http\Controllers\ParcelController::class, 'update'])->name('parcels.update');
    Route::delete('/admin/parcels/{id}', [App\Http\Controllers\ParcelController::class, 'destroy'])->name('parcels.destroy');

    Route::get('/admin/parcelItems/create/{parcel_id}', [App\Http\Controllers\Admin\ParcelItemController::class, 'create'])->name('parcelItems.create');
    Route::post('/admin/parcelItems', [App\Http\Controllers\Admin\ParcelItemController::class, 'store'])->name('parcelItems.store');
    Route::get('/admin/parcelItems/{id}', [App\Http\Controllers\Admin\ParcelItemController::class, 'show'])->name('parcelItems.show');
    Route::get('/admin/parcelItems/{id}/edit', [App\Http\Controllers\Admin\ParcelItemController::class, 'edit'])->name('parcelItems.edit');
    Route::match(['put','patch'],'/admin/parcelItems/{id}', [App\Http\Controllers\Admin\ParcelItemController::class, 'update'])->name('parcelItems.update');
    Route::delete('/admin/parcelItems/{id}', [App\Http\Controllers\Admin\ParcelItemController::class, 'destroy'])->name('parcelItems.destroy');

    Route::get('/admin/invoices/index', [App\Http\Controllers\InvoiceController::class, 'index'])->name('invoices.index');
    Route::get('/admin/invoices/create/{user_id}', [App\Http\Controllers\InvoiceController::class, 'create'])->name('invoices.create');
    Route::get('/admin/invoices/create/{user_id}/{parcel_id}', [App\Http\Controllers\InvoiceController::class, 'autoCreateParcelInvoce'])->name('invoices.create.parcel');
    Route::post('/admin/invoices', [App\Http\Controllers\InvoiceController::class, 'store'])->name('invoices.store');
    Route::get('/admin/invoices/{id}', [App\Http\Controllers\InvoiceController::class, 'show'])->name('invoices.show');
    Route::get('/admin/invoices/{id}/edit', [App\Http\Controllers\InvoiceController::class, 'edit'])->name('invoices.edit');
    Route::match(['put','patch'],'/admin/invoices/{id}', [App\Http\Controllers\InvoiceController::class, 'update'])->name('invoices.update');
    Route::delete('/admin/invoices/{id}', [App\Http\Controllers\InvoiceController::class, 'destroy'])->name('invoices.destroy');

    Route::get('/admin/invoiceDetails/create/{invoice_id}', [App\Http\Controllers\Admin\InvoiceDetailController::class, 'create'])->name('invoiceDetails.create');
    Route::post('/admin/invoiceDetails', [App\Http\Controllers\Admin\InvoiceDetailController::class, 'store'])->name('invoiceDetails.store');
    Route::get('/admin/invoiceDetails/{id}', [App\Http\Controllers\Admin\InvoiceDetailController::class, 'show'])->name('invoiceDetails.show');
    Route::get('/admin/invoiceDetails/{id}/edit', [App\Http\Controllers\Admin\InvoiceDetailController::class, 'edit'])->name('invoiceDetails.edit');
    Route::match(['put','patch'],'/admin/invoiceDetails/{id}', [App\Http\Controllers\Admin\InvoiceDetailController::class, 'update'])->name('invoiceDetails.update');
    Route::delete('/admin/invoiceDetails/{id}', [App\Http\Controllers\Admin\InvoiceDetailController::class, 'destroy'])->name('invoiceDetails.destroy');

    Route::get('/admin/tickets/index', [App\Http\Controllers\Admin\TicketController::class, 'index'])->name('tickets.index');
    Route::get('/admin/tickets/create/{user_id}', [App\Http\Controllers\Admin\TicketController::class, 'create'])->name('tickets.create');
    Route::post('/admin/tickets', [App\Http\Controllers\Admin\TicketController::class, 'store'])->name('tickets.store');
    Route::get('/admin/tickets/{id}', [App\Http\Controllers\Admin\TicketController::class, 'show'])->name('tickets.show');
    Route::get('/admin/tickets/{id}/edit', [App\Http\Controllers\Admin\TicketController::class, 'edit'])->name('tickets.edit');
    Route::match(['put','patch'],'/admin/tickets/{id}', [App\Http\Controllers\Admin\TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/admin/tickets/{id}', [App\Http\Controllers\Admin\TicketController::class, 'destroy'])->name('tickets.destroy');

    Route::resource('/admin/admins', App\Http\Controllers\Admin\AdminController::class);
    Route::get('/admin/password', [App\Http\Controllers\Admin\AdminController::class, 'password'])->name('password.edit');
    Route::post('/admin/password', [App\Http\Controllers\Admin\AdminController::class, 'updatePassword'])->name('password.update');

    Route::get('/admin/csv/user', [App\Http\Controllers\UserController::class, 'csvUser'])->name('csv.user');
    Route::post('/admin/csv/user', [App\Http\Controllers\UserController::class, 'csvUserDownload'])->name('csv.user.lownload');
    Route::get('/admin/csv/parcel', [App\Http\Controllers\ParcelController::class, 'csvParcel'])->name('csv.parcel');
    Route::post('/admin/csv/parcel', [App\Http\Controllers\ParcelController::class, 'csvParcelDownload'])->name('csv.parcel.lownload');
    Route::get('/admin/csv/invoice', [App\Http\Controllers\InvoiceController::class, 'csvInvoice'])->name('csv.invoice');
    Route::post('/admin/csv/invoice', [App\Http\Controllers\InvoiceController::class, 'csvInvoiceDownload'])->name('csv.invoice.lownload');


    Route::get('/admin/batch', [App\Http\Controllers\Admin\HomeController::class, 'batch'])->name('admin.batch');
});




