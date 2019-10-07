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

Route::get('student', 'StudentController@index')->name('student');
Route::get('student/create', 'StudentController@create')->name('student.create');
Route::get('student/json', 'StudentController@json')->name('student.json');
Route::get('student/edit/{student}', 'StudentController@edit')->name('student.edit');
Route::post('student', 'StudentController@store')->name('student.store');
Route::post('student/excel', 'StudentController@excel')->name('student.excel');
Route::delete('student', 'StudentController@delete')->name('student.delete');
Route::put('student/update', 'StudentController@update')->name('student.update');
