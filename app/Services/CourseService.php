<?php

namespace App\Services;

use App\Models\Course;
use Illuminate\Database\Eloquent\Collection;

class CourseService {
    public function __construct(protected Course $course) {
    }

    public function getAll() : Collection {
        return $this->course->oldest('title')->get();
    }
}
