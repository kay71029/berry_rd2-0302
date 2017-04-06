<?php

namespace App\Http\Controllers;

use DB;
use Excel;
use App\Language;
use App\Dictionary;
use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Paginator;

class DictionaryController extends Controller
{

    public function QueryWords(Request $request)
    {

        $lang = $request->get('lang');
        $word = $request->get('word');

        $langSystem_model = new Language;
        $ret = $langSystem_model->AllLangSystem();
        $dictionary_model = new Dictionary;

        if ($lang == "ALL") {
            $ret_word = $dictionary_model->searchAllWord();
            $count = count($ret_word);

            if ( $count == 0 )
            {
                $massage = '查無資料';
            }

            if( $count >= 1 )
            {
                $massage = '所有語系查詢-總計'.$count.'資料' ;
            }

        }

        if ($lang != "ALL") {
            $ret_word = $dictionary_model->languageSystemSearchWord($lang);
            $count = count($ret_word);

            if ( $count == 0 )
            {
                $massage = '查無資料';
            }

            if( $count >= 1 )
            {
                $massage = $lang.'查詢-總計'.$count.'資料' ;
            }
        }

        if ($word != null)
        {
            $ret_word = $dictionary_model->blurrySearchWord($word);
            $count = count($ret_word);

            if ( $count == 0 )
            {
                $massage = '查無資料';
            }

            if( $count >= 1 )
            {
                $massage = '模糊查詢-總計'.$count.'資料' ;
            }

        }

        $request->session()->flash('alert-danger', $massage);
        return view('/search_words', ['ret_lang' => $ret, 'words' => $ret_word]);
    }

    public function CreateWords()
    {
        $langSystem_model = new Language;
        $ret = $langSystem_model->AllLangSystem();
        unset($ret[0]);
        return view('/add_words', ['ret_lang' => $ret]);
    }

    public function InsertWords(Request $request)
    {
        //新增詞彙
        date_default_timezone_set('Asia/Taipei');
        $founder = $request->get('founder');
        $time = Date("Y-m-d H:i:s");
        $lang = $request->get('lang');
        $word_insert = $request->get('word_insert');
        $word_insert = preg_replace('/\s+/', '', $word_insert);
        $word = explode(",", $word_insert);

        foreach($word as $key => $word_value)
        {
            $dictionary_model = new Dictionary;
            $ret_word = $dictionary_model->checkWord($word_value);

            if ( $ret_word == true && $word_value != null)
            {
                $array = array('lang' => $lang, 'word' => $word_value, 'founder' => $founder, 'created_at' => $time,
                   'updated_at' => $time);

                $dictionary_model = new Dictionary;
                $dictionary_model->AddWord($array);
            }

            if ( $ret_word == false )
            {
                echo $word_value ."已存在字典中";
            }
        }

        //回到顯示的畫面
        $langSystem_model = new Language;
        $ret = $langSystem_model->AllLangSystem();
        unset($ret[0]);
        return view('/add_words', ['ret_lang' => $ret]);

    }

    public function ModifyWords(Request $request)
    {
        date_default_timezone_set('Asia/Taipei');
        $time = Date("Y-m-d H:i:s");
        $word = $request->get('update_word');
        $lang = $request->get('lang');
        $id = $request->get('id');
        $dictionary_model = new Dictionary;

        $ret_word = $dictionary_model->ModifyWord($word,$id);

        if ( $ret_word == true && $word != null)
        {
            $dictionary_model->UpdateWord($id,$lang,$word,$time);
        }

        if ( $ret_word == false )
        {
            echo $word ."已存在字典中";
        }

        return redirect('searchwords');
    }

    public function DeleteWords(Request $request )
    {
        $id = $request->get('id');
        $dictionary_model = new Dictionary;
        $dictionary_model->DeleteWord($id);
        $request->session()->flash('alert-danger', '刪除成功');
        return redirect('searchwords');
    }

    public function FilesUpdate(Request $request )
    {
        $founder = $request->get('founder');
        $lang = $request->get('lang');
        //取得檔案暫存路徑
        $file = $request->file('word_File');
        //取得檔案內容
        $content = file_get_contents($file);
        $word_insert = preg_replace('/\s+/', '', $content);
        $word_insert = explode(",", $word_insert);

        //3個一組
        $word_count = count($word_insert);
        $word_count = $word_count/3;
        for($i = 0; $i < $word_count ; $i++)
        {
            $word_group[] = array_slice($word_insert, $i*3 ,3);
        }

        foreach($word_group as $val_row)
        {

            if( $val_row[0] == null )
            {
                break;
            }

            if( $val_row[1] == null )
            {
                break;
            }

            if( $val_row[2] == null )
            {
                break;
            }
            echo $val_row[2];
//            foreach ($val_row as $val_word)
//            {
////                print_r($val_row[0]);
////                exit;
//                echo " ".$val_word[1]."</br>" ;
//            }
        }
//        exit;
//        //取得原始檔案名稱
//        $fileName = $file->getClientOriginalName();
//        //取得檔案儲存預設路徑
//        $disk = config('filesystems.disks.public.root');
//        //儲存檔案並取得路徑
//        $path = $disk.'/'.$file->storeAs('test', $fileName, 'public');
//        date_default_timezone_set('Asia/Taipei');
//        $time = Date("Y-m-d H:i:s");
//        $array = array('filename' => $fileName, 'path' => $path, 'created_at' => $time, 'updated_at' => $time);
//        //將檔案路徑存入資料庫
//        $File_model = new File;
//        $ret = $File_model->insertFileInfo($array);
//
////            var_dump($ret);
////            exit;
//        //取得檔案內容
//        // $content = file_get_contents($file);
//        if (!$ret) {
//            throw new \Exception('操作失敗');
//        }

           // return redirect()->route('test');

    }

    public function downloadExcel(Request $request, $type)
    {
        $data = Dictionary::get()->toArray();
        return Excel::create('dictionary', function($excel) use ($data) {
            $excel->sheet('badword', function($sheet) use ($data)
            {
                $sheet->fromArray($data);
            });
        })->download($type);
    }

    public function importExcel(Request $request)
    {

        if($request->hasFile('import_file'))
        {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {})->get();

            if (!empty($data))
            {
                $insert = $data->toArray();

                foreach($insert as $key =>$value)
                {
                    if(is_array($value))
                    {
                        date_default_timezone_set('Asia/Taipei');
                        $time = Date("Y-m-d H:i:s");

                        $dictionary_model = new Dictionary;
                        $ret_word = $dictionary_model->checkWord($value['word']);
                        $lang_model = new Language();
                        $lang_system = $lang_model->checkLang($value['lang']);


                        if ( $value['lang'] != null && $value['word'] != null && $value['founder'] != null &&
                            $lang_system == false && $ret_word == true)
                        {

                            $insert_words[] = ['lang' => $value['lang'], 'word' => $value['word'], 'founder' => $value['founder'],
                                'created_at' => $time, 'updated_at' => $time];
                        }

                        if ($lang_system != false || $ret_word != true  || $value['founder'] == null)
                        {
                            $insert_false[] = ['lang' => $value['lang'], 'word' => $value['word'], 'founder' => $value['founder'],
                                'created_at' => $time, 'updated_at' => $time];
                        }
                    }

                }

                if (!empty($insert_words))
                {
                    Dictionary::insert($insert_words);
                    return back()->with('success', 'Insert Record successfully.');
                }
            }
        }
        return back()->with('error','Please Check your file, Something is wrong there.');
    }
}