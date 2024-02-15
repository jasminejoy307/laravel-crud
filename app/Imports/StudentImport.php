<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    
    private $rows = 0;
    // public $uploadBatch = null;
    // public function __construct($uploadBatch)
    // {
    //     $this->uploadBatch = $uploadBatch;
    // }

    public function model(array $row)
    {
        ++$this->rows;
        return new Student([
            'sname'    => $row['name'],
            'semail'   => $row['email'],
            'phone'    => $row['phone'],
            'classId'  => $row['class'],
            'image'    => $row['image'],
            // 'uploaddt' => $this->uploadBatch,
        ]);
    }

    public function rules(): array
    {
        return [
            'email' => Rule::unique('student', 'semail'),
        ];
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}