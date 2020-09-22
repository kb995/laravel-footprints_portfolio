<?php
Route::group(['middleware' => 'auth'], function() {

    // Log 一覧 (TOP)
    Route::get('/logs/{day?}', 'LogController@logs')->name('logs');
    // Log 登録
    Route::post('/log/create/{day}', 'LogController@create')->name('log.create');
    // Day 登録
    Route::post('/day/create', 'DayController@create')->name('day.create');

    // Log 編集
    Route::get('/log/edit/{log}','LogController@edit')->name('log.edit');
    Route::post('/log/update/{log}','LogController@update')->name('log.update');

    // Log 削除
    Route::post('/log/destroy/{log}','LogController@destroy')->name('log.destroy');

});


// 認証
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
