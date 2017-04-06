<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //列出所有語系
    public function AllLangSystem()
    {
        $ret = Language::select( 'lang' )
            -> orderBy( 'lang', 'ASC' )
            -> get();
        return $ret;
    }

    //比對語系
    public function checkLang($lang)
    {
        $ret = Dictionary::select( 'lang' )
            -> where( 'lang','=', $lang )
            -> count();
        if ($ret == 0)
        {
            return true;
        }

        if ($ret > 0)
        {
            return false;
        }
    }
}
