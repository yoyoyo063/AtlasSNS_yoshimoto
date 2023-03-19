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
        </div>
        {!! Form::close() !!}
          @foreach ($list as $list)
<tr>
     <td>{{ $list->post }}</td>
     <td>{{ $list->created_at }}</td>
     <td>{{ $list->updated_at }}</td>
     <td>{{ $list->updated_at }}</td>

      <div class="content">
        <a class="js-modal-open" href="/post="{{ $list->post }}" post_id="{{ $list->id }}"><img src="images/edit.png" width="40" height="40"></a>  <!-- 編集ボタン -->
     <a class="btn btn-danger" href="/post/{{$list->id}}/delete" onclick="return confirm('この投稿を消去ます。よろしいでしょうか？')"><img src="images/trash-h.png" width="40" height="40"></a><!--消去-->
     </div>

</tr>
@endforeach
<div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="/post/update" method="">
                <textarea name="" class="modal_post"></textarea>
                <input type="hidden" name="" class="modal_id" value="">
                <input type="submit" value="更新">
                {{ csrf_field() }}
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>
    @endsection
