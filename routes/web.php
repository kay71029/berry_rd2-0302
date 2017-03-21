<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




/*
 * 詞彙
 */
//查詢詞彙
Route::get('/searchword', 'DictionaryController@index');
//依照語系查詢詞彙
//Route::get('/testword', 'DictionaryController@languageSystemSearchWord');
//模糊查詢詞彙
//Route::get('/testword', 'DictionaryController@index');



Route::get('/', function () {
    return view('welcome');
});


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