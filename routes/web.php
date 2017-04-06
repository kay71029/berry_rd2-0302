<?php

/*
 * 詞彙
 */
//Web------

//查詢詞彙
Route::GET('searchword', 'DictionaryController@QueryWords');
//增加詞彙
Route::GET('addword', 'DictionaryController@CreateWords');
//刪除詞彙
Route::GET('deleteword', 'DictionaryController@DeleteWords');
//增加詞彙
Route::GET('addword', 'DictionaryController@CreateWords');
Route::GET('insertwords', 'DictionaryController@InsertWords');

Route::POST('FilesUpdate', 'DictionaryController@FilesUpdate');
//修改詞彙
Route::GET('modifyword', 'DictionaryController@ModifyWords');



//統計字彙
Route::get('/sumword', function () {
    return view('SumWord');
});



Route::get('/test', function () {
    return view('testWord');
});
// API-------


//excel---
Route::get('downloadExcel/{type}', 'DictionaryController@downloadExcel');
Route::post('importExcel', 'DictionaryController@importExcel');