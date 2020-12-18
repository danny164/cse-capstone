<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content'
    ];

    // 1 thông báo chỉ thuộc về 1 user
    public function user()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
