<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\AccountManagementController;
use App\Http\Controllers\PostReportController;

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
    return view('welcome');
})->name('home');

Route::view('/login-page', '/login-page')->name('login.page');
Route::view('/registration', '/register-page')->name('register.page');
Route::view('/about-us', '/about-us')->name('aboutus.page');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login-required', 'required')->name('login.page.reuired');

    Route::post('/login', 'login')->name('login');
    Route::post('/register', 'register')->name('register');

});

Route::group(['prefix' => 'logged-in', 'middleware' => 'auth'], function()
{
    Route::controller(AuthController::class)->group(function () {

        Route::get('/job-list', 'jobList')->name('job.list');
        Route::get('/edit-account', 'changeAccountDetailsPage')->name('edit.account.page');
        Route::post('/edit-name', 'changeName')->name('edit.name');
        Route::post('/change-password', 'changePassword')->name('change.password');
        Route::get('/logout', 'logout')->name('logout');

    });
    Route::view('/post-job', '/authpages/create-job')->name('create.job.page');

    Route::controller(JobController::class)->group(function () {
        Route::post('/job-posted', 'postJob')->name('job.posted');
        Route::get('/job-posted', 'myPostJob')->name('my.job.posted');
        Route::get('/view-job/{job}', 'viewJob')->name('view.job');
        Route::get('/view-my-job/{job}', 'viewMyPostJob')->name('view.my.post');
        Route::get('/delete/{job}', 'deleteJob')->name('delete.job');
        Route::get('/update-job/page/{job}', 'updateJobPage')->name('update.job.page');
        Route::post('/update-job/{job}', 'updateJob')->name('update.job');
        Route::post('/sumbit/{job}', 'submitResume')->name('submit');
 

    });
    Route::controller(PostReportController::class)->group(function () {
        Route::post('/report/{job}', 'report')->name('report');
        Route::get('/view-reported-post/{job}', 'viewReportedPost')->name('view.reported');
        Route::get('/unlist-post/{job}', 'unlistPost')->name('unlist');


    });
    
    Route::group(['middleware' => 'super.admin'], function () {
        Route::controller(AccountManagementController::class)->group(function () {
            Route::get('/account-management', 'accountmanageMentPage')->name('account.management');
            Route::get('/disable-temp{user}', 'tempDisable')->name('temp.disable.account');
            Route::get('/disable-account{user}', 'disable')->name('disable.account');
        });
        Route::controller(PostReportController::class)->group(function () {
            Route::get('/report-post', 'reportPostPage')->name('report.post.management');

        });
    });

    // Route::group(['prefix' => 'super-admin', 'middleware' => 'auth'], function()
    // {
    //     // Route::get('/job-list', 'jobList')->name('job.list');

    // });

});












