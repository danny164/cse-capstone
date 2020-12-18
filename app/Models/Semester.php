<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;

    protected $fillable = [
        'semester_name',
        'description',
        'start_date',
        'due_date',
        'avatar_path'
    ];

    // 1 kì capstone có nhiều id team
    public function team()
    {
        return $this->hasMany(Team::class, 'semester_id');
    }

    // 1 kì capstone có nhiều id topic
    public function topic()
    {
        return $this->hasMany(Topic::class, 'semester_id');
    }

    // semester + user = semseters_users table
    public function user()
    {
        return $this->belongsToMany(User::class, 'semesters_users', 'semester_id', 'user_id')->as('semesters_users')->using(TeamUser::class);
    }

}
