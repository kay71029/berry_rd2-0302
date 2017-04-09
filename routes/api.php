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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');

//新增語系

//修改語系

//查詢語系

//刪除語系

//新增詞彙
Route::post('dictionary/word/', 'ApiDictionaryController@CreateWords');
//修改詞彙

//查詢字典所有詞彙
Route::post('dictionary/', 'ApiDictionaryController@AllWords');
//查詢單一詞彙
Route::get('dictionary/word/{word}', 'ApiDictionaryController@checkWord');
//依照語系查詢
Route::get('dictionary/lang/{lang}', 'ApiDictionaryController@languageSystemQueryWords');

//刪除詞彙
