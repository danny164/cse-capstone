<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    // 1 id plan cho 1 kì capstone
    public function semester()
    {
        return $this->hasOne(Semester::class, 'semester_id');
    }
}
