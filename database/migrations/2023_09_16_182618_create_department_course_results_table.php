<?php

use App\Models\DepartmentCourse;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('department_course_results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(DepartmentCourse::class);
            $table->foreignIdFor(User::class);
            $table->string('uploaded_file');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('department_course_results');
    }
};
