<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttenndanceRecord extends Model
{
    use HasFactory;
    protected $fillable = ['teacher_id', 'timestamp', 'sign_in', 'sign_out'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}
