<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//新增語系
Route::post('dictionary/lang/', 'ApiDictionaryController@CreateLanguage');
//修改語系
Route::put('dictionary/lang/{id}', 'ApiDictionaryController@UpdateLanguage');
//刪除語系
Route::delete('dictionary/lang/', 'ApiDictionaryController@DeleteLanguage');
//查詢語系
Route::get('dictionary/lang/', 'ApiDictionaryController@QueryAllLanguage');


//新增詞彙
Route::post('dictionary/word/', 'ApiDictionaryController@CreateWords');
//修改詞彙
Route::put('dictionary/word/{id}', 'ApiDictionaryController@UpdateWords');
//刪除詞彙
Route::delete('dictionary/word/{id}', 'ApiDictionaryController@DeleteWords');
//查詢字典所有詞彙
Route::post('dictionary/', 'ApiDictionaryController@QueryAllWords');
//查詢單一詞彙
Route::get('dictionary/word/{word}', 'ApiDictionaryController@QueryOneWord');
//依照語系查詢
Route::get('dictionary/lang/{lang}', 'ApiDictionaryController@QueryWordsByLang');
