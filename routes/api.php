<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('create_newsletter', 'App\Http\Controllers\NewsletterController@fn_create_newsletter');

Route::post('subscribe', 'App\Http\Controllers\SubscriberController@fn_create_subscriber');

Route::get('prepare_send_newsletter', 'App\Http\Controllers\SendEmailController@fn_prepare_send_email');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
