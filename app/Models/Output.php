<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Output extends Model
{
    protected $table = 'output';
    protected $fillable = ['no','name','bn','quantity','price','color','size','style','buyer','phone','logi_no','address','order_at'];
}
