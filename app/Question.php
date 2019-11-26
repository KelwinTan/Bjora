<?php

namespace Bjora;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'topic_id', 'question',
    ];

    public const STATUS_OPEN = 'open';
    public const STATUS_CLOSED = 'closed';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    public function answers(){
        return $this->hasMany(Answer::class, 'question_id');
    }

}
