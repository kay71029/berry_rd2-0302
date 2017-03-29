@extends('layouts.layout')

@section('sidebar')

@endsection

@section('content')
    {{--<form action="insert_words_of_file" method="post" enctype="multipart/form-data">--}}
        {{--<!-- 限制上傳檔案的最大值 -->--}}
        {{--<input type="hidden" name="MAX_FILE_SIZE" value="2097152">--}}

        {{--<!-- accept 限制上傳檔案類型 -->--}}
        {{--<input type="file" name="myFile" accept="text">--}}

        {{--<input type="submit" value="上傳檔案">--}}
    {{--</form>--}}


    {{--{{ Form::open(array('url'=>'form-submit','files'=>true)) }}--}}
    {{--{{ Form::label('file','File',array('id'=>'','class'=>'')) }}--}}
    {{--{{ Form::file('file','',array('id'=>'','class'=>'')) }}--}}
    {{--<br/>--}}
    {{--{{ Form::submit('送出') }}--}}
    {{--{{ Form::reset('取消') }}--}}
    {{--{{ Form::close() }}--}}

    {{ Form::open(array('url'=>'form-submit','files'=>true)) }}
    {{  Form::file('text') }}
    {{  Form::submit('送出')  }}
    {{  Form::close()  }}



@endsection
