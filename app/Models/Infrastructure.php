<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Infrastructure extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function school()
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function scopeHighSchool_A()
    {
        $data = DB::table('infrastructures')->select('infrastructures.id', 'schools.name as school', 'infrastructures.answer_1 as answer')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeHighSchool_B()
    {
        $data = DB::table('infrastructures')->select('infrastructures.id', 'schools.name as school', 'infrastructures.answer_2 as answer')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeHighSchool_C()
    {
        $data = DB::table('infrastructures')->select('infrastructures.id', 'schools.name as school', DB::raw('infrastructures.answer_4 / infrastructures.answer_6 as answer'),)
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeHighSchool_D()
    {
        $data = DB::table('infrastructures')->select('infrastructures.id', 'schools.name as school', 'infrastructures.answer_8 as answer')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeHighSchool_E()
    {
        $data = DB::table('infrastructures')->select('infrastructures.id', 'schools.name as school', 'infrastructures.answer_9 as answer')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }
}
