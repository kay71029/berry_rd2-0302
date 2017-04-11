<?php

namespace App\Http\Controllers;

use App\Language;
use App\Dictionary;
use Illuminate\Http\Request;
use App\Http\Requests\LanguageRequest;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ApiDictionaryController extends Controller
{
    /**
     * @description: 新增語系
     * @param: lang
     * @return: Json String response
     */
    public function CreateLanguage( LanguageRequest $request )
    {

        $ret = $request->only(['lang']);

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        Language::insert($ret);

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '新增語系成功', 'error' => null], 201);
    }

    /**
     * @description: 修改語系
     * @param: id
     * @return: Json String response
     */
    public function UpdateLanguage(LanguageRequest $request ,$id)
    {
        $ret = Language::find($id);

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        $lang =$request->input ('lang');
        $ret->lang = $lang;
        $ret->save();

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '修改成功', 'error' => null], 200);
    }


    /**
     * @description: 查詢所有語系
     * @param: null
     * @return: Json String response
     */
    public function QueryAllLanguage()
    {
        $ret = Language::all();
        $count = count($ret);

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '查詢成功,總計' . $count . '筆資料', 'error' => null], 200);
    }

    /**
     * @description: 刪除語系
     * @param: id
     * @return: Json String response
     */
    public function DeleteLanguage(Request $request ,$id)
    {
        $ret = Language::find($id);

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        $ret->delete();

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '刪除成功', 'error' => null], 200);
    }



    /**
     * @description: 新增詞彙
     * @param: null
     * @return: Json String response
     */
    public function CreateWords( DictionaryRequest $request )
    {

        $ret = $request->only(['lang', 'word', 'founder']);

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        Dictionary::insert($ret);

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '新增成功', 'error' => null], 201);
    }

    /**
     * @description: 修改詞彙
     * @param: id
     * @return: Json String response
     */
    public function UpdateWords(DictionaryRequest $request ,$id)
    {
        $ret = Dictionary::find($id);

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        $lang =$request->input ('lang');
        $word =$request->input ('word');
        $founder =$request->input ('founder');

        $ret->lang = $lang;
        $ret->word = $word;
        $ret->founder = $founder;
        $ret->save();

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '修改成功', 'error' => null], 200);
    }

    /**
     * @description: 刪除詞彙
     * @param: id
     * @return: Json String response
     */
    public function DeleteWords(Request $request ,$id)
    {
        $ret = Dictionary::find($id);

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        $ret->delete();

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '刪除成功', 'error' => null], 200);
    }

    /**
     * @description: 查詢所有詞彙
     * @param: null
     * @return: Json String response
     */
    public function QueryAllWords()
    {
            $ret = Dictionary::all();
            $count = count($ret);

            if (!$ret) {
                return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
            }

            return response()->json(['result' => true, 'ret' => $ret, 'message' => '查詢成功,總計' . $count . '筆資料', 'error' => null], 200);
    }

    /**
     * @description: 查詢單一詞彙
     * @param: word
     * @return: Json String response
     */
    public function QueryOneWord($word)
    {
        $ret = Dictionary::select( 'id','lang','word' )
            -> where( 'word','=', $word )
            -> get();

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        if ( 0 == count($ret)) {
            return response()->json(['result' => true, 'ret' => $ret, 'message' => '查無此詞彙,請新增' , 'error' => null], 200);
        }

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '查詢成功', 'error' => null], 200);

    }

    /**
     * @description: 依照語系查詢詞彙
     * @param: lang
     * @return: Json String response
     */
    public function QueryWordsByLang($lang)
    {
        $ret = Dictionary::select( 'id','lang', 'word' )
            -> where( 'lang','=', $lang )
            -> get();
        $count = count($ret);

        if (!$ret) {
            return response()->json(['result' => false, 'ret' => $ret, 'message' => 'Not Found', 'error' => 404], 404);
        }

        if ( 0 == count($ret)) {
            return response()->json(['result' => true, 'ret' => $ret, 'message' => '查無此語系,請新增' , 'error' => null], 200);
        }

        return response()->json(['result' => true, 'ret' => $ret, 'message' => '查詢成功,'.$lang.'語系,總計:'.$count.'筆資料', 'error' => null], 200);

    }

}
