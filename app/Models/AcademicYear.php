<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    use HasFactory;

    protected $fillable = ['year', 'is_active'];

    public function classSections()
    {
        return $this->hasMany(ClassSection::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function semesterEnrollments()
    {
        return $this->hasMany(SemesterEnrollment::class);
    }
}
