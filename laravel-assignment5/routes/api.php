<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SingerApiController;
use App\Http\Controllers\AjaxBOOKCRUDController;



// no authorization.
Route::group([], function () {

  //test
  Route::get('ajax-book-crud', [AjaxBOOKCRUDController::class, 'index']);
  Route::post('add-update-book', [AjaxBOOKCRUDController::class, 'store']);
  Route::post('edit-book', [AjaxBOOKCRUDController::class, 'edit']);
  Route::post('delete-book', [AjaxBOOKCRUDController::class, 'destroy']);

  //singer ajax crud
  Route::get('singer-crud', [SingerApiController::class, 'showData']);
  Route::post('store-singer', [SingerApiController::class, 'storeData']);
  Route::post('update-singer', [SingerApiController::class, 'updateData']);
  Route::post('edit-singer', [SingerApiController::class, 'editSinger']);
  Route::post('delete-singer', [SingerApiController::class, 'destroySinger']);

});



  


