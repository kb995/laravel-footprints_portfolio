<?php

// LOGS
Route::get('/logs', 'LogController@logs')->name('logs');

// 認証
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
