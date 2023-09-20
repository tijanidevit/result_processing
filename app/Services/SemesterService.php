<?php

namespace App\Services;

use App\Models\Semester;
use Illuminate\Database\Eloquent\Collection;

class SemesterService {
    public function __construct(protected Semester $semester) {
    }

    public function getAll() : Collection {
        return $this->semester->oldest('name')->get();
    }
}
