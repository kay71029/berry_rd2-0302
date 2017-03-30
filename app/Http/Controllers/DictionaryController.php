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
            $count = count($ret_word);

            if ( $count == 0 )
            {
                $massage = '查無資料';
            }

            if( $count > 1 )
            {
                $massage = '所有語系查詢-總計'.$count.'資料' ;
            }

        }

        if ($lang != "ALL") {
            $ret_word = $dictionary_model->languageSystemSearchWord($lang);
            $count = count($ret_word);

            if ( $count == 0 )
            {
                $massage = '查無資料';
            }

            if( $count > 1 )
            {
                $massage = $lang.'查詢-總計'.$count.'資料' ;
            }
        }

        if ($word != null)
        {
            $ret_word = $dictionary_model->blurrySearchWord($word);
            $count = count($ret_word);

            if ( $count == 0 )
            {
                $massage = '查無資料';
            }

            if( $count > 1 )
            {
                $massage = '模糊查詢-總計'.$count.'資料' ;
            }

        }

        $request->session()->flash('alert-danger', $massage);
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
        $founder = $request->get('founder');
        $time = Date("Y-m-d H:i:s");
        $lang = $request->get('lang');
        $word_insert = $request->get('word_insert');
        $word_insert = preg_replace('/\s+/', '', $word_insert);
        $word = explode(",", $word_insert);

        foreach($word as $key => $word_value)
        {
            $dictionary_model = new Dictionary;
            $ret_word = $dictionary_model->checkWord($word_value);

            if ( $ret_word == true && $word_value != null)
            {
                $array = array('lang' => $lang, 'word' => $word_value, 'founder' => $founder, 'created_at' => $time,
                   'updated_at' => $time);

                $dictionary_model = new Dictionary;
                $dictionary_model->AddWord($array);
            }

            if ( $ret_word == false )
            {
                echo $word_value ."已存在字典中";
            }
        }

        //回到顯示的畫面
        $langSystem_model = new Language;
        $ret = $langSystem_model->AllLangSystem();
        unset($ret[0]);
        return view('/addWord', ['ret_lang' => $ret]);

    }

    public function insert_words_of_file(Request $request)
    {

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
        $request->session()->flash('alert-danger', '刪除成功');
        return redirect('searchword');
    }
}