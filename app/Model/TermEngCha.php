<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TermEngCha extends Model
{
    protected $fillable = [
        'term_context_id', 'term_no', 'etermst', 'enote', 'ctermst', 'cnote', 'enotet', 'cnotet', 'status',
    ];

    public function termcontext() {
    	return $this->belongsTo('App\Model\TermContext', 'term_context_id', 'id');
    }
}
