<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use SoftDeletes;

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function recipient(){
        return $this->belongsTo(User::class, 'recipient_id');
    }

}
