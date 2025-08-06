<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function files()
    {
        return $this->hasMany(CourseFile::class);
    }
    public function tests()
    {
        return $this->belongsToMany(Test::class, 'course_tests', 'course_id', 'test_id');
    }
    public function videos()
    {
        return $this->hasMany(CourseVideo::class);
    }
    public function libraryCourses()
    {
        return $this->morphMany(Library::class, 'libraryable');
    }
}
