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
                                                <input type="radio" name="lang" id="optionsRadiosInline1" value="{{$lang->lang}}" >{{$lang->lang}}
                                            </label>
                                        @endforeach
                                    </div>
                                    <div class="form-group">
                                        <label>建立者</label>
                                        <input class="form-control" placeholder="NAME" name="founder" value="founder">
                                    </div>
                                    <div class="form-group">
                                        <label>可新增多筆資料，請已“,”來區隔</label>
                                        <textarea class="form-control" rows="7" name="word_insert" value="word_insert"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-default">送出</button>
                                    <button type="reset" class="btn btn-default">重置</button>
                                </form>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="panel panel-warning " style=" " >
                                <div class="panel-heading">
                                    檔案新增
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <p>檔案內容：建立者,語系,詞彙 => user1,zh_TW,abc</p>
                                        <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
                                        <input type="file" name="word_File" accept="text" style="display: block;margin-bottom: 20px;">
                                        <input type="submit" value="上傳檔案">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class = "panel panel-default">
                        <div class = "panel-heading">
                            新增結果
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>編號</th>
                                    <th>語系</th>
                                    <th>詞彙</th>
                                    <th>修改</th>
                                    <th>刪除</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
