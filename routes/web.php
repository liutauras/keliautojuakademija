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

Route::post('/paperform', [PaperformFormController::class, 'storePaperform'])->name('paperform.store');

Route::get('/edit_paperform/{id}', [
    'uses' => 'App\Http\Controllers\PaperformFormController@edit',
])->name('paperform.edit');

Route::put('/paperform/{id}', [PaperformFormController::class, 'update'])->name('paperform.update');

//Route::get('paperform/delete/{id}', [PaperformFormController::class, 'delete'])->name('paperform.delete');
Route::delete('paperform/destroy/{id}', [PaperformFormController::class, 'destroy'])->name('paperform.destroy');

Route::post('/{url}/webhook', 'App\Http\Controllers\Webhooks\PaperformWebhookController@handle')->name('paperform.webhook');
//Route::get('/{url}/webhook', 'App\Http\Controllers\Webhooks\PaperformWebhookController@handle')->name('paperform.webhook');

Route::get('/paperform/success', [PaperformFormController::class, 'success'])->name('paperform.success');

Route::get('/{url}', [
    'as' => 'paperform.show',
    'uses' => 'App\Http\Controllers\PaperformFormController@showForm',
])->name('paperform.show');

