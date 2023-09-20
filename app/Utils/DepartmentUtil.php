<?php
namespace App\Utils;

class DepartmentUtil{
    public static function getDepartmentId ($user){
        return $user->departmentHod->department_id;
    }
}
