<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LecturerCourse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function departmentCourse() {
        return $this->belongsTo(DepartmentCourse::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
