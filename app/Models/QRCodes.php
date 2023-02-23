<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRCodes extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function student()
    {
        return $this->belongsTo(Students::class, 'student_id');
    }
}
