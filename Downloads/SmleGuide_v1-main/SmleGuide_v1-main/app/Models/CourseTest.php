<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseTest extends Model
{
    //
    public function libraryTests()
{
    return $this->morphMany(Library::class, 'libraryable');
}
}
