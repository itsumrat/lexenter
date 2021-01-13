<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TermContext extends Model
{
    protected $fillable = [
        'context_no', 'esource', 'csource', 'eterms', 'cterms', 'eparagraph', 'cparagraph', 'order', 'status',
    ];
    

    public function temrengchi() {
    	return $this->hasMany('App\Model\TermEngCha', 'term_context_id');
    }

    public function temreng() {
    	return $this->hasMany('App\Model\TermEng', 'term_context_id');
    }

    public function termcha() {
    	return $this->hasMany('App\Model\TermCha', 'term_context_id');
    }
}
