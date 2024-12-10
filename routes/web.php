<?php

use App\Http\Controllers\SubdomainController;
use Illuminate\Support\Facades\Route;

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

// http://dallas.localhost/subdomain/public/foo
// http://dallas.localhost:8000/foo
/*
Route::domain('{subdomain}.' . env('APP_URL'))->group(function(){
            
    Route::get('foo', [App\Http\Controllers\HomeController::class, 'index']);
    
    Route::post('foo/getData', [App\Http\Controllers\HomeController::class, 'getData']
    )->name('getData');
            
    Route::post('foo/saveData', [App\Http\Controllers\HomeController::class, 'saveData']
    )->name('saveData');
});
*/

// http://showtime.localhost:8000
// http://showtime.localhost:8000/adatok
Route::domain('{subdomain}.' . env('APP_URL'))
    ->group(function(){
        Route::get('/', function($subdomain){
            return "Ez, az aldomain: {$subdomain}";
        });

        Route::get('/adatok', [SubdomainController::class, 'index']);
    });