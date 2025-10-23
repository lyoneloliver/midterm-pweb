<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = ['action', 'actor_id', 'actor_type', 'target_id', 'target_type'];

    public function actor()
    {
        return $this->belongsTo(User::class, 'actor_id');
    }
}
