<?php

// Log 一覧 (TOP)
Route::get('/logs/{day?}', 'LogController@logs')->name('logs');
// Log 登録
Route::post('/log/create/{day}', 'LogController@create')->name('log.create');
// Day 登録
Route::post('/day/create', 'DayController@create')->name('day.create');

// 認証
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
