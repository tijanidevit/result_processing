<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

class DepartmentStudentExport implements FromCollection, WithHeadings,WithEvents
{
    public function __construct(protected $departmentId, protected $levelId){}
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $students = Student::where([
            'department_id' => $this->departmentId,
            'level_id' => $this->levelId,
        ])->oldest('matric_no')->select('matric_no')->get();

        $data = $students->map(function ($student) {
            return [
                'matric_no' => $student->matric_no,
                'CA Score' => '0',
                'Exam Score' => '0',
                'Total Score' => '0',
            ];
        });
        return $data;
    }



    public function headings(): array
    {
        return [
            'Matric No',
            'CA Score',
            'Exam Score',
            'Total Score',
        ];
    }

    // public function columnWidths(): array
    // {
    //     return [
    //         'A' => 400, // Width of the Matric No column
    //         'B' => 90, // Width of the CA Score column
    //         'C' => 90, // Width of the Exam Score column
    //         'D' => 90, // Width of the Total Score column
    //     ];
    // }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(90);
            },
        ];
    }


}
