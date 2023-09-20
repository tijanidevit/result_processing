<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService {
    public function __construct(protected User $user) {
    }

    public function getLecturers() : Collection {
        return $this->user->lecturerOnly()->oldest('name')->get();
    }
}
