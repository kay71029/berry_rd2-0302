@extends('layouts.layout')

@section('sidebar')

@endsection

@section('content')
    <div class="col-lg-6">
        <div class="panel panel-info" style="height:400px">
            <div class="panel-heading">
                單筆/多筆新增
            </div>
            <div class="panel-body">
                <form role="form" action="insertwords" method="get">
                    <div class="form-group">
                        @foreach($ret_lang as $key => $lang)
                            <label class="radio-inline">
                                <input type="radio" name="lang" id="optionsRadiosInline1" value="{{$lang->lang}}" required>{{$lang->lang}}
                            </label>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label>建立者</label>
                        <input class="form-control" placeholder="name" name="founder" value="founder" required>
                    </div>
                    <div class="form-group">
                        <label>可新增多筆資料，請已“,”來區隔</label>
                        <textarea class="form-control" rows="5" name="word_insert" value="word_insert" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-default">送出</button>
                    <button type="reset" class="btn btn-default">重置</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-info " style="height:400px" >
            <div class="panel-heading">
                檔案新增
            </div>
            <div class="panel-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                @endif
                <form action="importExcel" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <input type="file" name="import_file" />
                    {{ csrf_field() }}
                    <br/>
                    <button class="btn btn-default">上傳 CSV or Excel</button>
                </form>
                <br/>
                <h5>下載檔案</h5>
                <a href="downloadExcel/xls"><button class="btn btn-default">Download Excel xls</button></a>
                <a href="downloadExcel/xlsx"><button class="btn btn-default">Download Excel xlsx</button></a>
            </div>
       </div>
    </div>
@endsection