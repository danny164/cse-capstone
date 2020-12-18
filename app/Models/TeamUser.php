<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TeamUser extends Pivot
{
    protected $table = "teams_users";

    public function team_user()
    {
        return $this->belongsToMany(Team::class,'teams_users', 'user_id', 'team_id');
    }
}
