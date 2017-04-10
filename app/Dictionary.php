<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Paginator;
class Dictionary extends Model
{
    protected $table = 'dictionaries';

    protected $fillable = ['id', 'lang', 'word', 'founder'];

    protected $hidden = ['id', 'created_at', 'updated_at', 'founder', 'lang'];

    //不分語系查詢字彙字彙
    public function searchAllWord()
    {
        $ret = Dictionary::select( 'word' ,'lang' ,'id')
            -> orderBy( 'word', 'ASC' )
            -> get();
        return $ret;
    }

    //依照分語系查詢字彙
    public function languageSystemSearchWord( $lang )
    {
        $ret = Dictionary::select( 'word' ,'lang' ,'id')
            -> where( 'lang','=', $lang )
            -> orderBy( 'word', 'ASC' )
            -> get();
        return $ret;
    }

    //模糊查詢字彙字彙
    public function blurrySearchWord( $word )
    {
        $array = Dictionary::select( 'word', 'lang','id')
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
            -> count();

        if ($ret == 0){
            return true;
        }
        if ($ret > 0){
            return false;
        }

    }

    //新增詞彙
    public function AddWord($array)
    {
        Dictionary::insert($array);
    }

    //刪除詞彙
    public function DeleteWord($id)
    {
        $ret = Dictionary::find($id);
        $ret->delete();
    }

    //修改詞彙
    public function UpdateWord($id,$lang,$word,$time)
    {
        $ret = Dictionary::find($id);
        $ret->lang = $lang;
        $ret->word = $word;
        $ret->updated_at = $time;
        $ret->save();
    }

    //比對查詢id word
    public function ModifyWord($word,$id)
    {
        $ret = Dictionary::select( 'word' )
            -> where( 'word','=', $word )
            -> where( 'id','!=', $id )
            -> count();

        if ($ret == 0){
            return true;
        }
        if ($ret > 0){
            return false;
        }

    }

    //public $fillable = ['lang','word','founder','created_at','updated_at'];
}