<?php

namespace App\Exports;

use App\Student;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromQuery, WithHeadings
{
    use Exportable;
    private $class;

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Nis',
            'Password',
        ];
    }

    public function query()
    {
        return Student::select('student_name', 'student_nis', 'student_password')->where('student_class', $this->class)->orderBy('student_name', 'ASC');
    }
}
