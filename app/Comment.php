<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'body',
    ];

    public function post(){
    	$this->belongsTo('App\Post');
    }
}
