<!DOCTYPE html>
<html>

<head>
</head>
<body>
@foreach($words as $key => $word)
    <tr>
        <td>{{$key+1}}</td>
        <td>{{$word->word}}</td>
    </tr>
@endforeach
</body>
</html>