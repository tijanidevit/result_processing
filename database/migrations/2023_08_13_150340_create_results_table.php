<?php

use App\Models\DepartmentCourse;
use App\Models\Student;
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
        Schema::create('results', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Student::class)->nullable();
            $table->foreignIdFor(DepartmentCourse::class);
            $table->string('matric_no');
            $table->integer('test_score');
            $table->integer('exam_score');
            $table->integer('total_score');
            $table->integer('total_score');
            $table->string('grade');
            $table->decimal('gp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};
