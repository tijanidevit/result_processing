<?php
namespace App\Utils;

class SchoolUtil{
    public static function getShoolId ($user){
        return $user->schoolDean->school_id;
    }
}
