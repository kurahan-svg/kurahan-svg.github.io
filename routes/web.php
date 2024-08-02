<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\TmaterialController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProyekController;
use App\Http\Controllers\TproyekController;
use App\Http\Controllers\AlatberatController;
use App\Http\Controllers\PerkakasController;
use App\Http\Controllers\DownloadController;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login_proses'])->name('login-proses');
Route::post('logout', [LogoutController::class, 'index'])->name('logout');
Route::post('logout', [LogoutController::class, 'logout'])->name('logout-proses');
Route::get('home', [HomeController::class, 'Home'])->name('home');
Route::get('guest', [GuestController::class, 'Guest'])->name('guest');
Route::get('gproyek', [GuestController::class, 'Gproyek'])->name('gproyek');
Route::get('gmaterial', [GuestController::class, 'Gmaterial'])->name('gmaterial');
Route::get('galatberat', [GuestController::class, 'Galatberat'])->name('galatberat');
Route::get('gperkakas', [GuestController::class, 'Gperkakas'])->name('gperkakas');

Route::get('material', [MaterialController::class, 'Material'])->name('material');
Route::get('Tmaterial', [TmaterialController::class, 'Tmaterial'])->name('Tmaterial');
Route::post('Tmaterial', [TmaterialController::class, 'add'])->name('addM');
Route::get('/Ematerial/{id_material}/edit', [TmaterialController::class, 'edit'])->name('Ematerial');
Route::post('/Ematerial/{id_material}', [TmaterialController::class, 'update'])->name('material.update');
Route::get('/deleteM/{id_material}', [TmaterialController::class, 'delete'])->name('Dmaterial');
Route::get('/searchM', [TmaterialController::class, 'cari'])->name('cariM');

Route::get('proyek', [ProyekController::class, 'Proyek'])->name('proyek');
Route::get('Tproyek', [TproyekController::class, 'Tproyek'])->name('Tproyek');
Route::post('Tproyek', [TproyekController::class, 'add'])->name('addProyek');
Route::get('/Eproyek/{id_proyek}/edit', [TproyekController::class, 'edit'])->name('Eproyek');
Route::post('/Eproyek/{id_proyek}', [TproyekController::class, 'update'])->name('proyek.update');
Route::get('/deleteP/{id_proyek}', [TproyekController::class, 'delete'])->name('Dproyek');
Route::get('/searchProyek', [TproyekController::class, 'cari'])->name('cariproyek');

Route::get('/fetch-project-id', [TmaterialController::class, 'fetchProjectId'])->name('fetch.project.id');

Route::get('alat', [AlatberatController::class, 'alat'])->name('alat');
Route::get('Talatberat', [AlatberatController::class, 'Talatberat'])->name('Talatberat');
Route::post('Talatberat', [AlatberatController::class, 'add'])->name('add');
Route::get('/Ealatberat/{id_alatberat}/edit', [AlatberatController::class, 'edit'])->name('Ealatberat');
Route::post('/Ealatberat/{id_alatberat}', [AlatberatController::class, 'update'])->name('alatberat.update');
Route::get('/deleteA/{id_alatberat}', [AlatberatController::class, 'delete'])->name('Dalatberat');;
Route::get('/searchA', [AlatberatController::class, 'cari'])->name('cariA');

Route::get('perkakas', [PerkakasController::class, 'perkakas'])->name('perkakas');
Route::get('Tperkakas', [PerkakasController::class, 'Tperkakas'])->name('Tperkakas');
Route::post('Tperkakas', [PerkakasController::class, 'add'])->name('addP');
Route::get('/Eperkakas/{id_perkakas}/edit', [PerkakasController::class, 'edit'])->name('Eperkakas');
Route::post('/Eperkakas/{id_perkakas}', [PerkakasController::class, 'update'])->name('perkakas.update');
Route::get('/deletePer/{id_perkakas}', [PerkakasController::class, 'delete'])->name('Dperkakas');
Route::get('/search', [PerkakasController::class, 'index'])->name('cari');


Route::get('/download', [DownloadController::class, 'downloadAll'])->name('download-all');
