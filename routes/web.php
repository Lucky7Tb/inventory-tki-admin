<?php

Route::get('/', 'HomeController@index')->name('home')->middleware(['auth']);

Auth::routes(['register' => false, 'reset' => false ]);



Route::get('room', 'RoomController@index')->name('room')->middleware(['auth']);
Route::get('room/create', 'RoomController@create')->name('room.create')->middleware(['auth']);
Route::get('room/json', 'RoomController@json')->name('room.json')->middleware(['auth']);
Route::get('room/edit/{room}', 'RoomController@edit')->name('room.edit')->middleware(['auth']);
Route::post('room', 'RoomController@store')->name('room.store')->middleware(['auth']);
Route::delete('room', 'RoomController@delete')->name('room.delete')->middleware(['auth']);
Route::put('room/update', 'RoomController@update')->name('room.update')->middleware(['auth']);

Route::get('item_category', 'ItemCategoryController@index')->name('item_category')->middleware(['auth']);
Route::get('item_category/create', 'ItemCategoryController@create')->name('item_category.create')->middleware(['auth']);
Route::get('item_category/json', 'ItemCategoryController@json')->name('item_category.json')->middleware(['auth']);
Route::get('item_category/edit/{item_category}', 'ItemCategoryController@edit')->name('item_category.edit')->middleware(['auth']);
Route::post('item_category', 'ItemCategoryController@store')->name('item_category.store')->middleware(['auth']);
Route::delete('item_category', 'ItemCategoryController@delete')->name('item_category.delete')->middleware(['auth']);
Route::put('item_category/update', 'ItemCategoryController@update')->name('item_category.update')->middleware(['auth']);

Route::get('item', 'ItemController@index')->name('item')->middleware(['auth']);
Route::get('item/create', 'ItemController@create')->name('item.create')->middleware(['auth']);
Route::get('item/json', 'ItemController@json')->name('item.json')->middleware(['auth']);
Route::get('item/edit/{item}', 'ItemController@edit')->name('item.edit');
Route::post('item', 'ItemController@store')->name('item.store')->middleware(['auth']);
Route::delete('item', 'ItemController@delete')->name('item.delete')->middleware(['auth']);
Route::put('item/update', 'ItemController@update')->name('item.update')->middleware(['auth']);

Route::get('student', 'StudentController@index')->name('student')->middleware(['auth']);
Route::get('student/create', 'StudentController@create')->name('student.create')->middleware(['auth']);
Route::get('student/json', 'StudentController@json')->name('student.json')->middleware(['auth']);
Route::get('student/edit/{student}', 'StudentController@edit')->name('student.edit')->middleware(['auth']);
Route::post('student', 'StudentController@store')->name('student.store')->middleware(['auth']);
Route::post('student/importexcel', 'StudentController@importexcel')->name('student.importexcel')->middleware(['auth']);
Route::post('student/exportexcel', 'StudentController@exportexcel')->name('student.exportexcel')->middleware(['auth']);
Route::delete('student', 'StudentController@delete')->name('student.delete')->middleware(['auth']);
Route::put('student/update', 'StudentController@update')->name('student.update')->middleware(['auth']);

Route::get('borrowing', 'BorrowingController@index')->name('borrowing')->middleware(['auth']);
Route::get('borrowing/create', 'BorrowingController@create')->name('borrowing.create')->middleware(['auth']);
Route::get('borrowing/json', 'BorrowingController@json')->name('borrowing.json')->middleware(['auth']);
Route::post('borrowing', 'BorrowingController@store')->name('borrowing.store')->middleware(['auth']);
Route::get('borrowing/edit/{borrowing}', 'BorrowingController@edit')->name('borrowing.edit')->middleware(['auth']);
Route::put('borrowing', 'BorrowingController@update')->name('borrowing.update')->middleware(['auth']);
Route::delete('borrowing', 'BorrowingController@delete')->name('borrowing.delete')->middleware(['auth']);

Route::get('returning', 'ReturningController@index')->name('returning')->middleware(['auth']);
Route::get('returning/json', 'ReturningController@json')->name('returning.json')->middleware(['auth']);
Route::get('returning/edit/{borrowing}', 'ReturningController@edit')->name('returning.edit')->middleware(['auth']);
Route::get('returning/warning/{borrowing}', 'ReturningController@warning')->name('returning.warning')->middleware(['auth']);
Route::put('returning', 'ReturningController@update')->name('returning.update')->middleware(['auth']);



