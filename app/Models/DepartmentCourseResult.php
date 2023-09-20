<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DepartmentCourseResult extends Model
{
    use HasFactory;

    protected $guarded = ['id'];


    public function departmentCourse() : BelongsTo {
        return $this->belongsTo(DepartmentCourse::class);
    }

    public function lecturer() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}
