<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['enrollment_id', 'date', 'status'];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }
}
