<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    protected $table = 'room';
    protected $fillable = ['cname'];
    public $timestamps=true;

    public function Student(){
        return $this->hasmany(Student::class,'id','classId');
    }
}
