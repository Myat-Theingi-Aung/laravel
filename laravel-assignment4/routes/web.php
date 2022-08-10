<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Singer\SingerController;
use App\Http\Controllers\Singer\SingerImportController;
use App\Http\Controllers\Song\SongController;
use App\Http\Controllers\Join\JoinController;

Route::get('/',[TaskController::class,'create'])->name('task.create');
Route::post('/',[TaskController::class,'store'])->name('task.store');
Route::delete('/destroy/{id}',[TaskController::class,'destroy'])->name('task.destroy');

//Singer
Route::get('/singer',[SingerController::class,'index'])->name('singer.index');
Route::get('/singer/create',[SingerController::class,'create'])->name('singer.create');
Route::post('/singer/create',[SingerController::class,'store'])->name('singer.store');
Route::delete('/singer/destroy/{singer_id}',[SingerController::class,'destroy'])->name('singer.destroy');
Route::get('/singer/edit/{singer_id}',[SingerController::class,'edit'])->name('singer.edit');
Route::put('/singer/update/{singer_id}',[SingerController::class,'update'])->name('singer.update');

//Song
Route::get('/song',[SongController::class,'index'])->name('song.index');
Route::get('/song/create',[SongController::class,'create'])->name('song.create');
Route::post('/song/create',[SongController::class,'store'])->name('song.store');
Route::delete('/song/destroy/{id}',[SongController::class,'destroy'])->name('song.destroy');
Route::get('/song/edit/{id}',[SongController::class,'edit'])->name('song.edit');
Route::put('/song/update/{id}',[SongController::class,'update'])->name('song.update');

//join table data
Route::get('/singer-info',[JoinController::class,'index',]);

//excel
Route::get('/excel',[SingerController::class,'excel'])->name('excel');
Route::post('/excel',[SingerController::class,'import'])->name('excel.import');
Route::get('/export',[SingerController::class,'export'])->name('excel.export');

//ajax
use App\Http\Controllers\AjaxBOOKCRUDController;
Route::get('ajax-book-crud', [AjaxBOOKCRUDController::class, 'index']);
Route::post('add-update-book', [AjaxBOOKCRUDController::class, 'store']);
Route::post('edit-book', [AjaxBOOKCRUDController::class, 'edit'])->name('edit');
Route::post('delete-book', [AjaxBOOKCRUDController::class, 'destroy']);