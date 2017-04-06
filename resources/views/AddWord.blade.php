@extends('layouts.layout')

@section('sidebar')

@endsection

@section('content')
    <div class = "panel panel-success">
        <div class = "panel-heading">
            新增詞彙
        </div>
        <div class = "panel-body">
            <div class = "dataTable_wrapper">
                <div id="page-wrapper">
                    <div class="row">
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="panel-body">
                            <div class="panel panel-info" style=" ">
                                <div class="panel-heading">
                                    單筆/多筆新增
                                </div>
                                <form role="form" action="insertwords" method="GET">
                                    <div class="form-group">
                                        @foreach($ret_lang as $key => $lang)
                                            <label class="radio-inline">
                                                <input type="radio" name="lang" id="optionsRadiosInline1" value="{{$lang->lang}}" required>{{$lang->lang}}
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>建立者</label>
                                        <input class="form-control" placeholder="NAME" name="founder" value="founder" required>
                                    </div>
                                    <div class="form-group">
                                        <label>可新增多筆資料，請已“,”來區隔</label>
                                        <textarea class="form-control" rows="7" name="word_insert" value="word_insert" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">送出</button>
                                    <button type="reset" class="btn btn-default">重置</button>
                                </form>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-warning " style="" >
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
                                    <form action="{{ URL::to('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                        <input type="file" name="import_file" />
                                        {{ csrf_field() }}
                                        <br/>
                                        <button class="btn btn-default">上傳 CSV or Excel</button>
                                    </form>
                                    <br/>
                                        <h5>下載檔案</h5>
                                        <div style="border: 1px solid #a1a1a1;margin-top: 10px;padding: 10px;">
                                            <a href="{{ url('downloadExcel/xls') }}"><button class="btn btn-default">Download Excel xls</button></a>
                                            <a href="{{ url('downloadExcel/xlsx') }}"><button class="btn btn-default">Download Excel xlsx</button></a>
                                            <a href="{{ url('downloadExcel/csv') }}"><button class="btn btn-default">Download CSV</button></a>
                                        </div>
                                </div>
                           </div>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
@endsection
