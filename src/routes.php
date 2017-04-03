<?php
Route::group(['middleware' => ['web']], function () {
    Route::group(['namespace' => 'Acr\Des\Controllers', 'prefix' => 'acr/des'], function () {
        Route::get('/kontrol', 'AcrDesController@kontrol');
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/', 'AcrDesController@anasayfa');
            Route::get('/yeni_mesaj', 'AcrDesController@yeni_mesaj');

            Route::get('/ayar', 'AcrDesController@ayar');
            Route::post('/ayar/kaydet', 'AcrDesController@ayar_kaydet');
            Route::post('/destek_sec_sil', 'AcrDesController@sil');
            Route::get('/destek_sil', 'AcrDesController@tek_sil');
            Route::post('/destek_mesaj_kaydet', 'AcrDesController@destek_mesaj_kaydet');
            Route::get('/destek_dosya_indir', 'AcrDesController@destek_dosya_indir');
        });
    });
});