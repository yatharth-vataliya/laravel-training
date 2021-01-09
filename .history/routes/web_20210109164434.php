<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\StudentController;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {

    Route::get('/manage_users/index', [ManageUserController::class, 'index'])->name('manage_users.index');

    Route::get('/ajax-manage-users-data',[ManageUserController::class, 'ajaxManageUsersData'])->name('ajax-manage-users-data');

    Route::get('/students/index',[StudentController::class, 'index'])->name('students.index');

//    Route::view('/students/create','students.create')->name('students.create');
    Route::get('/students/create',[StudentController::class, 'create'])->name('students.create');

    Route::post('/students/store',[StudentController::class,'store'])->name('students.store');

    Route::get('/students/ajax-students-data',[StudentController::class, 'ajaxStudentsData'])->name('ajax-students-data');

    Route::get('/students/edit/{student}',[StudentController::class, 'edit'])->name('students.edit');

    Route::post('/students/update',[StudentController::class, 'update'])->name('students.update');

    Route::post('/students/destroy',[StudentController::class,'destroy'])->name('students.destroy');

});
