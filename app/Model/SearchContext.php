<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SearchContext extends Model
{
    protected $fillable = [
        'user_id', 'search_end_con', 'search_chi_con',
    ];

    public function userContext()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
