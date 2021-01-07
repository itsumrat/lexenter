<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AddTermCha extends Model
{
    protected $fillable = [
        'context_id', 'cterms', 'cnote', 'status',
    ];
}
