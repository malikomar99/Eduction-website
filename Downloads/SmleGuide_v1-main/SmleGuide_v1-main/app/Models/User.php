<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'name',
        'email',
        'password',
        'mobile',
        'country',
        'profile_picture',
        'email_verified_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function subscriptions()
    {
        return $this->hasMany(UserCoursePurchase::class);
    }

    
    public function scopeFilterUser($query, $filters)
    {
        // return;
        $query->when($filters['name'] ?? false, function ($q, $value) {
            $q->whereHas('subscriptions.user', fn($q2) => $q2->where('name', 'like', "%{$value}%"));
        });

        $query->when($filters['course'] ?? false, function ($q, $value) {
            $q->whereHas('subscriptions.file.course', fn($q2) => $q2->where('title', 'like', "%{$value}%"));
        });

        $query->when($filters['category'] ?? false, function ($q, $value) {
            $q->whereHas('subscriptions.file.course.category', fn($q2) => $q2->where('name', 'like', "%{$value}%"));
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



    public function libraryItems()
{
    return $this->hasMany(Library::class);
}
}
