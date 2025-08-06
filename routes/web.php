<?php

use Illuminate\Support\Facades\Route;

$path = "App\Http\Controllers";

Route::get('/', "$path\LandingPageController@index")->name("homepage");
Route::get('/about', "$path\LandingPageController@about")->name("about");
Route::get('/board-management', "$path\LandingPageController@boardManagement")->name("board-management");
Route::get('/events', "$path\LandingPageController@events")->name("events");
Route::get('/event-registration/{events}', "$path\LandingPageController@eventsRegis")->name("eventsRegis");
Route::get('/event-detail/{events}', "$path\LandingPageController@eventsDetail")->name("events-detail");
// Route::get('/events-1', "$path\LandingPageController@events1")->name("events1");
// Route::get('/events-2', "$path\LandingPageController@events2")->name("events2");
Route::get('/membership-signup', "$path\LandingPageController@membershipSignup")->name("membership-signup");
Route::get('/membership', "$path\LandingPageController@membership")->name("membership");
Route::get('/contact-us', "$path\LandingPageController@contactUs")->name("contact-us");
Route::get('/newsroom', "$path\LandingPageController@newsroom")->name("newsroom");

Route::get('/admin', "$path\LandingPageController@admin")->name("admin");
Route::get('/member-login', "$path\LandingPageController@admin")->name("member-login");

Route::get('/dashboard', "$path\DashboardController@index")->name("dashboard-index");

Route::get('/setup-password', "$path\AuthController@setupPasswordForm")->name('setup-password')->middleware('signed');

// Route::middleware('auth:api')->group(function () {
//     $path = "App\Http\Controllers";
// });
