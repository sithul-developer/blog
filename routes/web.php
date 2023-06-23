<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::get('login',[AuthController::class , 'auth_login_']);
Route::post('login',[AuthController::class , 'auth_login']);
Route::get('logout',[AuthController::class , 'auth_logout']);


Route::group(['middleware' =>'admin'] , function(){

    Route::get('admin/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('admin/admin/list', function () {
        return view('admin.admin.list');
    });
    Route::get('/', function () {
        return view('home.app');
    });

    /// Category
    Route::get('list',[CategoryController::class , 'list']);
    Route::get('add',[CategoryController::class , 'add']);
    Route::post('add',[CategoryController::class , 'insert']);
    Route::delete('delete',[CategoryController::class , 'delete']);


});

///////













