<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dict extends Model
{
    protected $table = 'dict';
    protected $fillable = ['group','code','value','desc','sort'];

}
