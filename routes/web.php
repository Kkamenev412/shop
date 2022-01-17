<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SpaController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Админ панель
//Выйти
Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
})->name('logout');
//Страницы
Route::get('/manager', function () {
    return view('manager/home');
})->middleware('role')->name('home');

Route::get('/manager/user', [UserController::class, 'allData'])->middleware('role')->name('user');
Route::get('/manager/user-client', [UserController::class, 'allDataClient'])->middleware('role')->name('user-client');
Route::get('/manager/user/delite/{id}', [UserController::class, 'deliteUser'])->middleware('role')->name('user-delite');
Route::get('/manager/user-update/{id}', [UserController::class, 'updateUser'])->middleware('role')->name('user-update');


Route::get('/manager/user-add', function () {
    return view('manager/user-add');
})->middleware('role')->name('user-add');

Route::post('/manager/user-update-submit/{id}', [UserController::class, 'updateUserSubmit'])->middleware('role')->name('user-update-submit');
Route::post('/manager/user-update-submit-pass/{id}', [UserController::class, 'updateUserPassSubmit'])->middleware('role')->name('user-update-submit-pass');
Route::post('/manager/user-update-submit-img/{id}', [UserController::class, 'updateUserImgSubmit'])->middleware('role')->name('user-update-submit-img');
Route::post('/manager/user', [UserController::class, 'submit'])->middleware('role')->name('add-user');

Route::get('/{any}', [SpaController::class, 'index'])->where('any', '.*');

