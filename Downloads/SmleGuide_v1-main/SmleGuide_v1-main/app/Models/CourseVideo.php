<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CourseVideo extends Model
{
    //
     use SoftDeletes;
    protected $fillable = [
        'course_id',
        'video_label',
        'video_url',
        'video_thumbnail',
        'type',
        'status', // Assuming you want to add a status field
    ];

    public function libraryVideos()
{
    return $this->morphMany(Library::class, 'libraryable');
}

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
