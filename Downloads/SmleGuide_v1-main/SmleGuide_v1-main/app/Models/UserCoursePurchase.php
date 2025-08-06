<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserCoursePurchase extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'category_id',
        'course_id',
        'payment_method',
        'payment_slip',
        'purchase_date',
        'expiry_date',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function scopeFilter($query, $filters)
    // {
    //     return $query
    //         ->when($filters['name'] ?? false, function ($q, $name) {
    //             $q->whereHas('user', function ($q2) use ($name) {
    //                 $q2->where('name', 'like', "%$name%");
    //             });
    //         })
    //         ->when($filters['category'] ?? false, function ($q, $category) {
    //             $q->whereHas('file.course.category', function ($q2) use ($category) {
    //                 $q2->where('name', 'like', "%$category%");
    //             });
    //         })
    //         ->when($filters['course'] ?? false, function ($q, $title) {
    //             $q->whereHas('file.course', function ($q2) use ($title) {
    //                 $q2->where('title', 'like', "%$title%");
    //             });
    //         });
    // }
    public function scopeFilter($query, $filters)
    {
        $query->when($filters['name'] ?? false, function ($q, $value) {
            $q->whereHas('user', fn($q2) => $q2->where('name', 'like', "%{$value}%"));
        });

        $query->when($filters['course'] ?? false, function ($q, $value) {
            $q->whereHas('file.course', fn($q2) => $q2->where('title', 'like', "%{$value}%"));
        });

        $query->when($filters['category'] ?? false, function ($q, $value) {
            $q->whereHas('file.course.category', fn($q2) => $q2->where('name', 'like', "%{$value}%"));
        });

        //  date filter:
        $query->when($filters['daterange'] ?? false, function ($q, $value) {
            [$start, $end] = explode(' to ', $value);
            $q->whereBetween('created_at', [
                \Carbon\Carbon::parse($start)->format('Y-m-d'),
                \Carbon\Carbon::parse($end)->format('Y-m-d')
            ]);
        });

        return $query;
    }
}
