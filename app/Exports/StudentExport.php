<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentExport implements FromCollection, WithHeadings, WithMapping
{
    public function headings(): array
    {
        return ['Name', 'Email', 'Image', 'Phone', 'Class'];
    }

    public function collection()
    {
        return Student::select(['sname', 'semail', 'image', 'phone', 'classId'])->with(['room'])->get();
    }

    public function map($row): array
    {
        return [
            $row->sname,
            $row->semail,
            $row->image,
            $row->phone,
            $row->room->cname
        ];
    }
}