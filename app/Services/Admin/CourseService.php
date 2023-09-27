<?php
namespace App\Services\Admin;

use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CourseService {

    public function __construct(protected Course $course) {
    }

    public function getAll() {
        return $this->course->oldest('title')->get();
    }
    public function addNew($data) {
        return $this->course->create($data);
    }

}
