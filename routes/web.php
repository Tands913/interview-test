<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyContactController;

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
    return redirect()->route('contact.show');
});

Route::prefix('contact')->group(function () {
    Route::get('/show', MyContactController::class)->name('contact.show');
    Route::get('/create', [MyContactController::class, 'create'])->name('contact.create');
    Route::post('/delete/{contact_id}', [MyContactController::class, 'delete'])->name('contact.delete');
    Route::get('/update/{contact_id}', [MyContactController::class, 'update'])->name('contact.update');
});