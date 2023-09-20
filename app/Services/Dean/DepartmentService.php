<?php
namespace App\Services\Dean;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DepartmentService {
    protected $departmentUser;

    public function __construct(protected User $user) {
        $this->departmentUser = $this->user->departmentOnly();
    }

    public function getAll() {
        return $this->departmentUser->with('department')->oldest('name')->get();
    }
    public function addNew($data) {
       DB::transaction(function () use($data) {
        $school_id = $data['school_id'];
        unset($data['school_id']);
        $data['password'] = Hash::make('password');
        $data['role'] = UserRoleEnum::DEAN;
        $departmentUser = $this->user->create($data);
        return $departmentUser->schoolDepartment()->create(['school_id' => $school_id]);
       });
    }

}
