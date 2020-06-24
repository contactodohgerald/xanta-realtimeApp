<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware'=>'api'], function (){
    Route::get('/getAllQuestion', 'QuestionController@getAllQuestion');
    Route::get('/getSingleQuestion/{question:slug}', 'QuestionController@getSingleQuestion');
    Route::post('/postQuestion', 'QuestionController@storeQuestion');
    Route::patch('/updateQuestion/{question:slug}', 'QuestionController@updateQuestion');
    Route::delete('/deleteQuestion/{question:slug}', 'QuestionController@deleteSingleQuestion');
});

Route::group(['middleware'=>'api'], function (){
    Route::get('/getAllCategory', 'CategoryController@getAllCategory');
    Route::get('/getSingleCategory/{category:slug}', 'CategoryController@getSingleCategory');
    Route::post('/postCategory', 'CategoryController@storeCategory');
    Route::patch('/updatedCategory/{category:slug}', 'CategoryController@updateCategory');
    Route::delete('/deletedCategory/{category:slug}', 'CategoryController@deleteCategory');
});

//Route::apiResource('/deleted', 'ReplyController');
