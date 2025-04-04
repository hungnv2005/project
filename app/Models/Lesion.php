<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesion extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image', 'course_id'];

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id'); // Đảm bảo course_id là khóa ngoại
    }
}
