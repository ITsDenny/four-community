<?php

use App\Http\Controllers\LevelController;
use App\Http\Controllers\WebAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', [WebAdminController::class, 'hello']);
Route::get('/admin/member-list', [WebAdminController::class, 'getMember']);
Route::get('/admin/level/add',[LevelController::class,'getLevelForm']);
Route::post('/submit-member',[LevelController::class, 'store'])->name('submit-member');


