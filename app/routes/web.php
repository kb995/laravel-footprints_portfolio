<?php
Route::group(['middleware' => 'auth'], function() {

    // Trophy 一覧 (TOP)
    Route::get('/', 'TrophyController@index')->name('index');
    // Trophy 一覧 （指定）
    Route::get('/trophies/{day}', 'TrophyController@trophies')->name('trophies');
    // Trophy 登録
    Route::post('/trophy/create/{day}', 'TrophyController@create')->name('trophy.create');
    // Day 登録
    Route::post('/day/create', 'DayController@create')->name('day.create');

    // Trophy 編集
    Route::get('/trophy/edit/{trophy}','TrophyController@edit')->name('trophy.edit');
    Route::post('/trophy/update/{trophy}','TrophyController@update')->name('trophy.update');

    // Trophy 削除
    Route::post('/trophy/destroy/{trophy}','TrophyController@destroy')->name('trophy.destroy');
});


// 認証
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
