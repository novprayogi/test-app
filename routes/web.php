<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('adminlte.index');
    })->name('dashboard');

    Route::resources([
        'users' => \App\Http\Controllers\UsersController::class,
        'roles' => \App\Http\Controllers\RolesController::class,
        'groups' => \App\Http\Controllers\GroupsController::class,
        'members' => \App\Http\Controllers\MembersController::class
    ]);

//    Route::get('/permissions', function () {
//        return view('adminlte.index');
//    })->name('permissions.index');
});

require __DIR__.'/auth.php';
