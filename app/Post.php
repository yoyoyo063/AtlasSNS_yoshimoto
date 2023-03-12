<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //記入したところ
    protected $fillable = ['content', 'user_id'];
}
