<?php

namespace App\Http\Controllers;

use DB;
use App\Language;
use App\Dictionary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Paginator;

class DictionaryController extends Controller
{

    public function QueryWords(Request $request)
    {

        $lang = $request->get('lang');
        $word = $request->get('word');

        $langSystem_model = new Language;
        $ret = $langSystem_model->AllLangSystem();
        $dictionary_model = new Dictionary;

        if ($lang == "ALL") {
            $ret_word = $dictionary_model->searchAllWord();

        }
        if ($lang != "ALL") {
            $ret_word = $dictionary_model->languageSystemSearchWord($lang);
        }
        if ($word != null) {
            $ret_word = $dictionary_model->blurrySearchWord($word);
        }
        return view('/SearchWord', ['ret_lang' => $ret, 'words' => $ret_word]);
    }


    public function CreateWords()
    {
        $langSystem_model = new Language;
        $ret = $langSystem_model->AllLangSystem();
        unset($ret[0]);
        return view('/addWord', ['ret_lang' => $ret]);
    }

    public function InsertWords(Request $request)
    {
        //新增詞彙
        date_default_timezone_set('Asia/Taipei');
        $lang = $request->get('lang');
        $word_insert = $request->get('word_insert');
        $founder = $request->get('founder');
        $time = Date("Y-m-d H:i:s");

        $dictionary_model = new Dictionary;
        $ret_word = $dictionary_model->checkWord($word_insert);

        if ( $ret_word == true) {
            $array = array('lang' => $lang, 'word' => $word_insert, 'founder' => $founder, 'created_at' => $time,
                'updated_at' => $time);
            $dictionary_model = new Dictionary;
            $dictionary_model->AddWord($array);
        }
        if ( $ret_word == false ) {
            echo "已存在字典中";
        }

        //回到顯示的畫面
        $langSystem_model = new Language;
        $ret = $langSystem_model->AllLangSystem();
        unset($ret[0]);
        return view('/addWord', ['ret_lang' => $ret]);

    }

    public function ModifyWords(Request $request)
    {
        $word = $request->get('update_word');
        $lang = $request->get('lang');
        $id = $request->get('id');
        var_dump($word, $lang,$id);

    }

    public function DeleteWords(Request $request )
    {
        $id = $request->get('id');
        $dictionary_model = new Dictionary;
        $dictionary_model->DeleteWord($id);
        return redirect('searchword');
    }
}