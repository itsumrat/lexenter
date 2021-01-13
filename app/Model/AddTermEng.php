<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AddTermEng extends Model
{
    protected $fillable = [
        'context_id', 'eterms', 'enote', 'status',
    ];
}
