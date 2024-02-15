<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = ['name','dep_id','email','phone'];
    public $timestamps=false;

    public function Departments(){
        return $this->belongsTo(Departments::class,'id','dep_id');
    }
}
