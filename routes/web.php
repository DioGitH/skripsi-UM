<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SessionAdminController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryaMasukController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\DataKaryaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuideController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\ActivityController;
use App\Http\Middleware\IsLogin;
use App\Http\Middleware\OnLogin;
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
Route::get('/captcha-refresh', function () {
    return captcha_img();
});

Route::get('/', [HomeController::class, 'index'])->middleware(IsLogin::class)->name('home');
Route::get('/unggah/{jenisKarya}', [HomeController::class, 'create'])->middleware(IsLogin::class)->name('karya.create');
Route::post('/unggah', [HomeController::class, 'store'])->middleware(IsLogin::class)->name('karya.store');
// Pilih jenis karya berdasarkan profesi
Route::get('/jelajahi/{profesi}', [KaryaController::class, 'showJenis'])->middleware(IsLogin::class)->name('jelajahi.profesi');
Route::get('/karya/{id}', [KaryaController::class, 'show'])->middleware(IsLogin::class)->name('karya.show');
Route::delete('/karya/{id}', [ActivityController::class, 'destroy'])->middleware(IsLogin::class)->name('karya.destroy');


// Tampilkan karya berdasarkan profesi + jenis karya
Route::get('/jelajahi/{profesi}/{jenisKarya}', [KaryaController::class, 'filterKarya'])->middleware(IsLogin::class)->name('jelajahi.karya');

Route::get('login', [SessionController::class, 'index'])->middleware(OnLogin::class)->name('login');
Route::post('login/store', [SessionController::class, 'login']);
Route::post('logout', [SessionController::class, 'logout'])->name('logout');
Route::get('register', [SessionController::class, 'register'])->middleware(OnLogin::class)->name('register');
Route::post('register/store', [SessionController::class, 'regisStore'])->name('register.store');
Route::get('guide', [GuideController::class, 'index'])->middleware(IsLogin::class)->name('guide');
Route::get('about', [AboutController::class, 'index'])->middleware(IsLogin::class)->name('about');
Route::get('faq', [FaqController::class, 'index'])->middleware(IsLogin::class)->name('faq');
Route::get('activity', [ActivityController::class, 'index'])->middleware(IsLogin::class)->name('activity');
Route::get('activitylist', [ActivityController::class, 'activityList'])->middleware(IsLogin::class)->name('activitylist');

Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::get('/data', [DataKaryaController::class, 'index'])->name('data.create');
        Route::get('/karya', [KaryaMasukController::class, 'index'])->name('karya');
        Route::get('/karya/{id}/preview', [KaryaMasukController::class, 'preview'])->name('admin.karya.preview');
        Route::get('/konfirmasi', [KonfirmasiController::class, 'index'])->name('konfirmasi');
        Route::get('/arsip', [KonfirmasiController::class, 'indexArsip'])->name('arsip');
        Route::get('/publikasi', [PublikasiController::class, 'index'])->name('publikasi');
        Route::get('/admin/konfirmasi/{id}/pratinjau', [KonfirmasiController::class, 'show'])->name('karya.pratinjau');
        Route::patch('/admin/karya/{id}/publish', [KonfirmasiController::class, 'publish'])->name('karya.publish');
        Route::patch('/admin/karya/{id}/arsip', [KonfirmasiController::class, 'arsip'])->name('karya.arsip');
        Route::post('/data/store', [DataKaryaController::class, 'store'])->name('data.store');
        Route::get('login', [SessionAdminController::class, 'index']);
        Route::post('session/store', [SessionAdminController::class, 'store']);

});
Route::middleware('auth:admin')->group(function () {
    Route::post('/admin/logout', function () {
        Auth::guard('admin')->logout();
        return redirect('/login')->with('success', 'Berhasil logout');
    })->name('admin.logout');
});

