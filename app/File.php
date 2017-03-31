<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    //新增詞彙
    public function insertFileInfo($array)
    {
        $rent =File::insert($array);
        return $rent;
    }
}
