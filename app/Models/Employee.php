<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'cpf',
        'gender',
        'ethnicity',
        'date_of_birth',
        'about_me',
        'id_birthplace',
        'id_workplace',
        'id_profession'
    ];

    public function photos()
    {
        return $this->hasMany(
            Photo::class,'id_employee'
        );
    }

    public function birthplace()
    {
        return $this->belongsTo(
            Location::class,'id_birthplace','id'
        );
    }

    public function workplace()
    {
        return $this->belongsTo(
            Location::class,'id_workplace','id'
        );
    }

    public function profession()
    {
        return $this->belongsTo(
            Profession::class,'id_profession','id'
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,'id_user','id'
        );
    }

    protected static function boot(): void
    {
        parent::boot();
        static::creating(
            function ($employee)
            {
                $username = "{$employee->name} {$employee->surname}";
                $slug = Str::slug($username);
                $count = Employee::where('slug', 'LIKE', "{$slug}%")->count();

                $employee->slug = $count ? "{$slug}-{$count}" : $slug;
            }
        );
    }

    protected static function booted(): void
    {
        static::creating(
            function ($employee)
            {
                if (Auth::check() && is_null($employee->id_user)):
                    $employee->id_user = Auth::id();
                endif;
            }
        );
        static::deleting(
            function ($employee)
            {
                foreach ($employee->photos as $photo):
                    $imagePath = public_path('\\employees\img\\'.$photo->file_path);
                    if (File::exists($imagePath)):
                        File::delete($imagePath);
                    endif;
                    $photo->where('id_employee', $employee->id)->delete();
                endforeach;
            }
        );
    }
}
