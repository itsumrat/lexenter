<?php

namespace App\Model;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Model;

class CotextParagraph extends Model
{
    protected $fillable = [
        'context_id', 'context_no', 'esource', 'csource', 'eterms', 'cterms', 'eparagraph', 'cparagraph', 'order', 'status',
    ];

    public function paracontext() {
    	return $this->belongsTo('App\Model\Context', 'context_id', 'id');
    }

    public function temrs() {
    	return $this->hasMany('App\Model\AddTermEngChi', 'context_id');
    }

    public function temreng() {
        return $this->hasMany('App\Model\AddTermEng', 'context_id');
    }

    public function termcha() {
    	return $this->hasMany('App\Model\AddTermCha', 'context_id');
    }
//Bookmark Checker
    public static function isBookmarked($id){
    
        $user_id=Auth::user()->id;
        return DB::table('context_bookmarks')
                 ->where('context_bookmarks.user_id',$user_id)
                 ->where('context_bookmarks.context_id',$id)
                 ->count();
    }
}
