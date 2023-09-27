<?php
namespace App\Services\Dean;

use App\Enums\UserRoleEnum;
use App\Models\User;
use App\Utils\SchoolUtil;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HODService {
    protected $departmentUser;

    public function __construct(protected User $user) {
        $this->departmentUser = $this->user->departmentOnly();
    }

    public function getAll() {
        return $this->departmentUser->whereHas('departmentHod', function ($query) {
            return $query->whereHas('department', function ($dQuery) {
                return $dQuery->where('school_id', SchoolUtil::getShoolId(auth()->user()));
            });
        })->with('departmentHod.department')->oldest('name')->get();
    }
    public function addNew($data) {
       DB::transaction(function () use($data) {
        $department_id = $data['department_id'];
        unset($data['department_id']);

        $data['password'] = Hash::make('password');

        $data['role'] = UserRoleEnum::DEPARTMENT_OFFICER;

        $departmentUser = $this->user->create($data);
        return $departmentUser->departmentHod()->create(['department_id' => $department_id]);
       });
    }

}
