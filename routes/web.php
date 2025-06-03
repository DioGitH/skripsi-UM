<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ActivityController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('login', [SessionController::class, 'index'])->name('login');
Route::get('register', [SessionController::class, 'register'])->name('register');
Route::get('guide', [GuideController::class, 'index'])->name('guide');
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('activity', [ActivityController::class, 'index'])->name('activity');
Route::get('activitylist', [ActivityController::class, 'activityList'])->name('activitylist');

Route::get('/hello2', function () {
    return 'Hello World';
});
