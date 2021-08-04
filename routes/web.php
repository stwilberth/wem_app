<?php

use Illuminate\Support\Facades\Route;

//admin pages
Route::group(['middleware' => ['role:admin']], function () {  
    Route::prefix('dashboard')->group(function () {
        Route::get('/usuario-editar/{id}',  App\Http\Livewire\Users\Edit::class)                ->name('user-edit');
    });      
});

Route::group(['middleware' => ['role:psicologo|admin']], function () {
    Route::prefix('dashboard')->group(function () {
        Route::get('/reports-asistencia',    App\Http\Livewire\Reports\Asistencia::class)    ->name('reports-asistencia');
        Route::get('/reports-primero',       App\Http\Livewire\Reports\Primero::class)       ->name('reports-primero');
        Route::get('/reports-segundo',       App\Http\Livewire\Reports\Segundo::class)       ->name('reports-segundo');
        Route::get('/reports-tercero',       App\Http\Livewire\Reports\Tercero::class)       ->name('reports-tercero');
        
        Route::get('/grupos',               App\Http\Livewire\Grupos\Index::class)              ->name('grupos');
        Route::get('/grupo/{id}',           App\Http\Livewire\Grupos\Show::class)               ->name('grupo');
        
        Route::get('/usuario/{id}',         App\Http\Livewire\Users\Show::class)                ->name('user');
        Route::get('/usuarios',             App\Http\Livewire\Users\Index::class)               ->name('users');
        Route::get('/hombres',              App\Http\Livewire\Hombre\Index::class)              ->name('hombres');
    });
    Route::get('/dashboard',            App\Http\Livewire\Dashboard\Index::class)           ->name('dashboard');    
});

Route::get('/form-asistencia',      App\Http\Livewire\Forms\Asistencia::class)          ->name('form-asistencia');
Route::get('/form-primero',         App\Http\Livewire\Forms\PrimeroCtrl::class)         ->name('form-primero');
Route::get('/form-segundo',         App\Http\Livewire\Forms\SegundoCtrl::class)         ->name('form-segundo');
Route::get('/form-tercero',         App\Http\Livewire\Forms\TerceroCtrl::class)         ->name('form-tercero');
Route::get('/hombre/{id}',          App\Http\Livewire\Hombre\Show::class)               ->name('hombre');
Route::get('/hombre-edit/{id}',     App\Http\Livewire\Hombre\Edit::class)               ->name('hombre-edit');
Route::get('/hombre-create',        App\Http\Livewire\Hombre\Create::class)             ->name('hombre-create');
Route::get('/hombre-login',         App\Http\Livewire\Hombre\Login::class)              ->name('hombre-login');
// Route::prefix('hombre')->group(function (){
// });


Route::get('/',                     App\Http\Livewire\Welcome::class)                   ->name('welcome');
Auth::routes();


Route::get('/route-cache', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cache cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
}); 

// Clear application cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

// Clear view cache:
Route::get('/view-clear', function() {
    $exitCode = Artisan::call('view:clear');
    return 'View cache cleared';
});

// Clear view cache:
Route::get('/optimeze-clear', function() {
    $exitCode = Artisan::call('optimize:clear');
    return 'optimize:clear';
});

// Clear view cache:
Route::get('/key-generate', function() {
    $exitCode = Artisan::call('key:generate');
    return $exitCode;
});