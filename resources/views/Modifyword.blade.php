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
<div class = "panel panel-default">
    <div class = "panel-heading">
        新增字彙
    </div>
    <div class = "panel-body">
        <div class = "dataTable_wrapper">
            <table width = "100%" class = "table table-striped table-bordered table-hover" id = "dataTables-example">
                <form role="form">
                    <div class="form-group">
                        <label>Text Input</label>
                        <input class="form-control">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="form-group">
                        <label>Text Input with Placeholder</label>
                        <input class="form-control" placeholder="Enter text">
                    </div>
                    <div class="form-group">
                        <label>Static Control</label>
                        <p class="form-control-static">email@example.com</p>
                    </div>
                    <div class="form-group">
                        <label>File input</label>
                        <input type="file">
                    </div>
                    <div class="form-group">
                        <label>Text area</label>
                        <textarea class="form-control" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Checkboxes</label>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="">Checkbox 1
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="">Checkbox 2
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="">Checkbox 3
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Inline Checkboxes</label>
                        <label class="checkbox-inline">
                            <input type="checkbox">1
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox">2
                        </label>
                        <label class="checkbox-inline">
                            <input type="checkbox">3
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Radio Buttons</label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio 1
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Inline Radio Buttons</label>
                        <label class="radio-inline">
                            <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Selects</label>
                        <select class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Multiple Selects</label>
                        <select multiple class="form-control">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-default">Submit Button</button>
                    <button type="reset" class="btn btn-default">Reset Button</button>
                </form>
            </table>
        </div>
    </div>
</div>
<script src = "/js/jquery.js"></script>
<script src = "/js/bootstrap.min.js"></script>
</body>
</html>