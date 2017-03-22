<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Dictionary extends Model
{
    //不分語系查詢字彙字彙
    public function searchAllWord()
    {
        $ret = Dictionary::select( 'word' ,'lang' )
            -> orderBy( 'word', 'ASC' )
            -> get();
        return $ret;
    }

    //依照分語系查詢字彙
    public function languageSystemSearchWord( $lang )
    {
        $ret = Dictionary::select( 'word' ,'lang' )
            -> where( 'lang','=', $lang )
            -> orderBy( 'word', 'ASC' )
            -> get();
        return $ret;
    }

    //模糊查詢字彙字彙
    public function blurrySearchWord( $word )
    {
        $array = Dictionary::select( 'word', 'lang' )
            -> where( 'word', 'LIKE', '%'.$word.'%' )
            -> orderBy( 'word', 'ASC' )
            -> get();
        return $array;
    }

    //比對詞彙
    public function checkWord($word)
    {
        $ret = Dictionary::select( 'word' )
            -> where( 'word','=', $word )
            -> get();
        return $ret;
    }


    //新增詞彙
    public function AddWoed($array)
    {
        Dictionary::insert($array);
    }

}
