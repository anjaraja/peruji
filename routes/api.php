<?php

use L5Swagger\L5Swagger;
use Illuminate\Support\Facades\Route;

$path = "App\Http\Controllers";

Route::get('/', function () {
    return "it workssss";
});
//LANDING PAGE
Route::post('/membership', "$path\MembershipController@store");
Route::post('/contact-us', "$path\ContactusController@store");
Route::post('/event-registration', "$path\EventRegistrationController@store");

Route::post('/register', "$path\AuthController@register");
Route::post('/login', "$path\AuthController@login");

Route::middleware('auth:api')->group(function () {
    $path = "App\Http\Controllers";
    Route::get('/me', "$path\AuthController@me");
    Route::get('/news/{page}', "$path\NewsController@index");
    Route::post('/news/', "$path\NewsController@store");
    Route::post('/update-news/', "$path\NewsController@update");
    // Route::get('/me', [AuthController::class, 'me']);
    // Route::post('/logout', [AuthController::class, 'logout']);
    // Route::post('/refresh', [AuthController::class, 'refresh']);
});