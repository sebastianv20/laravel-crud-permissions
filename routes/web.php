<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//group by auth
Route::group(['middleware' => 'auth'], function () {

    Route::get('/',[HomeController::class, 'index'])->name('home');

    //users
    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('permission:view_users');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('permission:create_users');
    Route::post('/users/store', [UserController::class, 'store'])->name('users.store')->middleware('permission:edit_users');
    Route::get('/users/edit/{user}', [UserController::class, 'edit'])->name('users.edit')->middleware('permission:view_users');
    Route::put('/users/update/{user}', [UserController::class, 'update'])->name('users.update')->middleware('permission:edit_users');

    //permissions
    Route::get('/permissions', [UserController::class, 'permissions'])->name('users.permissions')->middleware('permission:edit_users');
    Route::post('/permissions/store', [UserController::class, 'storePermissions'])->name('users.permissions.store')->middleware('permission:edit_users');

    //roles
    Route::get('/roles', [RoleController::class, 'index'])->name('roles.index')->middleware('permission:view_roles');
    Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create')->middleware('permission:edit_roles');
    Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store')->middleware('permission:edit_roles');
    Route::get('/roles/edit/{role}', [RoleController::class, 'edit'])->name('roles.edit')->middleware('permission:edit_roles');
    Route::put('/roles/update/{role}', [RoleController::class, 'update'])->name('roles.update')->middleware('permission:edit_roles');

    //posts
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create')->middleware('permission:create_posts');
    Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store')->middleware('permission:edit_posts');
    Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit')->middleware('permission:view_posts');
    Route::put('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('permission:edit_posts');
    Route::delete('/posts/delete/{post}', [PostController::class, 'destroy'])->name('posts.delete')->middleware('permission:destroy_posts');

});


