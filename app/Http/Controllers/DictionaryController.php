<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Language;
use App\Dictionary;

class DictionaryController extends Controller
{
    public function AllLangSystem()
    {
        //所有語系
        $langSystem_model = new Language;
        $ret = $langSystem_model->AllLangSystem();
        return view('/SearchWord', ['ret_lang' => $ret]);
    }

    public function languageSystemSearchWord(Request $request)
    {
        //依照分語系查詢字彙
        $lang = $request->get('lang');
        $all = $request->get('all');
        $dictionary_model = new Dictionary;

        if ($all == "all")
        {
            $ret = $dictionary_model->searchAllWord();
        }
        else
        {
            $dictionary_model = new Dictionary;
            $ret = $dictionary_model->languageSystemSearchWord($lang);
        }
        return view('/testWord', ['words' => $ret]);
    }

    public function blurrySearchWord(Request $request)
    {
        //模糊查詢字彙字彙
        $word = $request->get('word');
        $dictionary_model = new Dictionary;
        $ret = $dictionary_model->blurrySearchWord($word);
        return view( '/testWord',  ['words' => $ret]);
    }

}