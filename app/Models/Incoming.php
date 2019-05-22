<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Incoming extends Model
{
    protected $table = 'incoming';
    protected $fillable = ['no','name','bn','quantity','price','color','size','style','order_at'];
}
