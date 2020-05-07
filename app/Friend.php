<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    protected $fillable=[
        'user_id','to_user_id','status'
    ];
    public function user1(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function user2(){
        return $this->belongsTo(User::class,'to_user_id');
    }
}
