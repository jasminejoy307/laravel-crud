<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Departments extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = ['name'];
    public $timestamps=false;
    public function Teachers(){
        return $this->hasmany(Teachers::class,'dep_id','id');
    }
}
