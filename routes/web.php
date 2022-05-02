<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UndoController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/user/register', [UserController::class, 'index']);
Route::post('/user/register', [UserController::class, 'register']);

//認可処理
Route::middleware(['auth'])->group(function () {
    Route::prefix('/undo')->group(function () {
    Route::get('/list', [UndoController::class, 'list']);
    Route::get('/new', [UndoController::class, 'new']);
    Route::get('/mylist', [UndoController::class, 'mylist']);
    Route::post('/register', [UndoController::class, 'register']);
    Route::get('/detail/{undolist_id}', [UndoController::class, 'detail'])->whereNumber('undolist_id')->name('detail');
    Route::delete('/delete/{undolist_id}', [UndoController::class, 'delete'])->whereNumber('undo_id')->name('delete');
    //Route::get('/edit/{undolist_id}', [UndoController::class, 'edit'])->whereNumber('undolist_id')->name('edit');
    });
    Route::get('/logout', [AuthController::class, 'logout']);
});