<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use DB;
class LangSystemController extends Controller
{
    //列出所有語系
    public function AllLangSystem()
    {

    }

    //查詢語系
    public function LangSystem($lang="en_US")
    {
        $langSystem_model = new Language;
        $array = $langSystem_model->LangSystem($lang );
        dd($array);
        //$a = var_dump($array);
        //return view( '/testword', $a);
    }
}
