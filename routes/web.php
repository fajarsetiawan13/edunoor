<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\QRCodesController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ArticlesController;

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

// MAIN ROUTES
Route::get('/', [MainController::class, 'index'])->name('login');
Route::get('/articles', [MainController::class, 'articles']);
Route::get('/articles/{article}', [MainController::class, 'articles_show']);
Route::get('/statistics', [MainController::class, 'statistics']);
Route::get('/about', [MainController::class, 'about']);
Route::post('/login', [MainController::class, 'authenticate']);
Route::post('/logout', [MainController::class, 'logout']);

// DASHBOARD ROUTES
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/users', [DashboardController::class, 'users'])->middleware('auth');
Route::get('/dashboard/schools', [SchoolController::class, 'index'])->middleware('auth');
Route::get('/dashboard/schools/{id}', [SchoolController::class, 'school_profile'])->middleware('auth');
Route::get('/dashboard/questionare', [SchoolController::class, 'questionare'])->middleware('auth');
Route::get('/setting', [DashboardController::class, 'setting'])->middleware('auth');
Route::get('/check/slug', [DashboardController::class, 'check_slug'])->middleware('auth');
Route::post('/setting', [DashboardController::class, 'setting_store']);
Route::put('/setting', [DashboardController::class, 'setting_update']);

Route::resource('/dashboard/articles', ArticlesController::class);

// QR ROUTES
Route::get('/qr', [QRCodesController::class, 'index'])->middleware('auth');
Route::get('/gen-qr-school/{school}', [QRCodesController::class, 'gen_school'])->middleware('auth');
Route::get('/gen-qr-students/{school}', [QRCodesController::class, 'gen_students'])->middleware('auth');
Route::get('/sch/{school}', [SchoolController::class, 'show_school'])->middleware('auth');
Route::get('/sch/{school}/edit', [SchoolController::class, 'edit_infrastructure'])->middleware('auth');
Route::get('/std/{student}', [SchoolController::class, 'show_student'])->middleware('auth');
Route::put('/sch/{school}', [SchoolController::class, 'change_infrastructure']);

// STAT ROUTES
