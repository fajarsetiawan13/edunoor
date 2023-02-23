<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function qr()
    {
        return $this->hasOne(QRCodes::class);
    }

    public function infrastructure()
    {
        return $this->hasOne(Infrastructure::class);
    }
}
