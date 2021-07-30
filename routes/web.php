<?php

use Illuminate\Support\Facades\Route;

//admin pages
// Route::middleware(['role:admin'])->group(function () {
    
// });
Route::get('/usuario/{id}',         App\Http\Livewire\Users\Show::class)                ->name('user-show');
Route::get('/psicologos',           App\Http\Livewire\Psicologos\index::class)          ->name('psicologos');
Route::get('/usuarios',             App\Http\Livewire\Users\index::class)               ->name('users');
Route::get('/dashboard',            App\Http\Livewire\Dashboard\DashboardCtrl::class)   ->name('dashboard');
Route::get('/dashboard-psicologo',  App\Http\Livewire\Dashboard\Psicologo::class)       ->name('dashboard-psicologo');


Route::get('/grupos',               App\Http\Livewire\Grupos\Index::class)              ->name('grupos');
Route::get('/grupo/{id}',           App\Http\Livewire\Grupos\Show::class)               ->name('grupo');


Route::get('/result-asistencia',    App\Http\Livewire\Forms\ResultAsistencia::class)    ->name('result-asistencia');
Route::get('/result-primero',       App\Http\Livewire\Forms\ResultPrimero::class)       ->name('result-primero');
Route::get('/result-segundo',       App\Http\Livewire\Forms\ResultSegundo::class)       ->name('result-segundo');
Route::get('/result-tercero',       App\Http\Livewire\Forms\ResultTercero::class)       ->name('result-tercero');


Route::get('/form-asistencia',      App\Http\Livewire\Forms\AsistenciaCtrl::class)      ->name('form-asistencia');
Route::get('/form-primero',         App\Http\Livewire\Forms\PrimeroCtrl::class)         ->name('form-primero');
Route::get('/form-segundo',         App\Http\Livewire\Forms\SegundoCtrl::class)         ->name('form-segundo');
Route::get('/form-tercero',         App\Http\Livewire\Forms\TerceroCtrl::class)         ->name('form-tercero');

Route::get('/hombres',              App\Http\Livewire\Hombre\Index::class)              ->name('hombres');
Route::get('/hombre/{id}',          App\Http\Livewire\Hombre\Show::class)               ->name('hombre');
Route::get('/hombre-create',        App\Http\Livewire\Hombre\Create::class)             ->name('hombre-create');
Route::get('/hombre-login',         App\Http\Livewire\Hombre\Login::class)              ->name('hombre-login');


Route::get('/',                     App\Http\Livewire\Welcome::class)                   ->name('welcome');
Auth::routes();