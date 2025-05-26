<?php

use L5Swagger\L5Swagger;
use Illuminate\Support\Facades\Route;

$path = "App\Http\Controllers";

Route::get('/', function () {
    return "it workssss";
});
//LANDING PAGE
Route::post('/membership', "$path\MembershipController@store")->name('memberShip');
Route::post('/contact-us', "$path\ContactusController@store")->name('contactUs');
Route::post('/event-registration', "$path\EventRegistrationController@store")->name('eventRegis');

Route::post('/register', "$path\AuthController@register");
Route::post('/login', "$path\AuthController@login")->name("login");

Route::get('/detail-events/{events}', "$path\EventsController@show")->name("event-detail");

Route::middleware('auth:api')->group(function () {
    $path = "App\Http\Controllers";
    Route::get('/me', "$path\AuthController@me");

    /* NEWS */
    Route::get('/news/{page}', "$path\NewsController@index");
    Route::post('/news/', "$path\NewsController@store");
    Route::post('/update-news/', "$path\NewsController@update");
    /* END NEWS */

    /* EVENTS */
    Route::get('/events/{page}', "$path\EventsController@index")->name("list-events");
    Route::post('/events/', "$path\EventsController@store")->name("create-events");
    Route::post('/update-events/', "$path\EventsController@update")->name("update-events");
    Route::get('/previous-events/{page}', "$path\EventsController@previousEvents")->name("list-previous-events");
    Route::post('/upload-gallery-events', "$path\EventsController@eventUploadPhotoGallery")->name("upload-gallery-events");
    Route::post('/delete-photo-gallery-events', "$path\EventsController@deletePhotoGalleryEvent")->name("delete-gallery-events");
    Route::post('/publish-previous-events', "$path\EventsController@publishToPrevious")->name("publish-previous-events");
    /* END EVENTS */

    /* EMAIL ADMIN */
    Route::get('/email-admin/{page}', "$path\EmailAdminController@index");
    Route::post('/email-admin/', "$path\EmailAdminController@store");
    Route::post('/update-email/', "$path\EmailAdminController@update");
    /* END EMAIL ADMIN */

    // Route::get('/me', [AuthController::class, 'me']);
    Route::get('/logout', "$path\AuthController@logout")->name("logout");
    // Route::post('/refresh', [AuthController::class, 'refresh']);
});