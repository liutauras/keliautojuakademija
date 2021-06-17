<?php

use App\Http\Controllers\PaperformFormController;
use App\Http\Controllers\Webhooks\PaperformWebhookController;
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

Route::get('/paperform/uzklausos/{id}', [PaperformFormController::class, 'uzklausos'])->name('paperform.uzklausos');

Route::post('/paperform', [PaperformFormController::class, 'storePaperform'])->name('paperform.store');

Route::get('/edit_paperform/{id}', [
    'uses' => 'App\Http\Controllers\PaperformFormController@edit',
])->name('paperform.edit');

Route::put('/paperform/{id}', [PaperformFormController::class, 'update'])->name('paperform.update');

Route::delete('paperform/destroy/{id}', [PaperformFormController::class, 'destroy'])->name('paperform.destroy');

Route::post('/{url}/webhook', 'App\Http\Controllers\Webhooks\PaperformWebhookController@handle')->name('paperform.webhook');



Route::get('/paperform/success', [PaperformFormController::class, 'success'])->name('paperform.success');

Route::get('/{url}', [
    'as' => 'paperform.show',
    'uses' => 'App\Http\Controllers\PaperformFormController@showForm',
])->name('paperform.show');

