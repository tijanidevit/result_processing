<?php
namespace App\Services\Department;

use App\Enums\UserRoleEnum;
use App\Models\User;
use App\Utils\DepartmentUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LecturerService {
    protected $lecturer;

    public function __construct(protected User $user) {
        $this->lecturer = $this->user->lecturerOnly();
    }

    public function getAll() {
        return $this->lecturer->oldest('name')
        ->whereHas('departmentLecturer', function ($query) {
            return $query->where('department_id', DepartmentUtil::getDepartmentId(auth()->user()));
        })
        ->get();
    }
    public function addNew($data) {
       DB::transaction(function () use($data) {
        $departmentId = DepartmentUtil::getDepartmentId(auth()->user());

        $data['password'] = Hash::make('password');
        $data['role'] = UserRoleEnum::LECTURER;
        $lecturer = $this->user->create($data);
        return $lecturer->departmentLecturer()->create(['department_id' => $departmentId]);
       });
    }

}
