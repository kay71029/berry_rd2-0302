<?php

namespace App\Http\Controllers;

use App\Language;
use App\Dictionary;
use Illuminate\Http\Request;
use App\Http\Requests\DictionaryRequest;
class ApiDictionaryController extends Controller
{
    /**
     * @description: 新增詞彙
     * @author: kay_yu
     * @param: null
     * @return: Json String response
     */
    public function CreateWords(DictionaryRequest $request)
    {

        $ret = $request->all();

        if(!$ret)
        {
            return response()->json(['message'=>'error of vehicle','code'=>404],404);
        }

        Dictionary::insert($ret);
        return response()->json(['message'=>'The vehicles associated was created','code'=>201],201);
    }

    /**
     * @description: 查詢所有詞彙
     * @author: kay_yu
     * @param: null
     * @return: Json String response
     */
    public function AllWords()
    {
        $ret = Dictionary::all();
        $count = count($ret);

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '查詢成功,總計'.$count.'筆資料', 'error' => null], 200);
    }

    /**
     * @description: 查詢單一詞彙
     * @author: kay_yu
     * @param: word
     * @return: Json String response
     */
    public function checkWord($word)
    {
        $ret = Dictionary::select( 'lang','word' )
            -> where( 'word','=', $word )
            -> get();

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        if ( 0 == count($ret)) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => '查無此詞彙,請新增' , 'error' => '查無此詞彙'], 200);
        }

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '查詢成功', 'error' => null], 200);

    }

    /**
     * @description: 依照語系查詢詞彙
     * @author: kay_yu
     * @param: lang
     * @return: Json String response
     */
    public function languageSystemQueryWords($lang)
    {
        $ret = Dictionary::select( 'lang', 'word' )
            -> where( 'lang','=', $lang )
            -> get();
        $count = count($ret);

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        if ( 0 == count($ret)) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => '查無此語系,請新增' , 'error' => '查無此語系,請新增'], 200);
        }

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '查詢成功,'.$lang.'語系,總計:'.$count.'筆資料', 'error' => null], 200);

    }


}
