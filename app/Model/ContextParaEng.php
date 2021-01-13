<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ContextParaEng extends Model
{
    protected $fillable = [
        'context_id', 'context_no', 'eparagraph', 'cparagraph', 'order', 'status',
    ];
}
