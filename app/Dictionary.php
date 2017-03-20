<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Dictionary extends Model
{
    //不分語系查詢字彙字彙
    public function searchAllWord()
    {
        $ret = Dictionary::select( 'word' )
            -> orderBy( 'word', 'ASC' )
            -> get();
        return $ret;
    }

    //依照分語系查詢字彙
    public function languageSystemSearchWord( $lang )
    {
        $array = Dictionary::select( 'word' )
            -> where( 'lang','=', $lang )
            -> orderBy( 'word', 'ASC' )
            -> get();
        return $array;
    }

    //模糊查詢字彙字彙
    public function blurrySearchWord( $word )
    {
        $array = Dictionary::select( 'word' )
            -> where( 'word', 'LIKE', '%'.$word.'%' )
            -> orderBy( 'word', 'ASC' )
            -> get();
        return $array;
    }


}
