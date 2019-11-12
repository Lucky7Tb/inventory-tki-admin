<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1'], function(){
	Route::post('auth', 'API\AuthController@login');

	Route::get('item', 'API\ItemController@index');

	Route::post('borrow', 'API\BorrowingController@borrowItem');
	Route::post('getstudentdata', 'API\BorrowingController@getStudentData');
	Route::post('getborrowdata', 'API\BorrowingController@getBorrowData');
	Route::get('getuser', 'API\BorrowingController@getUser');

	Route::post('student', 'API\StudentController@savePlayerId');
	Route::post('studentchangepassword', 'API\StudentController@changePassword');


});
