<?php
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

//Dashboard route
Route::resource('dashboard', 'HomeController@dashboard');

//MyClass route
Route::resource('myclass', 'MyClassController');

//Report route
Route::resource('report', 'ReportController');

//Profile route
Route::resource('profile', 'ProfileController');

//Admin route only
Route::resource('academic', 'AcademicController');
Route::resource('teachers', 'TeachersController');
Route::resource('classroom', 'ClassroomController');

//Auth route
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes(['register' => false]);
Route::get('/register', 'HomeController@index');
