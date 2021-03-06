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
    // Route::get('/', [AdminController::class, 'index']);

    Route::get('/announcements/new', [AdminController::class, 'new_announcement']);
    Route::get('/announcements', [AdminController::class, 'manage_announcements']);

    Route::POST('/announcements/save/{id}', [AdminController::class, 'save_announcement']);
    Route::POST('/announcements/home/save/{id}',[AdminController::class, 'save_announcement_home']);

    //  Manage Announcements
    Route::get('/announcements/management/{id}/edit', [AdminController::class, 'edit_announcement']);
    Route::get('/announcements/{id}/edit', [AdminController::class, 'edit_announcement_home']);

    Route::get('/announcements/management/{id}/delete',[AdminController::class, 'delete_announcement']);
    Route::get('/announcements/{id}/delete', [AdminController::class, 'delete_announcement_home']);

    Route::post('/announcements/management/{id}/update', [AdminController::class, 'update_announcement']);
    Route::post('/announcements/{id}/update', [AdminController::class, 'update_announcement_home']);

    // Faculty
    Route::get('/faculties/new',[AdminController:: class, 'new_faculty']);
    Route::get('/faculties',[AdminController:: class, 'manage_faculties']);
    Route::POST('/faculty/new-faculty',[AdminController:: class, 'save_new_faculty']);
    Route::get('/faculties/management/{id}/edit',[AdminController:: class, 'edit_faculties']);
    Route::get('/faculties/management/{id}/delete',[AdminController:: class, 'delete_faculties']);
    Route::post('/faculties/management/{id}/update',[AdminController:: class, 'update_faculties']);


    //  Departments

    Route::get('/departments/new',[AdminController :: class ,'new_department']);
    Route::get('/departments',[AdminController :: class,'manage_departments']);
    Route::POST('/department/new-department',[AdminController :: class,'save_new_department']);
    Route::get('/departments/management/{id}/edit',[AdminController :: class,'edit_department']);
    Route::get('/departments/management/{id}/delete',[AdminController :: class,'delete_department']);
    Route::post('/departments/management/{id}/update',[AdminController :: class,'update_department']);

    // Control Panel
    Route::get('/control/users',[AdminController::class ,'control_panel']);
    Route::get('/control/users/add',[AdminController::class ,'add_user']);
    Route::post('/control/users/save',[AdminController::class ,'new_user']);

    // Groups
    Route::get('/semesters/new',[AdminController::class, 'new_semester']);
    Route::get('/semesters',[AdminController::class, 'manage_semesters']);
    Route::get('/semester-details',[AdminController::class, 'semester_details']); // test
    Route::post('semester/new-semester',[AdminController:: class,'save_new_semesters']); // test
    Route::get('/search',[AdminController:: class,'search']);
    Route::post('/ajaxRequest',[AdminController:: class,'ajaxRequest']);


    //test
    // Route::get('teams/new',[AdminController::class,'new_team']);
    // Thiếu route quản lý team
    Route::get('/team-details',[AdminController::class,'team_details']);

    Route::get('/topics/new',[AdminController:: class,'new_topic']);
    Route::get('/topics/pending',[AdminController::class, 'pending_topics']);
    Route::get('/topics',[AdminController:: class,'manage_topics']);

    Route::get('/plans/new',[AdminController:: class,'new_plan']);
    Route::get('/plans',[AdminController:: class,'manage_plans']);
    // Teams test
    Route::get('/new-team',[AdminController::class, 'new_team']); // test


    // Dẹp, khỏi làm

    Route::get('/users/{id}/unemail_active',[AdminController :: class,'unemail_active']);
    Route::get('/users/{id}/email_active',[AdminController :: class,'email_active']);

    //=====
    Route::get('/users/{id}/active',[AdminController :: class,'active']);
    Route::get('/users/{id}/unactive',[AdminController :: class,'unactive']);
    //=====
    Route::get('/users/{id}/delete',[AdminController :: class,'delete_users']);

    Route::get('/users/{id}/edit', [AdminController::class, 'edit_account']);
    Route::post('/users/{id}/edit', [AdminController::class, 'account_update']);

    //===== Plan
    Route::post('plan/new-plan', [AdminController::class, 'save_plan']);
    Route::get('/plans/{id}/edit', [AdminController::class, 'edit_plans']);
    Route::get('/plans/{id}/delete', [AdminController::class, 'delete_plans']);
    Route::post('plan/{id}/update-plan', [AdminController::class, 'update_plan']);

//======
    Route::post('ajaxTeam', [AdminController::class, 'ajax_team']);
    Route::post('topic/new-topic', [AdminController::class, 'save_topic']);
    Route::get('/old-topics', [AdminController::class,'old_topic']);
    Route::get('topics/{id}/edit', [AdminController::class, 'edit_topic']);
    Route::post('/topic/{id}/update-topic', [AdminController::class, 'update_topic']);

    Route::get('/topics/{id}/delete', [AdminController::class, 'delete_topic']);
    Route::get('/topic/{id}/duocchon',[AdminController :: class,'duocchon']);

});


// Mentor
Route::group(['prefix' => 'mentor', 'middleware' => ['auth', 'mentor', 'verified']], function() {

    Route::get('/teams',[MentorController::class,'team_list']);


});

// User
Route::group(['middleware' => ['auth', 'verified']], function() {

    Route::get('/profile/{id}', [HomeController::class, 'account_settings'])->middleware('profile.owner')->name('profile');
    Route::post('/profile/{id}', [HomeController::class, 'account_update'])->middleware('profile.owner');

    // My Team
    Route::get('/semesters', [HomeController::class,'semesters']);
    Route::get('/semesters/id', [HomeController::class,'semester_details']);

    // Topics
    Route::get('/topics', [HomeController::class,'pick_topic']);

    Route::get('/old-topics', [HomeController::class,'pick_topic_old']);

    Route::get('/topics/request', [HomeController::class,'request_topic']);
    Route::get('/topics/id', [HomeController::class,'topic_details']);





});

