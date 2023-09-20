<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentCourse extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function department() {
        return $this->belongsTo(Department::class);
    }

    public function course() {
        return $this->belongsTo(Course::class);
    }

    public function level() {
        return $this->belongsTo(Level::class);
    }

    public function lecturerCourse() {
        return $this->hasOne(LecturerCourse::class);
    }

    public function semester() {
        return $this->belongsTo(Semester::class);
    }
    public function results() {
        return $this->hasMany(Result::class);
    }


    public function result() {
        return $this->hasOne(DepartmentCourseResult::class);
    }
}
