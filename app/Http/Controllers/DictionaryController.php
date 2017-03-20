<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictionary;
use DB;
class DictionaryController extends Controller
{

    //不分語系查詢字彙字彙
    public function searchAllWord()
    {
        $dictionary_model = new Dictionary;
        $array = $dictionary_model->searchAllWord( );
        //$a = var_dump($array);
        //return view( '/testword', $a);
    }

    //依照分語系查詢字彙
    public function languageSystemSearchWord($lang = 'en')
    {
        $dictionary_model = new Dictionary;
        $array = $dictionary_model->languageSystemSearchWord($lang);
       // $a = var_dump($array);
        //return view( '/testword', $array);
        dd($array);
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
