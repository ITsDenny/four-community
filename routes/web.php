<?php


use App\Http\Controllers\LevelController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\grupaController;
use App\Http\Controllers\WebAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.welcome');
});

Route::get('/admin', [WebAdminController::class, 'hello']);
Route::get('/admin/member-list', [WebAdminController::class, 'getMember']);
Route::get('/admin/level-list', [LevelController::class, 'getLevel']);
Route::get('/admin/level/add', [LevelController::class, 'getLevel']);
Route::get('/admin/group-list', [GroupController::class, 'getGroup']);
Route::get('/admin/group/add', [GroupController::class, 'getGroup']);


Route::prefix('admin')->controller(WebAdminController::class)->group(function () {
    Route::get('/', 'hello');
    Route::get('/member-list', 'getMember');
});

Route::prefix('member')->controller(MemberController::class)->group(function () {
    Route::get('/add-member', 'memberForm');
    Route::get('{id}', 'getOne');
    Route::post('/submit-member', 'store')->name('submit-member');
    Route::put('/update-member/{id}', 'update')->name('update-member');
    Route::delete('/{id}/delete', 'delete')->name('delete-member');
});
Route::prefix('level')->controller(LevelController::class)->group(function () {
    Route::get('/add-level', 'levelform');
    Route::post('/submit-level', 'store')->name('submit-level');
    Route::delete('/{id}/delete', 'delete')->name('delete-level');
    Route::put('/update-level/{id}', 'update')->name('update-level');
    Route::get('/level-list', 'getLevel');
    Route::get('{id}', 'getOne');
});
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'getLoginForm');
});

Route::prefix('group')->controller(GroupController::class)->group(function () {
    Route::get('/add-group', 'groupform');
    Route::post('/submit-group', 'store')->name('submit-group');
    Route::delete('/{id}/delete', 'delete')->name('delete-group');
    Route::put('/update-group/{id}', 'update')->name('update-group');
    Route::get('/group-list', 'getGroup');
    Route::get('{id}', 'getOne');
});


// route:: resource('admin/grup',grupaController::class);