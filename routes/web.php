<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DataKaryaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ActivityController;
use App\Http\Middleware\IsLogin;
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

Route::get('/', [HomeController::class, 'index'])->middleware(IsLogin::class)->name('home');
Route::get('/unggah/{jenisKarya}', [HomeController::class, 'create'])->name('karya.create');
Route::post('/unggah', [HomeController::class, 'store'])->name('karya.store');
Route::get('login', [SessionController::class, 'index'])->name('login');
Route::post('login/store', [SessionController::class, 'login']);
Route::get('register', [SessionController::class, 'register'])->name('register');
Route::post('register/store', [SessionController::class, 'regisStore'])->name('register.store');
Route::get('guide', [GuideController::class, 'index'])->middleware(IsLogin::class)->name('guide');
Route::get('about', [AboutController::class, 'index'])->middleware(IsLogin::class)->name('about');
Route::get('faq', [FaqController::class, 'index'])->middleware(IsLogin::class)->name('faq');
Route::get('activity', [ActivityController::class, 'index'])->middleware(IsLogin::class)->name('activity');
Route::get('activitylist', [ActivityController::class, 'activityList'])->middleware(IsLogin::class)->name('activitylist');

Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index']);
        Route::get('/data', [DataKaryaController::class, 'index'])->name('data.create');
        Route::post('/data/store', [DataKaryaController::class, 'store'])->name('data.store');
        Route::get('login', [SessionAdminController::class, 'index']);
        Route::post('session/store', [SessionAdminController::class, 'store']);

});

