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
        新增字彙
    </div>
    <div class = "panel-body">
        <div class = "dataTable_wrapper">
            <table width = "100%" class = "table table-striped table-bordered table-hover" id = "dataTables-example">
                <div class="row">
                    <div class="panel-body">
                        <h4>語系選擇</h4>
                        <form role="form" action="InsertWords" method="GET">
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
                                <textarea class="form-control" rows="10" name="word_insert" value="word_insert"></textarea>
                            </div>
                            <div class="form-group">
                                <label>上傳檔案-----excel格式</label>
                                <input type="file">
                            </div>
                            <button type="submit" class="btn btn-default">送出</button>
                            <button type="reset" class="btn btn-default">重置</button>
                        </form>
                    </div>
                </div>
            </table>
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
                            <th>日期</th>
                        </tr>
                        </thead>
                        <tr>
                            <th>編號</th>
                            <th>語系</th>
                            <th>詞彙</th>
                            <th>日期</th>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src = "/js/jquery.js"></script>
<script src = "/js/bootstrap.min.js"></script>
</body>
</html>