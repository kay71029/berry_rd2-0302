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
                        <div class="flash-message">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if(Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                @endif
                            @endforeach
                        </div>

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
                                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal" data-whatever1={{ $word->id }} data-whatever2={{ $word->lang }} data-whatever3={{ $word->word }}>修改</button>
                                        </td>
                                        <td>
                                            <a href="/deletewords?id={{$word->id}}" class="btn btn-default navbar-btn">刪除</a>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">修改詞彙</h4>
                </div>
                <div class="modal-body">
                    <form role="form" action="modifywords" method="get">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">語系:</label>
                            <input type="text" class="form-control" id="lang" name="lang" value="lang" required>
                            lang
                            <div class="form-group">
                                <label for="message-text" class="control-label">詞彙:</label>
                                <textarea class="form-control" id="word" name="update_word" value="update_word" required></textarea>
                            </div>
                            <div class="modal-footer">
                                @if (!empty ($word))
                                <input type="hidden" id="id" value="{{$word->id}}" name="id">
                                @endif
                                <button type="button" class="btn btn-default" data-dismiss="modal">關閉</button>
                                <button type="submit" class="btn btn-primary">送出</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var recipient = button.data('whatever1')
                var recipient2 = button.data('whatever2')
                var recipient3 = button.data('whatever3')
                var modal = $(this)
                modal.find('#id').val(recipient)
                modal.find('#lang').val(recipient2)
                modal.find('#word').val(recipient3)
            })
        });
    </script>
@endsection
