<?php
namespace App\Services\Dean;

use App\Models\Department;
use App\Utils\SchoolUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DepartmentService {

    public function __construct(protected Department $department) {
    }

    public function getAll() {
        return $this->department->where('school_id', SchoolUtil::getShoolId(auth()->user()))->with('hod.user')->oldest('name')->get();
    }
    public function addNew($data) {
        $data['school_id'] = SchoolUtil::getShoolId(auth()->user());
        $department = $this->department->create($data);
    }

}
