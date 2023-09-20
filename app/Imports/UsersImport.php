<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    public function __construct(protected int $departmentId) {
    }
    public function model(array $row)
    {
        Log::info('In the model');
        return new User([
            'name' => $row[0],
        ]);
    }
}
