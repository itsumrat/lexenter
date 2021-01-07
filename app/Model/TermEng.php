<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TermEng extends Model
{
    protected $fillable = [
        'term_context_id', 'eterms', 'enote', 'status',
    ];
}
