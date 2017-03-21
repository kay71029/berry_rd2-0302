<!DOCTYPE html>
<html>
<head>
    <meta charset = "UTF-8">
    <title>髒話系統</title>
    <meta name = "viewport" content = "width=device-width, initial-scale=1">
    <link href = "/css/bootstrap.min.css" rel = "stylesheet">
</head>
<body>
<nav class = "navbar navbar-inverse" align = right>
    <div class = "container-fluid">
        <div class = "navbar-header">
            <button type = "button" class = "navbar-toggle collapsed" data-toggle="collapse" data-target = "#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class = "sr-only">Toggle navigation</span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
            </button>
            <a class = "navbar-brand" href="addword">首頁</a>
        </div>
        <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
            <ul class = "nav navbar-nav">
                <li class = "active"><a href = "addword">新增字彙<span class = "sr-only">(current)</span></a></li>
                <li class = "active"><a href = "searchword">查詢字彙<span class = "sr-only">(current)</span></a></li>
                <li class = "active"><a href = "modifyword">修改字彙<span class = "sr-only">(current)</span></a></li>
                <li class = "active"><a href = "deleteword">刪除字彙<span class = "sr-only">(current)</span></a></li>
                <li class = "active"><a href = "sumword">字彙統計<span class = "sr-only">(current)</span></a></li>
            </ul>
        </div>
    </div>
</nav>
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
                                <form role="form">
                                    <div class="form-group">
                                        <label class="checkbox-inline">
                                            <input type="checkbox">ALL
                                        </label>
                                     @foreach($ret_lang as $key => $lang)
                                          <label class="checkbox-inline">
                                              <input type="checkbox">{{$lang->lang}}
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
                                <form role="form">
                                    <div class="form-group">
                                        <textarea class="form-control" rows='3'></textarea>
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
                        </tr>
                        </thead>
                        {{--@foreach($words as $key => $word)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$word->word}}</td>
                        </tr>
                        @endforeach

                        --}}</tbody>
                    </table>
                </div>
        </div>
    </div>
</div>
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="row">
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">

            </div>

            <!-- /.col-lg-6 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
<script src = "/js/jquery.js"></script>
<script src = "/js/bootstrap.min.js"></script>
</body>
</html>