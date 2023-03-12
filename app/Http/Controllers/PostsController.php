<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; //Auth認証
use App\Post;
//追記
//

class PostsController extends Controller
{
    public function index(){
        $list = Post::get();
        return view('posts.index',['list'=>$list]);
    }

//投稿を登録する機能
    public function create(Request $request){
        //ddd("ここまで届いたよ");//デバック関数、ルーティングや値がちゃんと届いたか確認できる
        $post = $request->input('newPost');
        $user = Auth::user()->id;//ログインしているユーザーのID
        \DB::table('posts')->insert([ //postsテーブルの中のpostカラムに＄postをinsert（挿入）する
            'post' => $post,
            'user_id' => $user
        ]);//登録

    return redirect('top');//つぶやきを登録したい＞TOPに戻る:リダイレクトについて調べる
    }

    public function delete($id) //つぶやきの消去
    {
        \DB::table('posts')
        ->where('id', $id)
        ->delete();
        return redirect('top');
    }

    public function updateForm($id) //つぶやきの編集
    {
        $post = Post::where('id', $id)->first();
        return view('posts.updateForm', ['post'=>$post]);
    }
}
