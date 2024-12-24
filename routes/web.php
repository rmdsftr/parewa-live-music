<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PerformanceController;
use App\Http\Controllers\ScheduleController;


Route::get('/', [IndexController::class, 'show']);

Route::get('/schedule', [ScheduleController::class, 'show']);

Route::get('/registration', [BandController::class, 'regis']);

Route::get('/band', [BandController::class, 'list']);

Route::get('/band/{band_id}', [BandController::class, 'bandDetail']);

Route::get('/bandperform/{performance_id}', [PerformanceController::class, 'show']);

Route::get('/admin', [IndexController::class, 'adminHome']);

Route::get('/admin/schedule', [ScheduleController::class, 'index']);

Route::post('/admin/newSchedule', [ScheduleController::class, 'storeSchedule'])->name('admin.newSchedule');

Route::get('/admin/registration', [BandController::class, 'registration']);

Route::get('/admin/registration/{band_id}', [BandController::class, 'approve']);

Route::post('/admin/approve', [BandController::class, 'action']);

Route::get('/admin/band', [BandController::class, 'listBand']);

Route::get('/admin/band/{band_id}', [BandController::class, 'DetailBand']);

Route::post('admin/approvesched', [ScheduleController::class, 'approveSchedule'])->name('admin.approvesched');

Route::get('/grup', [IndexController::class, 'bandHome']);

Route::get('/grup/schedule', [ScheduleController::class, 'scheduleBand']);

Route::post('/grup/confirm', [ScheduleController::class, 'confirm']);

Route::get('/grup/profil', [IndexController::class, 'bandProfil']);

Route::post('/grup/request', [ScheduleController::class, 'request'])->name('grup.request');

Route::get('/grup/band', [BandController::class, 'band']);

Route::post('/upload', [PerformanceController::class, 'uploadVideo']);

Route::get('/login', function(){
    return view('user/login');
});

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function(){
    return view('user/register');
});

Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::post('registerband', [BandController::class, 'register']);

Route::post('/rating', [PerformanceController::class, 'rating'])->name('submit.rating');

Route::post('/requestSchedule', [ScheduleController::class, 'requestSchedule'])->name('schedule.request');

Route::post('/confirmSchedule', [ScheduleController::class, 'confirmSchedule'])->name('schedule.confirm');

Route::post('/cancel', [ScheduleController::class, 'cancel']);

Route::post('/edit/user', [AuthController::class, 'edituser'])->name('edit.user');

Route::post('/edit/band', [AuthController::class, 'editband'])->name('edit.band');

Route::post('/change-password', [AuthController::class, 'changePassword'])->name('edit.password');

