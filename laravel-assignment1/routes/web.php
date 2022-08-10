<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Singer\SingerController;
use App\Http\Controllers\Song\SongController;

Route::get('/',[TaskController::class,'create'])->name('task.create');
Route::post('/',[TaskController::class,'store'])->name('task.store');
Route::delete('/destroy/{id}',[TaskController::class,'destroy'])->name('task.destroy');

//Singer
Route::get('/singer',[SingerController::class,'index'])->name('singer.index');
Route::get('/singer/create',[SingerController::class,'create'])->name('singer.create');
Route::post('/singer/create',[SingerController::class,'store'])->name('singer.store');
Route::delete('/singer/destroy/{id}',[SingerController::class,'destroy'])->name('singer.destroy');
Route::get('/singer/edit/{id}',[SingerController::class,'edit'])->name('singer.edit');
Route::put('/singer/update/{id}',[SingerController::class,'update'])->name('singer.update');

//Song
Route::get('/song',[SongController::class,'index'])->name('song.index');
Route::get('/song/create',[SongController::class,'create'])->name('song.create');
Route::post('/song/create',[SongController::class,'store'])->name('song.store');
Route::delete('/song/destroy/{id}',[SongController::class,'destroy'])->name('song.destroy');
Route::get('/song/edit/{id}',[SongController::class,'edit'])->name('song.edit');
Route::put('/song/update/{id}',[SongController::class,'update'])->name('song.update');
