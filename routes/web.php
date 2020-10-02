<?php

#
# Auth Module
#

// Auth Routes
Auth::routes([ 'verify' => true ]);

#
# General Module
#

// Welcome (Landing Page)
Route::get('/', 'General\Welcome\IndexController')->name('welcome');

// Home
Route::get('/home', 'General\Home\IndexController')->name('home');

// Dashboard
Route::get('/dashboard', 'General\Dashboard\IndexController')->name('dashboard');

// Diagnostics
Route::get('/diagnostics', 'General\Diagnostics\IndexController')->name('diagnostics');

// Help
Route::get('/help', 'General\Help\IndexController')->name('help');

#
# Account Module
#

// Account
Route::get('/account', 'Account\Account\IndexController')->name('account');
// Route::patch('/account', 'Account\Account\UpdateController');

Route::patch('/account/person', 'Account\Account\Person\UpdateController');
Route::patch('/account/address', 'Account\Account\Address\UpdateController');
Route::patch('/account/phone', 'Account\Account\Phone\UpdateController');
Route::patch('/account/bank_account', 'Account\Account\BankAccount\UpdateController');

// Preferences
Route::get('/preferences', 'Account\Preferences\IndexController')->name('preferences');
Route::patch('/preferences', 'Account\Preferences\UpdateController');

// Settings
Route::get('/settings', 'Account\Settings\IndexController')->name('settings');
Route::patch('/settings', 'Account\Settings\UpdateController');

Route::patch('/settings/basic', 'Account\Settings\Basic\UpdateController');
Route::patch('/settings/avatar', 'Account\Settings\Avatar\UpdateController');
Route::patch('/settings/background', 'Account\Settings\Background\UpdateController');

// Profile
Route::get('/profile/{id?}', 'Account\Profile\IndexController')->name('profile');

// Feedback
Route::get('/feedback', 'Account\Feedback\IndexController')->name('feedback');
Route::post('/feedback', 'Account\Feedback\StoreController');

// Notifications
Route::get('/notifications', 'Account\Notifications\IndexController')->name('notifications');

Route::get('/notifications/read', 'Account\Notifications\ReadAllController');

Route::post('/notifications/{uuid}/read', 'Account\Notifications\ReadController');
Route::post('/notifications/{uuid}/unread', 'Account\Notifications\UnreadController');

// Manage Users
Route::prefix('users')->group(function () {

    Route::get('/search', 'Account\Users\SearchController');
    Route::get('/{id?}', 'Account\Users\IndexController')->name('users');
    Route::post('/', 'Account\Users\StoreController');
    Route::patch('/{id}', 'Account\Users\UpdateController');
    Route::delete('/{id}', 'Account\Users\DestroyController');

});

// Availabilities
Route::get('/availabilities', 'Account\Availabilities\IndexController')->name('availabilities');
// @api

#
# Merchant Module
#

// Manage Plans
Route::prefix('plans')->group(function () {

    Route::get('/search', 'Merchant\Plans\SearchController');
    Route::get('/{id?}', 'Merchant\Plans\IndexController')->name('plans');
    Route::post('/', 'Merchant\Plans\StoreController');
    Route::patch('/{id}', 'Merchant\Plans\UpdateController');
    Route::delete('/{id}', 'Merchant\Plans\DestroyController');

});

// Manage Coupons
Route::prefix('coupons')->group(function () {

    Route::get('/search', 'Merchant\Coupons\SearchController');
    Route::get('/{id?}', 'Merchant\Coupons\IndexController')->name('coupons');
    Route::post('/', 'Merchant\Coupons\StoreController');
    Route::patch('/{id}', 'Merchant\Coupons\UpdateController');
    Route::delete('/{id}', 'Merchant\Coupons\DestroyController');

});

// Manage Subscriptions
Route::prefix('subscriptions')->group(function () {

    Route::get('/{id?}', 'Merchant\Subscriptions\IndexController')->name('subscriptions');
    Route::get('/{id}/activate', 'Merchant\Subscriptions\ActivateController');

});

// Invoices
Route::prefix('invoices')->group(function () {

    Route::get('/{id}/process', 'Merchant\Invoices\ProcessController');
    Route::get('/{id}/refresh', 'Merchant\Invoices\RefreshController');
    Route::get('/{id}/retry', 'Merchant\Invoices\DuplicateController');
    Route::get('/{id}/duplicate', 'Merchant\Invoices\DuplicateController');

});

// Pricing
Route::get('/pricing', 'Merchant\Pricing\IndexController')->name('pricing');

