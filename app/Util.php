<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Util extends Model
{
    public static function getUserRole($id=null){
        $rel = [
            1=>'Admin',
            2=>'Manager',
            3=>'Editor'
            ];
        return isset($id)?$rel[$id]:$rel;
    }

}
