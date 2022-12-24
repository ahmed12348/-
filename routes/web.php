<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CatController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController;
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
Auth::routes([
    'register' =>false
]);




Route::get('/', 'App\Http\Controllers\Front\HomepageController@index')->name('front.homepage');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/cat/{id}', 'App\Http\Controllers\Front\CourseController@cat')->name('front.cat');
Route::get('/cat/{id}/course/{c_id}', 'App\Http\Controllers\Front\CourseController@show')->name('front.show');
Route::get('/contact', 'App\Http\Controllers\Front\ContactController@index')->name('front.contact');

Route::post('/message/newsletter', 'App\Http\Controllers\Front\MessageController@newsletter')->name('front.message.newsletter');

Route::post('/message/contact', 'App\Http\Controllers\Front\MessageController@contact')->name('front.message.contact');
Route::post('/message/enroll', 'App\Http\Controllers\Front\MessageController@enroll')->name('front.message.enroll');

Route::get('/home', function () { return redirect('dashboard'); })->middleware('auth');
Route::get('/home', function () { return redirect('/dashboard'); })->name('home')->middleware('auth');

Route::group(['middleware'=>'auth'], function () {

Route::resource('cats', CatController::class);
Route::resource('trainers', TrainerController::class);
Route::resource('courses', CourseController::class);
Route::resource('students', StudentController::class);
Route::get('/students/{id}/courses/{c_id}/aprrove', 'App\Http\Controllers\Admin\StudentController@approveCourse')->name('students.approveCourse');
Route::get('/students/{id}/courses/{c_id}/reject', 'App\Http\Controllers\Admin\StudentController@rejectCourse')->name('students.rejectCourse');
Route::get('/students/{id}/add-to-course', 'App\Http\Controllers\Admin\StudentController@addCourse')->name('students.addCourse');
Route::post('/students/{id}/add-to-course', 'App\Http\Controllers\Admin\StudentController@storeCourse')->name('students.storeCourse');


Route::get('/dashboard', 'App\Http\Controllers\Admin\HomeController@index')->name('admin.home');
Route::get('permissions-all-users',['middleware'=>'check-permission:user|admin|superadmin','uses'=>'App\Http\Controllers\HomeController@allUsers']);
Route::get('permissions-admin-superadmin',['middleware'=>'check-permission:admin|superadmin','uses'=>'App\Http\Controllers\HomeController@adminSuperadmin']);
Route::get('permissions-superadmin',['middleware'=>'check-permission:superadmin','uses'=>'App\Http\Controllers\HomeController@superadmin']);
});


Route::get('/logout', 'App\Http\Controllers\Admin\AuthController@logout')->name('admin.logout');

// Route::get('/login', 'App\Http\Controllers\Admin\AuthController@login')->name('admin.login');
// Route::post('/dashboard/do-login', 'App\Http\Controllers\Admin\AuthController@doLogin')->name('admin.dologin');






