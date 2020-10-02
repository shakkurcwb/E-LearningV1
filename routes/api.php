<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Account Module
Route::get('/availabilities', 'Account\Availabilities\API\GetAvailabilitiesController');
Route::post('/availabilities', 'Account\Availabilities\API\UpdateAvailabilitiesController');

// Merchant Module
Route::get('/plans', 'Merchant\Plans\API\ListPlansController');

Route::post('/subscribe', 'Merchant\Subscribe\API\SubscribePlanController');

Route::post('/coupons/check', 'Merchant\Coupons\API\GetCouponBySlugController');

// Education Module
Route::get('/forms/{id}', 'Education\Forms\API\GetFormController');
Route::post('/forms', 'Education\Forms\API\StoreFormController');
Route::put('/forms/{id}', 'Education\Forms\API\UpdateFormController');

Route::get('/schedule/tutors', 'Education\Schedule\API\ListTutorsController');
Route::post('/schedule', 'Education\Schedule\API\ScheduleSessionsController');