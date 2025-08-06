<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use SoftDeletes;
    protected $fillable = ['question_title','answer_reason', 'test_id', 'image'];

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
