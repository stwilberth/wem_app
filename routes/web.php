<?php

use Illuminate\Support\Facades\Route;

//admin pages
Route::middleware(['role:admin'])->group(function () {
    Route::get('/hombre-show/{id}',     App\Http\Livewire\Hombre\HombreShowCtrl::class)                  ->name('dashboard-hombre-show');
    Route::get('/user-show/{id}',       App\Http\Livewire\UserShowCtrl::class)                    ->name('user-show');
    Route::get('/dashboard',            App\Http\Livewire\DashboardCtrl::class)                   ->name('dashboard');
    // Route::get('/hombre-list',          App\Http\Livewire\Hombre\HombreListCtrl::class)                  ->name('dashboard-hombre-list');
    Route::get('/result-asistencia',    App\Http\Livewire\Forms\ResultAsistencia::class)          ->name('result-asistencia');
    Route::get('/result-primero',       App\Http\Livewire\Forms\ResultPrimero::class)             ->name('result-primero');
    Route::get('/result-segundo',       App\Http\Livewire\Forms\ResultSegundo::class)             ->name('result-segundo');
    Route::get('/result-tercero',       App\Http\Livewire\Forms\ResultTercero::class)             ->name('result-tercero');
});

//hombre online
Route::get('/hombre-show',          App\Http\Livewire\Hombre\HombreShowCtrl::class)                    ->name('hombre-show');
Route::get('/form-asistencia',      App\Http\Livewire\Forms\AsistenciaCtrl::class)              ->name('form-asistencia');
Route::get('/form-primero',         App\Http\Livewire\Forms\PrimeroCtrl::class)                 ->name('form-primero');
Route::get('/form-segundo',         App\Http\Livewire\Forms\SegundoCtrl::class)                 ->name('form-segundo');
Route::get('/form-tercero',         App\Http\Livewire\Forms\TerceroCtrl::class)                 ->name('form-tercero');

//hombre no online
Route::get('/hombre-create',            App\Http\Livewire\Hombre\HombreCreateCtrl::class)                  ->name('hombre-create');
Route::get('/hombre-login',             App\Http\Livewire\Hombre\HombreLogin::class)                       ->name('hombre-login');
Route::get('/',                         App\Http\Livewire\Welcome::class)                           ->name('welcome');
Auth::routes();