<?php

use App\Http\Controllers\UtilsController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Image;
use App\Livewire\LoginExterno;

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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('inspeccion', 'inspeccion')
    ->middleware(['auth', 'verified'])
    ->name('inspeccion');

Route::view('images', 'images')
    ->middleware(['auth', 'verified'])
    ->name('images');

Route::post('/upload/image', [Image::class, 'uploadImages'])->name("pay-plan");
Route::get('/l/e', LoginExterno::class)->name('login-externo');
Route::get('/v/{la}/{lo}', [UtilsController::class, 'valida_coordenadas'])->name('valida-coordenadas');
Route::view('g', 'geolocalizacion')->name('geolocalizacion');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
