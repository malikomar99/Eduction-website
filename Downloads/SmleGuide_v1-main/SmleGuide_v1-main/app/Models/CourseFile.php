<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CourseFile extends Model
{
    use SoftDeletes;
    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function libraryFiles()
{
    return $this->morphMany(Library::class, 'libraryable');
}
}
