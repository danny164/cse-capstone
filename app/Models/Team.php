<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;


    // 1 id team chỉ thuộc về 1 kì capstone
    public function semester()
    {
    	return $this->belongsTo(Semester::class, 'semester_id');
    }

    // 1 team có nhiều id user, 1 user có thể ở trong nhiều id team (nhưng khác group vẫn được chấp nhận)
    public function user()
    {
        return $this->belongsToMany(User::class,'teams_users', 'user_id', 'team_id')->withTimestamps();
    }

}
