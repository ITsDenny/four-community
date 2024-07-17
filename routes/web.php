<?php


use App\Http\Controllers\LevelController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Auth\AuthController;
<<<<<<< Updated upstream

=======
use App\Http\Controllers\GroupController;
use App\Http\Controllers\grupaController;
use App\Http\Controllers\UserController;
>>>>>>> Stashed changes
use App\Http\Controllers\WebAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', [WebAdminController::class, 'hello']);
Route::get('/admin/member-list', [WebAdminController::class, 'getMember']);
Route::get('/admin/level/add',[LevelController::class,'getLevelForm']);


Route::prefix('admin')->controller(WebAdminController::class)->group(function () {
    Route::get('/', 'hello');
    Route::get('/member-list', 'getMember');
});

Route::prefix('member')->controller(MemberController::class)->group(function () {
    Route::get('/add-member', 'memberForm');
    Route::post('/submit-member', 'store')->name('submit-member');
<<<<<<< Updated upstream
=======
    Route::post('/update-member/{id}', 'update')->name('update-member');
>>>>>>> Stashed changes
    Route::delete('/{id}/delete', 'delete')->name('delete-member');
});
Route::prefix('level')->controller(LevelController::class)->group(function () {
    Route::get('/add-level', 'levelform');
    Route::post('/submit-level', 'store')->name('submit-level');
<<<<<<< Updated upstream
=======
    Route::delete('/{id}/delete', 'delete')->name('delete-level');
    Route::post('/{id}/update', 'update')->name('update-level');
    Route::get('/level-list', 'getLevel');
>>>>>>> Stashed changes
});
Route::prefix('auth')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'getLoginForm');
});

<<<<<<< Updated upstream
=======
Route::get('admin/group/list', [GroupController::class, 'getAllGroup']);
Route::get('admin/group/add', [GroupController::class, 'addGroupForm']);
Route::post('admin/group', [GroupController::class, 'store']);

route:: resource('admin/grup',grupaController::class);
Route::get('admin/add-user',[UserController::class,'getUserForm']);
Route::post('admin/user',[UserController::class, 'store'])->name('submit-user');
>>>>>>> Stashed changes
