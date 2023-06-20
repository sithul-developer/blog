<?php

use App\Http\Controllers\All_User_Role_Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CreateUserController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostControler;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserRoleController;
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




Route::get('login', [AuthController::class, 'auth_login_']);
Route::post('login', [AuthController::class, 'auth_login']);
Route::get('logout', [AuthController::class, 'auth_logout']);

/*====================================== Start_Controller_Home ==========================*/
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('Article/{id}', [HomeController::class, 'Article'])->name('Article');
/*====================================== End_Controller_Home ==========================*/




Route::group(['middleware' => 'admin'], function () {

    Route::get('admin/dashboard', function () {
        $data['header_title'] = 'Dashboard';
        return view('admin.dashboard', $data);
    });

    /// Category
    Route::get('category', [CategoryController::class, 'list']);
    Route::get('category/add', [CategoryController::class, 'add']);
    Route::post('category/add', [CategoryController::class, 'insert']);
    Route::get('category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('category/update/{id}', [CategoryController::class, 'update']);
    Route::delete('category/delete', [CategoryController::class, 'delete']);

    /// tag
    Route::get('tags', [TagController::class, 'list']);
    Route::get('tags/add', [TagController::class, 'add']);
    Route::post('tags/add', [TagController::class, 'insert']);
    Route::get('tags/edit/{id}', [TagController::class, 'edit']);
    Route::post('tags/update/{id}', [TagController::class, 'update']);
    Route::delete('tags/delete/', [TagController::class, 'delete']);
    // slider
    Route::get('sliders', [SliderController::class, 'list']);
    Route::get('sliders/add', [SliderController::class, 'add']);
    Route::post('sliders/add', [SliderController::class, 'insert']);
    Route::get('sliders/edit/{id}', [SliderController::class, 'edit']);
    Route::post('sliders/update/{id}', [SliderController::class, 'update']);
    Route::delete('sliders/delete/', [SliderController::class, 'delete']);
    // footer
    Route::get('footer', [FooterController::class, 'list']);
    Route::get('footer/add', [FooterController::class, 'add']);
    Route::post('footer/add', [FooterController::class, 'insert']);
    Route::get('footer/edit/{id}', [FooterController::class, 'edit']);
    Route::post('footer/update/{id}', [FooterController::class, 'update']);
    Route::delete('footer/delete/', [FooterController::class, 'delete']);

    // post
    Route::get('posts', [PostController::class, 'list']);
    Route::get('posts/add', [PostController::class, 'add']);
    Route::post('posts/add', [PostController::class, 'insert']);
    Route::get('posts/edit/{id}', [PostController::class, 'edit']);
    Route::put('posts/update/{id}', [PostController::class, 'update']);
    Route::delete('posts/delete/', [PostController::class, 'delete']);

    // gallery
    Route::get('gallery', [GalleryController::class, 'list']);
    Route::get('gallery/add', [GalleryController::class, 'add']);
    Route::post('gallery/add', [GalleryController::class, 'insert']);
    Route::get('gallery/edit/{id}', [GalleryController::class, 'edit']);
    Route::post('gallery/update/{id}', [GalleryController::class, 'update']);
    Route::delete('gallery/delete/', [GalleryController::class, 'delete']);


    /*====================================== Start_Controller_ User_Role ==========================*/

    Route::prefix('admin')->group(function () {

        //  user role
        Route::get('all/user/', [UserRoleController::class, 'all_store_user']);
        Route::post('add/role', [UserRoleController::class, 'insert_role']);
        Route::get('/edit/user/{id}', [UserRoleController::class, 'edit_user']);
        Route::post('/user/update/{id}', [UserRoleController::class, 'update_user']);
        Route::delete('role/delete', [UserRoleController::class, 'delete_role']);
        Route::get('/create/user', [UserRoleController::class, 'create_user']);
        Route::post('/create/user', [UserRoleController::class, 'store_user']);
    });

    /*====================================== Start_Controller_ User_Role ==========================*/









    //ckeditor
    Route::post('/upload', 'App\Http\Controllers\PostController@upload')->name('ckeditor.upload');
});

///////
