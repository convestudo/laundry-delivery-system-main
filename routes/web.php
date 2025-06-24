<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\RoomReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ServiceManagementController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\StripePaymentController;

use App\Http\Controllers\ChatController;

use App\Http\Controllers\Customer\CustomerServiceController;
use App\Http\Controllers\Customer\CustomerVoucherController;
use App\Http\Controllers\Customer\CustomerBookController;
use App\Http\Controllers\Customer\CustomerFeedbackController;

use App\Http\Controllers\Deliver\DeliveryOrderController;
use App\Http\Controllers\Deliver\DeliveryProfileController;

use App\Http\Middleware\EnsureCameFromCustomerBooking;
use App\Http\Controllers\Admin\ExtraChargeController;


// Route::middleware(['auth', 'can:admin'])->prefix('admin')->group(function () {
//     Route::get('/extra-charges', [ExtraChargeController::class, 'index'])->name('extra.charges.index');
//     Route::get('/extra-charges', [ExtraChargeController::class, 'create'])->name('extra.charges.create');
//     Route::post('/extra-charges', [ExtraChargeController::class, 'store'])->name('extra.charges.store');
// });

// Route::middleware(['auth', 'can:admin'])->prefix('admin')->group(function () {
//     Route::get('/extra-charges', [ExtraChargeController::class, 'index'])->name('extra_charges.index');
//     Route::get('/extra-charges/create', [ExtraChargeController::class, 'create'])->name('extra_charges.create');
//     Route::post('/extra-charges', [ExtraChargeController::class, 'store'])->name('extra_charges.store');
// });


// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin/payments', [PaymentController::class, 'index'])->name('payments.index');
// });

// Route::get('/payments', [PaymentController::class, 'index'])->name('payment.index');

// Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

// Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback.index');

// Route::resource('memberships', MembershipController::class);

// Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
//     Route::get('/feedback', [App\Http\Controllers\Admin\FeedbackController::class, 'index'])->name('admin.feedback.index');
// });

// Route::get('/test-email', function () {
//     $user = App\Models\User::find(1); // replace with real user
//     $user->notify(new \App\Notifications\DriverRegistered($user->email, 'dummyPassword'));
// });


Route::post('/pay-simulated', [StripePaymentController::class, 'createSession'])->name('stripe.simulated');
Route::any('/pay-simulated-retry/{id}', [StripePaymentController::class, 'createSessionRetry'])->name('pay-simulated-retry');

Route::get('/payment/success/call', [StripePaymentController::class, 'paymentSuccess'])->name('stripe.success');
Route::get('/payment/success/callretry', [StripePaymentController::class, 'paymentSuccessRetry'])->name('stripe.successretry');
Route::get('/payment/success/callextra', [StripePaymentController::class, 'paymentSuccessExtra'])->name('stripe.successextra');

Route::get('/payment/cancel/call', [StripePaymentController::class, 'paymentCancel'])->name('stripe.cancel');
Route::get('/payment/cancel/callretry', [StripePaymentController::class, 'paymentCancelRetry'])->name('stripe.cancelretry');
Route::get('/payment/cancel/callextra', [StripePaymentController::class, 'paymentCancelExtra'])->name('stripe.cancelextra');

Route::get('/payment/success', [StripePaymentController::class, 'successPage'])->name('stripe.success.page');
Route::get('/payment/success/extra', [StripePaymentController::class, 'successPageExtra'])->name('stripe.success.page.extra');


Route::get('/payment/cancel', [StripePaymentController::class, 'cancelPage'])->name('stripe.cancel.page');
Route::get('/payment/cancel/extra', [StripePaymentController::class, 'cancelPageExtra'])->name('stripe.cancel.page.extra');

Route::post('/order-session', [StripePaymentController::class, 'orderSession'])->name('stripe.order-session');


