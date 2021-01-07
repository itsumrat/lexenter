<?php

namespace App;
use Auth;
use DB;


use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'article_code', 'title_en', 'source_en','content_en',
        'note_en','title_cn','source_cn','content_cn','note_cn'
    ];

    public function allcontext() {
    	return $this->hasMany('App\Model\CotextParagraph', 'article_id')->orderBy('id', 'ASC');
    }
        public static function isBookmarked($id){

        $user_id=Auth::user()->id;
        return DB::table('article_bookmarks')
                 ->where('article_bookmarks.user_id',$user_id)
                 ->where('article_bookmarks.article_id',$id)
                 ->count();

    }

}
