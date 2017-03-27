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

//修改詞彙
Route::GET('modifyword', 'DictionaryController@ModifyWords');



//統計字彙
Route::get('/sumword', function () {
    return view('SumWord');
});

// API-------