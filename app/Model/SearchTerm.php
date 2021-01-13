<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SearchTerm extends Model
{
    protected $fillable = [
        'user_id', 'search_end_ter', 'search_chi_ter',
    ];

    public function userTerm()
    {
    	return $this->belongsTo('App\User', 'user_id');
    }
}
