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
        $groups = \App\Models\Group::count();
        $members = \App\Models\Member::count();
        $users = \App\Models\User::count();
        $roles = \App\Models\Role::count();
        return view('adminlte.index',compact('groups','members','users','roles'));
    })->name('dashboard');

    Route::get('members/import-excel',[\App\Http\Controllers\MembersController::class,'createExcel'])->name('members.createExcel');
    Route::post('members/import-excel-post',[\App\Http\Controllers\MembersController::class,'storeExcel'])->name('members.storeExcel');
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
