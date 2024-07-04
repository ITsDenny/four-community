<?php

use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\WebAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->controller(WebAdminController::class)->group(function () {
    Route::get('/', 'hello');
    Route::get('/member-list', 'getMember');
});

Route::prefix('member')->controller(MemberController::class)->group(function () {
    Route::get('/add-member', 'memberForm');
    Route::post('/submit-member', 'store')->name('submit-member');
    Route::delete('/{id}/delete', 'delete')->name('delete-member');
});


Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'getLoginForm');
});


Route::get('admin/group/add', [GroupController::class, 'addGroupForm']);
