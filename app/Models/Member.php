<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Notifications\ResetPasswordNotification;

class Member extends Authenticatable
{
    protected $table = 'members';
    protected $fillable = ['phone','name','password','avatar','remember_token','uuid',
        'real_name','level','mobile','email','province','city','district','street','address'];
    protected $hidden = ['password','remember_token'];

    public $level_type=[
        '0'=>'普通客户',
        '1'=>'大客户',
        '2'=>'VIP',
        '3'=>'区代',
        '4'=>'省代',
    ];
    public $sex_type=[
        '0'=>'女',
        '1'=>'男',
    ];

    public function getLevelAttribute($value){
        return $this->level_type[$value];
    }

    public function getSexAttribute($value){
        return $this->sex_type[$value];
    }
}