// Subscribe
Route::get('/subscribe', 'Merchant\Subscribe\IndexController')->name('subscribe');

#
# Education Module
#

// Manage Transfers
Route::get('/transfers', 'Education\Transfers\IndexController')->name('transfers');

// Manage Deposits
Route::get('/deposits', 'Education\Deposits\IndexController')->name('deposits');

// Admissions
Route::prefix('admissions')->group(function () {

    Route::get('/search', 'Education\Admissions\SearchController');
    Route::get('/', 'Education\Admissions\IndexController')->name('admissions');

    Route::get('/{id}', 'Education\Admissions\PreviewController');

    Route::post('/{id}/approve', 'Education\Admissions\ApproveController');
    Route::post('/{id}/reject', 'Education\Admissions\RejectController');

});

// Admission
Route::prefix('admission')->group(function () {

    Route::get('/', 'Education\Admission\IndexController')->name('admission');
    Route::post('/', 'Education\Admission\StoreController');

});

// Schedule
Route::get('/schedule', 'Education\Schedule\IndexController')->name('schedule');

// Auditions
Route::get('/auditions', 'Education\Auditions\IndexController')->name('auditions');

// Sessions
Route::prefix('sessions')->group(function () {

    Route::get('/', 'Education\Sessions\IndexController')->name('sessions');

    Route::get('/{id}/summary', 'Education\Sessions\SummaryController');

    Route::post('/{id}/approve', 'Education\Sessions\ApproveController');
    Route::post('/{id}/reject', 'Education\Sessions\RejectController');

    Route::get('/{id}/live', 'Education\Sessions\JoinController');

});

// Lessons
Route::get('/lessons', 'Education\Lessons\IndexController')->name('lessons');

// Forms
Route::prefix('forms')->group(function () {

    Route::get('/search', 'Education\Forms\SearchController');
    Route::get('/', 'Education\Forms\IndexController')->name('forms');

    Route::get('/builder/{id?}', 'Education\Forms\BuilderController');

});

// Lives
Route::get('/lives', 'Education\Lives\IndexController')->name('lives');

/*

// Manage Admissions
Route::prefix('admissions')->group(function() {

    // Route::get('/search', 'Education/Admissions/SearchController');
    // Route::get('/{id?}', 'Education\Admissions\IndexController')->name('admissions');
    // Route::post('/', 'Education/Admissions/StoreController');
    // Route::patch('/{id}', 'Education/Admissions/UpdateController');
    // Route::delete('/{id}', 'Education/Admissions/DestroyController');

});

// Manage Lessons
Route::prefix('lessons')->group(function() {

    // Route::get('/search', 'Education/Lessons/SearchController');
    Route::get('/{id?}', 'Education/Lessons/IndexController');
    // Route::post('/', 'Education/Lessons/StoreController');
    // Route::patch('/{id}', 'Education/Lessons/UpdateController');
    // Route::delete('/{id}', 'Education/Lessons/DestroyController');

});

// Manage Auditions
Route::prefix('auditions')->group(function() {

    // Route::get('/search', 'Education/Auditions/SearchController');
    Route::get('/{id?}', 'Education/Auditions/IndexController')->name('auditions');
    // Route::post('/', 'Education/Auditions/StoreController');
    // Route::patch('/{id}', 'Education/Auditions/UpdateController');
    // Route::delete('/{id}', 'Education/Auditions/DestroyController');

});

// Audition
Route::get('/audition', 'Education\Audition\IndexController');
// Route::post('/audition', 'Education\Audition\StoreController');

// Manage Sessions
Route::prefix('sessions')->group(function() {

    // Route::get('/search', 'Education/Sessions/SearchController');
    Route::get('/{id?}', 'Education/Sessions/IndexController')->name('sessions');
    // Route::post('/', 'Education/Sessions/StoreController');
    // Route::patch('/{id}', 'Education/Sessions/UpdateController');
    // Route::delete('/{id}', 'Education/Sessions/DestroyController');

});

Route::prefix('transfers')->group(function() {

    // Route::get('/{id?}', 'Education\Transfers\IndexController')->name('transfers');

});

// Manage Forms
Route::prefix('forms')->group(function() {

    Route::get('/search', 'Education\Forms\SearchController');
    Route::get('/{id?}', 'Education\Forms\IndexController')->name('forms');
    // Route::post('/', 'Education\Forms\StoreController');
    // Route::patch('/{id}', 'Education\Forms\UpdateController');
    // Route::delete('/{id}', 'Education\Forms\DestroyController');

});

*/