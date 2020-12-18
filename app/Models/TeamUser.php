<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TeamUser extends Pivot
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // public function team(){
    //     return $this->belongsToMany(Team::class, 'team_id');
    // }
}
