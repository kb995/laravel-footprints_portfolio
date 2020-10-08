<?php
Route::group(['middleware' => 'auth'], function() {

    // Trophy
    // 一覧
    // # 18
    Route::get('/', 'TrophyController@index')->name('index');
    // 一覧（指定）
    Route::get('/trophies/{day}', 'TrophyController@trophies')->name('trophies');
    // 登録
    Route::post('/trophies/{day}', 'TrophyController@store')->name('trophies.store');
    // 編集
    Route::get('/trophies/{trophy}/edit','TrophyController@edit')->name('trophies.edit');
    Route::post('/trophies/{trophy}/update','TrophyController@update')->name('trophies.update');
    // 削除
    Route::post('/trophies/{trophy}/destroy','TrophyController@destroy')->name('trophies.destroy');

    // Day
    // 登録
    Route::post('/days', 'DayController@store')->name('days.store');
});


// 認証
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
