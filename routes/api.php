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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('register', 'JWTAuthController@register');
    Route::post('login', 'JWTAuthController@login');
    Route::post('logout', 'JWTAuthController@logout');
    Route::post('refresh', 'JWTAuthController@refresh');
    Route::get('profile', 'JWTAuthController@profile');

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

Route::group(['middleware'=>'api'], function (){
    Route::get('/getSingleQuestion/{question:slug}/getAllReply', 'ReplyController@getAllReply');
    Route::get('/getSingleQuestion/{question:slug}/getSingleReply/{reply:id}', 'ReplyController@getSingleReply');
    Route::post('/getSingleQuestion/{question:slug}/storeReply', 'ReplyController@storeReply');
    Route::patch('/getSingleQuestion/{question:slug}/updateReply/{reply:id}', 'ReplyController@updateReply');
    Route::delete('/getSingleQuestion/{question:slug}/deleteReply/{reply:id}', 'ReplyController@deleteReply');
});

Route::group(['middleware'=>'api'], function (){
    Route::post('/likeReply/{reply:id}', 'LikeController@likeIt');
    Route::delete('/likeReply/{reply:id}', 'LikeController@unLikeIt');
});


//Route::apiResource('/deleted', 'ReplyController');
