<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContextParaCha extends Model
{
    protected $fillable = [
        'context_id', 'cparagraph', 'corder',
    ];
}
