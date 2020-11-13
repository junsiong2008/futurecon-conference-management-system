<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Helpers\LogActivity;
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


// Route that can be accessed by public users
Route::post('/participants/prefill', 'ParticipantController@preStep');
Route::get('/participants/create-step1', 'ParticipantController@createStep1');
Route::post('/participants/create-step1', 'ParticipantController@postCreateStep1');
Route::get('/participants/create-step2', 'ParticipantController@createStep2');
Route::post('/participants/create-step2', 'ParticipantController@postCreateStep2');
Route::post('/participants/store', 'ParticipantController@store');
Route::get('/participants/successful', 'ParticipantController@successful');

// Route to test activity logger
Route::get('/add-to-log', 'HomeController@myTestAddToLog');


// Disable register page
Auth::routes(['register' => false]);


// Routes that can be accessed after admin is authenticated
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::resource('user', 'Admin\DashboardController');

    Route::put('/participant/{id}/verify', 'Admin\ParticipantController@verify');
    Route::resource('participant', 'Admin\ParticipantController');

    Route::put('/payment/{id}/verify', 'Admin\PaymentController@verify');
    Route::get('/payment', 'Admin\PaymentController@index');


    Route::put('/attendance/{id}/verify', 'Admin\AttendanceController@verify');
    Route::get('/attendance', 'Admin\AttendanceController@index');

    Route::delete('/logActivity/{id}', 'Admin\LogController@destroy');
    Route::post('/logActivity/clear', 'Admin\LogController@clearLog');
    Route::get('/logActivity', 'Admin\LogController@logActivity');


    Route::get('/about/{id}/edit', 'Admin\AboutController@edit');
    Route::put('/about/{id}', 'Admin\AboutController@update');
    Route::get('/about', 'Admin\AboutController@index');


    Route::resource('speaker', 'Admin\SpeakerController');
    Route::resource('fee', 'Admin\FeeController');
    Route::resource('faq', 'Admin\FaqController');
    Route::resource('schedule', 'Admin\ScheduleController');
    Route::resource('track', 'Admin\TrackController');
});


// Route to access home page and login page
Route::get('/home', 'HomeController@index');
Route::get('/admin', function () {
    return view('auth.login');
});
Route::get('/', 'HomeController@index');
