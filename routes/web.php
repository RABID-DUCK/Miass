<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::group(['prefix' => 'backend', 'middleware' => 'isAdmin'], function (){
   Route::get('/applications', [\App\Http\Controllers\Backend\ApplicationConrtoller::class, 'index'])->name('app.index');
   Route::get('/application/{id}', [\App\Http\Controllers\Backend\ApplicationConrtoller::class, 'show'])->name('app.show');
   Route::patch('/application_sent', [\App\Http\Controllers\Backend\ApplicationConrtoller::class, 'sent'])->name('app.sent');
});
