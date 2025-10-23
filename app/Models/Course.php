<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['code', 'name', 'sks', 'semester', 'description', 'department_id'];

    public function prerequisites()
    {
        return $this->hasMany(CoursePrerequisite::class);
    }

    public function requiredFor()
    {
        return $this->hasMany(CoursePrerequisite::class, 'prerequisite_id');
    }

    public function classSections()
    {
        return $this->hasMany(ClassSection::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
