<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewResourceController;
use App\Http\Controllers\ResourceManagerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/snippets', [ViewResourceController::class, 'snippets'])->name('snippets');
Route::get('/files', [ViewResourceController::class, 'files'])->name('files');
Route::get('/links', [ViewResourceController::class, 'links'])->name('links');

Route::prefix('/manage')->name('manage.')->group(function () {
    Route::prefix('/snippets')->name('snippets.')->group(function () {
        Route::get('', [ResourceManagerController::class, 'snippets'])->name('index');
        Route::post('/create', [ResourceManagerController::class, 'createSnippet'])->name('create');
        Route::get('show/{id}', [ResourceManagerController::class, 'showSnippet'])->name('show');
        Route::post('update/{id}', [ResourceManagerController::class, 'updateSnippet'])->name('update');
        Route::post('delete/{id}', [ResourceManagerController::class, 'deleteSnippet'])->name('delete');
    });

    Route::prefix('/files')->name('files.')->group(function () {
        Route::get('', [ResourceManagerController::class, 'files'])->name('index');
        Route::post('/create', [ResourceManagerController::class, 'createFile'])->name('create');
        Route::get('show/{id}', [ResourceManagerController::class, 'showFile'])->name('show');
        Route::post('update/{id}', [ResourceManagerController::class, 'updateFile'])->name('update');
        Route::post('delete/{id}', [ResourceManagerController::class, 'deleteFile'])->name('delete');
    });

    Route::prefix('/links')->name('links.')->group(function () {
        Route::get('', [ResourceManagerController::class, 'links'])->name('index');
        Route::post('/create', [ResourceManagerController::class, 'createLink'])->name('create');
        Route::get('show/{id}', [ResourceManagerController::class, 'showLink'])->name('show');
        Route::post('update/{id}', [ResourceManagerController::class, 'updateLink'])->name('update');
        Route::post('delete/{id}', [ResourceManagerController::class, 'deleteLink'])->name('delete');
    });
});
