<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TermCha extends Model
{
    protected $fillable = [
        'term_context_id', 'cterms', 'cnote', 'status',
    ];
}
