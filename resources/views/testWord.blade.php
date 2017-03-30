@extends('layouts.layout')

@section('sidebar')

@endsection

@section('content')
    {{--<form action="insert_words_of_file" method="post" enctype="multipart/form-data">--}}
        {{--<input type="hidden" name="MAX_FILE_SIZE" value="2097152">--}}
        {{--<input type="file" name="myFile" accept="text">--}}
         {{--</br>--}}
        {{--<input type="submit" value="上傳檔案">--}}
    {{--</form>--}}


    {{--{{ Form::open(array('url'=>'form-submit','files'=>true)) }}--}}
    {{--{{ Form::label('file','File',array('id'=>'','class'=>'')) }}--}}
    {{--{{ Form::file('file','',array('id'=>'','class'=>'')) }}--}}
    {{--<br/>--}}
    {{--{{ Form::submit('送出') }}--}}
    {{--{{ Form::reset('取消') }}--}}
    {{--{{ Form::close() }}--}}

    {{--{{ Form::open(array('url'=>'form-submit','files'=>true)) }}--}}
    {{--{{  Form::file('text') }}--}}
    {{--{{  Form::submit('送出')  }}--}}
    {{--{{  Form::close()  }}--}}
    <p>Link 1</p>
    <a data-toggle="modal" data-id="ISBN564541" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a>

    <p>&nbsp;</p>


    <p>Link 2</p>
    <a data-toggle="modal" data-id="ISBN-001122" title="Add this item" class="open-AddBookDialog btn btn-primary" href="#addBookDialog">test</a>

    <div class="modal hide" id="addBookDialog">
        <div class="modal-header">
            <button class="close" data-dismiss="modal">×</button>
            <h3>Modal header</h3>
        </div>
        <div class="modal-body">
            <p>some content</p>
            <input type="text" name="bookId" id="bookId" value=""/>
        </div>
    </div>
    <script>
    $(document).on("click", ".open-AddBookDialog", function () {
    var myBookId = $(this).data('id');
    $(".modal-body #bookId").val( myBookId );
    // As pointed out in comments,
    // it is superfluous to have to manually call the modal.
    // $('#addBookDialog').modal('show');
    });
</script>


@endsection
