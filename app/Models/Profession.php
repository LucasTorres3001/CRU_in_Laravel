<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    use HasFactory;

    protected $fillable = ['profession_name', 'salary', 'id_course'];

    public function course(): BelongsTo
    {
        return $this->belongsTo(
            Course::class,'id_course','id'
        );
    }
}
