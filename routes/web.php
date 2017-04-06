<?php

/*
 * 詞彙字典
 */
//Web---------------------
//查詢詞彙
Route::get('searchwords', 'DictionaryController@QueryWords');
//增加詞彙
Route::get('addwords', 'DictionaryController@CreateWords');
//刪除詞彙
Route::get('deletewords', 'DictionaryController@DeleteWords');
//增加詞彙
Route::get('addwords', 'DictionaryController@CreateWords');
Route::get('insertwords', 'DictionaryController@InsertWords');
Route::get('downloadExcel/{type}', 'DictionaryController@downloadExcel');
Route::post('importExcel', 'DictionaryController@importExcel');
Route::post('FilesUpdate', 'DictionaryController@FilesUpdate');
//修改詞彙
Route::get('modifywords', 'DictionaryController@ModifyWords');


//統計字彙
Route::get('/sumwords', function () {
    return view('sum_words');
});
Route::get('/test', function () {
    return view('testWord');
});
