<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = ['title', 'description', 'introduction'];

    // Mối quan hệ: 1 khóa học có nhiều bài học
    public function lesions()
    {
        return $this->hasMany(Lesion::class, 'course_id');
    }
}
