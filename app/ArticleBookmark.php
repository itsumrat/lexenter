<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticleBookmark extends Model
{
    //
    protected $fillable = ['article_id','user_id'];
}