Route::middleware('auth')->group(function () {
    Route::get('/services', [ServiceManagementController::class, 'index'])->name('services.index');
    Route::get('/services', [ServiceManagementController::class, 'index']);
    Route::resource('services', ServiceManagementController::class);
    Route::get('/services/{id}/edit', [ServiceManagementController::class, 'edit'])->name('services.edit');
    Route::delete('/services/{id}', [ServiceManagementController::class, 'destroy'])->name('services.destroy');
    Route::get('/delivery/{id}/download', [DeliveryController::class, 'download'])->name('delivery.download');
    // Corrected the syntax issue here by removing the extraneous `a`
    Route::resource('delivery', DeliveryController::class);
    Route::post('/delivery', [DeliveryController::class, 'store'])->name('delivery.store');
    Route::get('/deliveries', [DeliveryController::class, 'index'])->name('delivery.index');
    Route::resource('delivery', DeliveryController::class)->except(['edit']);
    Route::put('/deliveries/{id}', [DeliveryController::class, 'update']);
    Route::put('/delivery/{id}', [DeliveryController::class, 'update'])->name('delivery.update');
    Route::resource('vouchers', VoucherController::class);
    Route::resource('memberships', MembershipController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('feedback', FeedbackController::class);

    Route::resource('extra_charges', ExtraChargeController::class);
    Route::get('/extra-charges', [ExtraChargeController::class, 'index'])->name('extra_charges.index');
    Route::get('/extra-charges/create', [ExtraChargeController::class, 'create'])->name('extra_charges.create');
    Route::post('/extra-charges', [ExtraChargeController::class, 'store'])->name('extra_charges.store');
    Route::post('/extra-charges/{id}/restore', [ExtraChargeController::class, 'restore'])->name('extra_charges.restore');
    Route::put('/extra-charges/update', [ExtraChargeController::class, 'update'])->name('extra_charges.update');
    // Route::get('/extra-charges/{id}/edit', [ExtraChargeController::class, 'edit'])->name('extra_charges.edit');
    Route::get('/extra-charges/edit', [ExtraChargeController::class, 'edit'])->name('extra_charges.edit');
    // Route::delete('/extra-charges/{extra_charge}', [ExtraChargeController::class, 'destroy'])->name('extra_charges.destroy');
    Route::delete('/extra-charges/{extra_charge}', [ExtraChargeController::class, 'destroy'])->name('extra_charges.destroy');





//     Route::get('/extra-charges/reminder/{id}', function ($id) {
//     $charge = \App\Models\ExtraCharge::findOrFail($id);
//     return view('extra_charges.tts_reminder', compact('charge'));
// })->name('extra_charges.tts');

// // Route::get('extra-charges/reminder/{id}', [ExtraChargesController::class, 'tts'])->name('extra_charges.tts');
// Route::get('/extra-charges/reminder/{id}', [ExtraChargeController::class, 'tts'])->name('extra_charges.tts');


    Route::patch('/order/{order}/update-status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
    Route::get('/order/cancel/{order}', [OrderController::class, 'cancel'])->name('cancel-order');


    Route::get('/feedback/order/{feedback}', [FeedbackController::class, 'showDetail'])->name('feedback.order.show');
    Route::get('/logs', [LogController::class, 'index'])->name('logs.index');
    // Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // delivery staff
    Route::resource('deliver/order', DeliveryOrderController::class)->names('deliver.order');
    Route::patch('/deliver/order/{order}/update-status', [DeliveryOrderController::class, 'updateStatus'])->name('deliver.order.updateStatus');


    // customer
    Route::get('/services-list', [CustomerServiceController::class, 'index'])->name('services-list.index');
    Route::get('/vouchers-list', [CustomerVoucherController::class, 'index'])->name('vouchers-list.index');
    Route::get('/customer-booking', [CustomerBookController::class, 'index'])->name('customer-booking.index');
    Route::get('/schedule', [CustomerBookController::class, 'schedule'])->name('schedule.index')->middleware(EnsureCameFromCustomerBooking::class);
    Route::get('/booking-history', [CustomerBookController::class, 'history'])->name('history.index');
    Route::get('/order-details/{order}', [CustomerBookController::class, 'orderDetail'])
    ->name('customer.order.detail');

    Route::get('/api/feedback/{order}', [CustomerFeedbackController::class, 'check']);
    Route::post('/api/feedback', [CustomerFeedbackController::class, 'store'])->name('feedback.store');

    Route::get('/deliver/myinfo', [DeliveryProfileController::class, 'index'])->name('deliver.myinfo.index');
    Route::put('/deliver/myinfo/update/{id}', [DeliveryProfileController::class, 'update'])->name('deliver.myinfo.update');

});

// routes/web.php
Route::middleware(['auth'])->group(function () {
    Route::get('/chat/{user}', [ChatController::class, 'index'])->name('chat.index');
    Route::get('/chat/{user}/messages', [ChatController::class, 'fetchMessages']);
    Route::post('/chat/{user}/messages', [ChatController::class, 'sendMessage']);
});

// routes/channels.php
// Broadcast::channel('chat.{receiverId}', function ($user, $receiverId) {
//     return (int) $user->id === (int) $receiverId;
// });

// Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Room reservation routes
// Route::get('/roomreservations/bookingList', [RoomReservationController::class, 'bookingListForAdmin'])
//     ->name('roomreservations.bookingListForAdmin');

// Route::put('/roomreservations/{id}/status', [RoomReservationController::class, 'updateStatus'])
//     ->name('roomreservations.updateStatus');

// Route::resource('rooms', RoomController::class);
// Route::resource('roomreservations', RoomReservationController::class);

Route::get('/api/customer/services', [CustomerBookController::class, 'getServices'])->name('customer.services');
// routes/web.php
Route::prefix('/api/service-cart')->group(function () {
    Route::post('/', [CustomerBookController::class, 'store']); // already have
    Route::delete('/{id}', [CustomerBookController::class, 'destroy']); // delete specific cart item
    Route::post('/duplicate/{id}', [CustomerBookController::class, 'duplicate']); // duplicate specific cart item
    Route::put('/{id}', [CustomerBookController::class, 'update']);
    // Route::post('/get-available-drivers', [CustomerBookController::class, 'getAvailableDrivers']);
    // Change this line in your routes file
    Route::get('/get-available-drivers', [CustomerBookController::class, 'getAvailableDrivers']);
    Route::post('/submit-order', [CustomerBookController::class, 'submitOrder']);
    Route::post('/get-available-vouchers', [CustomerBookController::class, 'getAvailableVouchers']);
});

Route::post('/api/check-voucher-usage', [CustomerVoucherController::class, 'checkVoucherUsage']);
Route::get('/orders/export/all', [OrderController::class, 'exportAllPdf'])->name('orders.export.all');



require __DIR__.'/auth.php';


Route::get('/extra-charges/pay/{id}', [ExtraChargeController::class, 'showPaymentPage'])->name('extra_charges.pay');
Route::post('/extra-charges/pay-now/{id}', [StripePaymentController::class, 'payNow'])->name('extra_charges.pay_now');


