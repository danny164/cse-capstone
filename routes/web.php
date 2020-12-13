<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\HomeController;

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
    return redirect('/home'); // login
})->middleware('auth');

Auth::routes(['verify' => true]);

// Request verify email first after registation
Route::get('/email/verify', function () {
    return view('auth.verify');
})->middleware('auth')->name('verification.notice');

// Confirm Email when click
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// ===================
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('verified');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin', 'verified']], function() {
    Route::get('/', [AdminController::class, 'index']);
   // Route::get('/','AdminController@index');
    Route::get('announcements/new','AdminController@new_announcement');
    Route::get('announcements','AdminController@manage_announcements');
 //create
//announcements
    Route::POST('/announcements/save/{id}','AdminController@save_announcement');
    Route::POST('/announcements/home/save/{id}','AdminController@save_announcement_home');
//


//============================ Edit & Delete & Update //
//announcements
    Route::get('/announcements/management/{id}/edit','AdminController@edit_announcement');
    Route::get('/announcements/{id}/edit','AdminController@edit_announcement_home');

    Route::get('/announcements/management/{id}/delete','AdminController@delete_announcement');
    Route::get('/announcements/{id}/delete','AdminController@delete_announcement_home');

    Route::post('/announcements/management/{id}/update','AdminController@update_announcement');
    Route::post('/announcements/{id}/update','AdminController@update_announcement_home');

});

// Mentor
Route::group(['prefix' => 'mentor', 'middleware' => ['auth', 'mentor', 'verified']], function() {
    Route::get('/', [MentorController::class, 'index']);

});

// User
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'verified']], function() {
    Route::get('/', [AdminController::class, 'index']);

});
