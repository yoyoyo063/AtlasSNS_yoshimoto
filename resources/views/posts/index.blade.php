@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->
<div class="container">
        {!! Form::open(['url' => 'post/create']) !!}
        <div class="form-group"><img src="images/icon1.png" width="40" height="40">
            {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => '投稿内容を入力してください。']) !!}
            <div class="button">
            <input type ="image" name="submit" width="80" height="80" src="images/post.png"></input>
            </div>
                    <!-- <button type="submit" class="btn btn-success pull-right"><img src="images/post.png" alt="写真" width="30%" height="30%"></button> -->

        </div>
        {!! Form::close() !!}
          @foreach ($list as $list)
<tr>
     <td>{{ $list->post }}</td>
     <td>{{ $list->created_at }}</td>
     <td>{{ $list->updated_at }}</td>
     <td><a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を消去ます。よろしいでしょうか？')"><img src="images/trash-h.png" width="40" height="40"></a></td> <!--消去-->
</tr>
@endforeach
    </div>
@endsection
