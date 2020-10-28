<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
	/**
	*投稿等一覧を表示
	*@return view
	*/
	public function index(){
		$posts = Post::all();
		return view('posts.index', ['posts' => $posts]);
	}
}
