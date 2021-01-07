<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AddTermEngChi extends Model
{
    protected $fillable = [
        'context_id', 'term_no', 'eterms', 'enote', 'cterms', 'cnote', 'enotet', 'cnotet', 'status',
    ];
}
