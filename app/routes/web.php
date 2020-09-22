<?php

// LOGS
Route::get('/logs/{day?}', 'LogController@logs')->name('logs');
Route::post('/log/create/{day}', 'LogController@create')->name('log.create');

// 認証
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
