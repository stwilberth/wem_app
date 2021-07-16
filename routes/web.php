<?php

use Illuminate\Support\Facades\Route;

Route::get('/form-datos-personales',    App\Http\Livewire\FormDatosPersonalesCtrl::class)         ->name('form-datos-personales');
Route::get('/form-asistencia',          App\Http\Livewire\FormAsistenciaCtrl::class)              ->name('form-asistencia');
Route::get('/form-primero',             App\Http\Livewire\FormPrimeroCtrl::class)                 ->name('form-primero');
Route::get('/form-segundo',             App\Http\Livewire\FormSegundoCtrl::class)                 ->name('form-segundo');
Route::get('/form-tercero',             App\Http\Livewire\FormTerceroCtrl::class)                 ->name('form-tercero');
Route::get('/dashboard',                App\Http\Livewire\DashboardCtrl::class)                   ->name('dashboard');
Route::get('/user-register',            App\Http\Livewire\UserRegisterCtrl::class)                ->name('user-register');
Route::get('/user-login',               App\Http\Livewire\UserLoginCtrl::class)                   ->name('user-login');
Route::get('/',                         App\Http\Livewire\Welcome::class)                         ->name('welcome');

// php artisan make:model FormPrimeroCtrl -ms