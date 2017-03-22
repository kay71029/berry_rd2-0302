<?php



/*
 * 詞彙
 */
//查詢詞彙
Route::GET('searchword', 'DictionaryController@QueryWords');
Route::GET('addword', 'DictionaryController@CreateWords');
Route::GET('InsertWords', 'DictionaryController@InsertWords');



//Route::get('/', function () {
//    return view('welcome');
//});


//新增字彙
//Route::get('/addword', function () {
//
//    return view('Addword');
//});

////新增字彙
//Route::get('/searchword', function () {
//
//    return view('SearchWord');
//});

////修改字彙
//Route::get('/modifyword', function () {
//    return view('Modifyword');
//});
////刪除字彙
//Route::get('/deleteword', function () {
//    return view('Deleteword');
//});
////統計字彙
//Route::get('/testword', function () {
//    return view('testWord');
//});

////統計字彙
//Route::get('/test', function () {
//    return view('addVocabulary');
//});