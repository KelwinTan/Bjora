<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;

    public const STATUS_OPEN = 'open';
    public const STATUS_CLOSED = 'closed';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topic(){
        return $this->belongsTo(Topic::class, 'topic_id');
    }



}
