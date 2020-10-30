<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
	/**
	*投稿等一覧を表示
	*@return view
	*@param int $id
	*/
	public function index(){
		$posts = Post::orderBy('created_at', 'desc')->paginate(10);
		return view('posts.index', ['posts' => $posts]);
	}

	public function show($id){
		$post = Post::find($id);
		return view('posts.show',['post' => $post]);
	}

	/**
	*投稿の作成
	*@return view
	*/
	public function create(){
		return view('posts.create');
	}

	public function store(Request $request){
		$inputs = $request->all();
		Post::create($inputs);
		return redirect(route('posts.index'));
	}

	// 記事の編集
	public function edit($id){
		$post = Post::find($id);
		return view('posts.edit',['post' => $post]);
	}

	// 記事の更新
	public function update(Request $request, $id){
		$post = Post::find($id);
		$post->title = $request->title;
  		$post->body = $request->body;
		$post->save();
		return redirect(route('posts.show',['post'=>$post]));
	}

	// 投稿の削除
	public function destroy($id){
		$post = Post::find($id);
		$post->comments()->delete(); // ←★コメント削除実行
 		$post->delete();
		return redirect(route('top'));
	}


}
