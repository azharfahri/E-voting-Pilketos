<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KandidatsController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SuaraController;
use App\Http\Middleware\isAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', function () {
    return view('user.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/testing', function () {
    return view('layouts.admin');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware'=> ['auth', isAdmin::class]
], function (){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('jurusan', JurusanController::class);
    Route::resource('kelas', KelasController::class)->parameters(['kelas' => 'kelas']);
    Route::resource('periode', PeriodeController::class);
    Route::resource('pemilih', PemilihController::class);
    Route::resource('kandidat', KandidatsController::class);
    Route::resource('suara', SuaraController::class);
});









// Route::group(['middleware' => ['auth']], function () {
//     Route::resource('jurusan', JurusanController::class);
// });
