<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory;

    protected $fillable = ['class_section_id', 'day', 'start_time', 'end_time', 'room'];

    public function classSection()
    {
        return $this->belongsTo(ClassSection::class);
    }
}
