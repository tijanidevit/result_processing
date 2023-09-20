<?php

namespace App\Jobs;

use App\Imports\Student\UploadStudentsImport;
use App\Imports\UsersImport;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class UploadStudentsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected string $filePath, protected int $departmentId,  protected int $levelId,  protected int $sessionId){
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info('Got here');
        // Excel::import(new UsersImport($this->departmentId), $this->filePath);
        Excel::import(new UploadStudentsImport($this->departmentId,$this->levelId,$this->sessionId), $this->filePath);
    }


}
