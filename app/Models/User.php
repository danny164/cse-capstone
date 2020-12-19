<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function isRole()
    {
        return $this->role_id;
    }

    // 1 user có nhiều id thông báo
    public function announcement()
    {
        return $this->hasMany(Announcement::class, 'user_id');
    }

    // semester + user = semseters_users table
    public function semester()
    {
        return $this->belongsToMany(Semester::class, 'semesters_users', 'semester_id', 'user_id')->as('semesters_users')->withTimestamps();
    }

    // team + user = teams_users table
    public function team()
    {
        return $this->belongsToMany(Team::class, 'teams_users', 'user_id', 'team_id')->withTimestamps();
    }
}
