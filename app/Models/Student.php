<?php

namespace App\Models;

use App\Models\Room;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $table = 'student';
    protected $fillable = ['sname','semail','image','phone','classId'];
    public $timestamps=true;

    public function Room(){
        return $this->belongsTo(Room::class,'classId','id');
    }
}
