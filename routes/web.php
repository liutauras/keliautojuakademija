<?php

use App\Http\Controllers\PaperformFormController;
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

Route::get('/', [PaperformFormController::class, 'indexPaperform'])->name('paperform.index');

Route::get('/paperform', [PaperformFormController::class, 'createPaperform'])->name('paperform.create');

Route::post('/paperform', [PaperformFormController::class, 'storePaperform'])->name('paperform.store');

Route::get('/form/{url}', [
    'as' => 'paperform.show',
    'uses' => 'App\Http\Controllers\PaperformFormController@showForm',
])->name('paperform.show');

Route::get('/edit_paperform/{id}', [
    'uses' => 'App\Http\Controllers\PaperformFormController@edit',
])->name('paperform.edit');

Route::put('/paperform/{id}', [PaperformFormController::class, 'update'])->name('paperform.update');
