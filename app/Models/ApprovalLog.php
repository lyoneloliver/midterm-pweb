<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalLog extends Model
{
    use HasFactory;

    protected $fillable = ['approved_by', 'action', 'note'];

    public function approver()
    {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
