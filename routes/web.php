<?php

use Illuminate\Support\Facades\Route;

$path = "App\Http\Controllers";

Route::get('/', "$path\LandingPageController@index")->name("homepage");
Route::get('/about', "$path\LandingPageController@about")->name("about");
Route::get('/board-management', "$path\LandingPageController@boardManagement")->name("board-management");
Route::get('/events', "$path\LandingPageController@events")->name("events");
Route::get('/membership-signup', "$path\LandingPageController@membershipSignup")->name("membership-signup");
Route::get('/membership', "$path\LandingPageController@membership")->name("membership");
Route::get('/contact-us', "$path\LandingPageController@contactUs")->name("contact-us");

Route::get('/admin', "$path\LandingPageController@admin")->name("admin");

Route::middleware('auth:api')->group(function () {
    $path = "App\Http\Controllers";
});
