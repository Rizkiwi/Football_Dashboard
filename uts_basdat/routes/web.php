<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatistikPemainController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KompetisiController;
use App\Http\Controllers\TimController;
use App\Http\Controllers\PemainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\MatchController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\Stat_pemainController;
use App\Http\Controllers\PertandinganController;
use App\Http\Controllers\Stat_timController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\BeritaController;


Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::delete('/logout', [LoginController::class,'logout'])->name('logout');


/////// USER ///////

Route::get('/', [StatController::class,'index2']);
Route::get('/index', [StatController::class,'index2']);


Route::get('/Statistics', [StatistikPemainController::class,'Statistics'])->name('Statistics');

Route::get('/News1', [NewsController::class,'show']);

Route::get('/Analytics', [AnalyticsController::class,'index'])->name('index');
Route::post('/Analytics', [AnalyticsController::class, 'update'])->name('chart_update');


Route::get('/AboutUs', function () {
    return view('AboutUs');
});

/////// DATABASE ///////
Route::get('/db', [KompetisiController::class, 'index2']);
Route::resource('kompetisi', KompetisiController::class);


Route::get('/news_db', [NewsController::class, 'index2']);

Route::get('/pemain_db', [PemainController::class, 'index2']);
Route::resource('pemain', PemainController::class);

Route::get('/pertandingan_db', [PertandinganController::class, 'index']);
Route::resource('pertandingan', PertandinganController::class);


Route::get('/stat_pemain_db', [Stat_pemainController::class, 'index']);
Route::resource('stat_pemain', Stat_pemainController::class);


Route::get('/stat_tim_db', [Stat_timController::class, 'index']);
Route::resource('stat_tim', Stat_timController::class);


Route::get('/tim_db', [TimController::class, 'index2']);
Route::resource('tim', timController::class);


/////// FORM ///////
Route::get('/Stat', [StatController::class,'index']);
Route::post('/Stat', [StatController::class, 'store'])->name('stat');

Route::get('/form', [KompetisiController::class,'index']);
Route::post('/form', [KompetisiController::class, 'store'])->name('kompetisi');

Route::get('/Match', [MatchController::class,'index']);
Route::post('/Match', [MatchController::class, 'submitForm'])->name('submitForm');

// Route::get('/News_form', [NewsController::class,'index']);
// Route::post('/News_form', [NewsController::class, 'storenews'])->name('storenews');

Route::get('/Player', [PemainController::class,'index']);
Route::post('/Player', [PemainController::class, 'createPemain'])->name('pemain');


Route::get('/Team', [TimController::class,'index']);
Route::post('/Team', [TimController::class,'createTim'])->name('tim');

Route::get('/Berita', [BeritaController::class,'index']);
Route::post('/Berita', [BeritaController::class, 'storenews'])->name('storenews');
