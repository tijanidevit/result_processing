<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Enums\UserRoleEnum;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function schoolDean() {
        return $this->hasOne(SchoolDean::class);
    }

    public function lecturerCourses() {
        return $this->hasMany(LecturerCourse::class);
    }

    public function departmentCourses() {
        return $this->hasManyThrough(DepartmentCourse::class,LecturerCourse::class);
    }

    public function departmentHod() {
        return $this->hasOne(DepartmentHod::class);
    }

    public function departmentLecturer() {
        return $this->hasOne(DepartmentLecturer::class);
    }

    public function isAdmin() : bool {
        return $this->role == UserRoleEnum::ADMIN;
    }

    public function isDepartment() : bool {
        return $this->role == UserRoleEnum::DEPARTMENT_OFFICER;
    }
    public function isDean() : bool {
        return $this->role == UserRoleEnum::DEAN;
    }

    public function isLecturer() : bool {
        return $this->role == UserRoleEnum::LECTURER;
    }

    public function scopeAdminOnly($query) {
        return $query->whereRole(UserRoleEnum::ADMIN);
    }

    public function scopeDeanOnly($query) {
        return $query->whereRole(UserRoleEnum::DEAN);
    }

    public function scopeDepartmentOnly($query) {
        return $query->whereRole(UserRoleEnum::DEPARTMENT_OFFICER);
    }
    public function scopeLecturerOnly($query) {
        return $query->whereRole(UserRoleEnum::LECTURER);
    }

}
