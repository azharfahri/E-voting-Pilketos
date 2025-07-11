<?php

use App\Http\Controllers\Auth\UserLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KandidatsController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PemilihController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SuaraController;
use App\Http\Controllers\UserDashboardController;
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

Route::get('/user/login', [UserLoginController::class, 'showLoginForm'])->name('user.login');
Route::post('/user/login', [UserLoginController::class, 'login']);
Route::post('/user/logout', [UserLoginController::class, 'logout'])->name('user.logout');

Route::middleware('auth:user')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::post('/vote/{id}', [UserDashboardController::class, 'vote'])->name('user.vote');
});






// Route::group(['middleware' => ['auth']], function () {
//     Route::resource('jurusan', JurusanController::class);
// });
