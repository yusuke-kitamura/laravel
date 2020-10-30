<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\Http\Requests\CommentRequest;

class CommentsController extends Controller
{
    public function store(Request $request){
		$inputs = $request->all();
		$post = Post::find($inputs['post_id']);
		$post->comments()->create($inputs);
		return redirect(route('posts.show',['post' => $post]));
	}

	public function destroy($id){
		Comment::destroy($id);
		return redirect(route('top'));
	}
}
