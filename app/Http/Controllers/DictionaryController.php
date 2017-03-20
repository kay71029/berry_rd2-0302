<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionary;
use App\Language;
use DB;
class DictionaryController extends Controller
{

    //不分語系查詢字彙字彙
    public function searchAllWord()
    {
        $dictionary_model = new Dictionary;
        $ret_word = $dictionary_model->searchAllWord();

        $langSystem_model = new Language;
        $ret_lang = $langSystem_model->AllLangSystem( );



        return view( '/searchword',  ['words' => $ret_word,'langs' => $ret_lang]);

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
