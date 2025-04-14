<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = ['id_employee', 'file_path'];

    public function employee()
    {
        return $this->belongsTo(
            Employee::class,'id_employee','id'
        );
    }
}
