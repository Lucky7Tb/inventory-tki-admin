<?php

Route::get('/', 'HomeController@index')->name('home')->middleware(['auth']);

Auth::routes(['register' => false, 'reset' => false ]);

Route::get('room', 'RoomController@index')->name('room');
Route::get('room/create', 'RoomController@create')->name('room.create');
Route::get('room/json', 'RoomController@json')->name('room.json');
Route::get('room/edit/{room}', 'RoomController@edit')->name('room.edit');
Route::post('room', 'RoomController@store')->name('room.store');
Route::delete('room', 'RoomController@delete')->name('room.delete');
Route::put('room/update', 'RoomController@update')->name('room.update');

Route::get('item_category', 'ItemCategoryController@index')->name('item_category');
Route::get('item_category/create', 'ItemCategoryController@create')->name('item_category.create');
Route::get('item_category/json', 'ItemCategoryController@json')->name('item_category.json');
Route::get('item_category/edit/{item_category}', 'ItemCategoryController@edit')->name('item_category.edit');
Route::post('item_category', 'ItemCategoryController@store')->name('item_category.store');
Route::delete('item_category', 'ItemCategoryController@delete')->name('item_category.delete');
Route::put('item_category/update', 'ItemCategoryController@update')->name('item_category.update');

Route::get('item', 'ItemController@index')->name('item');
Route::get('item/create', 'ItemController@create')->name('item.create');
Route::get('item/json', 'ItemController@json')->name('item.json');
Route::get('item/edit/{item}', 'ItemController@edit')->name('item.edit');
Route::post('item', 'ItemController@store')->name('item.store');
Route::delete('item', 'ItemController@delete')->name('item.delete');
Route::put('item/update', 'ItemController@update')->name('item.update');

Route::get('student', 'StudentController@index')->name('student');
Route::get('student/create', 'StudentController@create')->name('student.create');
Route::get('student/json', 'StudentController@json')->name('student.json');
Route::get('student/edit/{student}', 'StudentController@edit')->name('student.edit');
Route::post('student', 'StudentController@store')->name('student.store');
Route::post('student/excel', 'StudentController@excel')->name('student.excel');
Route::delete('student', 'StudentController@delete')->name('student.delete');
Route::put('student/update', 'StudentController@update')->name('student.update');

Route::get('borrowing', 'BorrowingController@index')->name('borrowing');
Route::get('borrowing/create', 'BorrowingController@create')->name('borrowing.create');
Route::get('borrowing/json', 'BorrowingController@json')->name('borrowing.json');
Route::post('borrowing', 'BorrowingController@store')->name('borrowing.store');
Route::get('borrowing/edit/{borrowing}', 'BorrowingController@edit')->name('borrowing.edit');
Route::put('borrowing', 'BorrowingController@update')->name('borrowing.update');
Route::delete('borrowing', 'BorrowingController@delete')->name('borrowing.delete');

Route::get('returning', 'ReturningController@index')->name('returning');
Route::get('returning/json', 'ReturningController@json')->name('returning.json');
Route::get('returning/edit/{borrowing}', 'ReturningController@edit')->name('returning.edit');
Route::put('returning', 'ReturningController@update')->name('returning.update');



