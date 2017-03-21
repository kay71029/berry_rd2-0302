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
            @foreach($words as $key => $word)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$word->word}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
