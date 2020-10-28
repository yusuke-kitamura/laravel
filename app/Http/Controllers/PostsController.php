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
		$posts = Post::all();
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


}
