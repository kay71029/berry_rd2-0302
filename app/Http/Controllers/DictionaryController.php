<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Language;
use App\Dictionary;

class DictionaryController extends Controller
{
    public function index()
    {
        //語系選擇
        $langSystem_model = new Language;
        $ret = $langSystem_model->AllLangSystem();
        return view('/SearchWord', ['ret_lang' => $ret]);
    }

    //不分語系查詢字彙字彙
    public function searchAllWord()
    {
        $dictionary_model = new Dictionary;
        $ret_word = $dictionary_model->searchAllWord();

        $langSystem_model = new Language;
        $ret_lang = $langSystem_model->AllLangSystem( );
        return view( '/SearchWord',  ['words' => $ret_word]);

    }

    //依照分語系查詢字彙
    public function languageSystemSearchWord($lang = 'en')
    {
        $dictionary_model = new Dictionary;
        $array = $dictionary_model->languageSystemSearchWord($lang);
       // $a = var_dump($array);
        return view( '/addVocabulary', ['Dictionary' => $array]);
        //dd($array);
    }

    //模糊查詢字彙字彙
    public function blurrySearchWord($word = 'a')
    {
        $dictionary_model = new Dictionary;
        $array = $dictionary_model->blurrySearchWord($word);
        // $a = var_dump($array);
        //return view( '/testword', $array);
        dd($array);
    }

}
