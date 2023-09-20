<?php
namespace App\Services\Admin;

use App\Models\School;

class SchoolService {

    public function __construct(protected School $school) {
    }

    public function getAll() {
        return $this->school->orderBy('name')->get();
    }

}
