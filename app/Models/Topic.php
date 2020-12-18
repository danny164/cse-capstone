<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    // 1 id topic chỉ thuộc về 1 kì capstone
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
}
