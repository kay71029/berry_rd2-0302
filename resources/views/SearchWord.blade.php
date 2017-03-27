@extends('layouts.layout')

@section('sidebar')

@endsection

@section('content')
    <div class = "panel panel-success">
        <div class = "panel-heading">
            查詢字彙
        </div>
        <div class = "panel-body">
            <div class = "dataTable_wrapper">
                <div id="page-wrapper">
                    <div class="row">
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="panel panel-info" style="height:200px">
                                <div class="panel-heading">
                                    語系查詢
                                </div>
                                <div class="panel-body">
                                    <h4>語系選擇</h4>
                                    <form role="form" action="" method="GET">
                                        <div class="form-group">
                                            @foreach($ret_lang as $key => $lang)
                                            <label class="radio-inline">
                                                <input type="radio" name="lang" id="optionsRadiosInline1" value="{{$lang->lang}}" >{{$lang->lang}}
                                            </label>
                                            @endforeach

                                        </div>
                                        <button type="submit" class="btn btn-default">查詢</button>
                                        <button type="reset" class="btn btn-default">重置</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-warning " style="height:200px" >
                                <div class="panel-heading">
                                    模糊查詢
                                </div>
                                <div class="panel-body">
                                    <form role="form" action="" method="GET">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <textarea class="form-control" rows='3' name="word" ></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-default">查詢</button>
                                        <button type="reset" class="btn btn-default">重置</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class = "panel panel-default">
                        <div class = "panel-heading">
                            查詢結果
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
                                    @foreach( $words as $key => $word )
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $word->lang }}</td>
                                        <td>{{ $word->word }}</td>
                                        <td>
                                            <a href= "?id={{$word->id}}"class="btn btn-default navbar-btn" >修改</a>
                                        </td>
                                        <td>
                                            {{--<a href= "?id={{$word->id}}"class="btn btn-default navbar-btn" >刪除</a>--}}
                                            <a href="/deleteword?id={{$word->id}}" class="btn btn-default navbar-btn">刪除</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
