<?php
namespace App\Services\Admin;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DeanService {
    protected $dean;

    public function __construct(protected User $user) {
        $this->dean = $this->user->deanOnly();
    }

    public function getAll() {
        return $this->dean->with('schoolDean.school')->oldest('name')->get();
    }
    public function addNew($data) {
       DB::transaction(function () use($data) {
        $school_id = $data['school_id'];
        unset($data['school_id']);
        $data['password'] = Hash::make('password');
        $data['role'] = UserRoleEnum::DEAN;
        $dean = $this->user->create($data);
        return $dean->schoolDean()->create(['school_id' => $school_id]);
       });
    }

}
