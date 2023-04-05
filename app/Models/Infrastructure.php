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

    public function scopeLuasSekolahSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A1 as answer'))
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeLuasSekolahSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A1 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeLuasSekolahSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A1 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeRuangTerbukaSekolahSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A2 as answer'))
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeRuangTerbukaSekolahSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A2 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeRuangTerbukaSekolahSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A2 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeRuangKelasSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A3 as answer'))
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeRuangKelasSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A3 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeRuangKelasSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A3 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeLuasKelasSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A4 as answer'))
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeLuasKelasSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A4 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeLuasKelasSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A4 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeVentilasiKelasSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A5 as answer'))
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeVentilasiKelasSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A5 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeVentilasiKelasSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.A5 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeKepadatanSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.B2 / infrastructures.A3 as answer'))
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeKepadatanSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.B2 / infrastructures.A3 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeKepadatanSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.B2 / infrastructures.A3 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeBasis_Data_SD()
    {
        $data = DB::table('infrastructures')
            ->select(
                'infrastructures.id',
                'schools.name as school',
                'schools.bp as bp',
                'infrastructures.B1 as B1',
                'infrastructures.B2 as B2',
                'infrastructures.B3 as B3',
                'infrastructures.C1 as C1',
                'infrastructures.C2 as C2',
                'infrastructures.C3 as C3',
                'infrastructures.C4 as C4',
                'infrastructures.C5 as C5',
                'infrastructures.C6 as C6',
                'infrastructures.C7 as C7',
                'infrastructures.C8 as C8',
                'infrastructures.C9 as C9',
                'infrastructures.D1 as D1',
                'infrastructures.D2 as D2',
                'infrastructures.D3 as D3',
                'infrastructures.D4 as D4',
                'infrastructures.D5 as D5',
                'infrastructures.D6 as D6',
                'infrastructures.E1 as E1',
                'infrastructures.E2 as E2',
                'infrastructures.E3 as E3',
                'infrastructures.explanation_B1 as desc_B1',
                'infrastructures.explanation_B2 as desc_B2',
                'infrastructures.explanation_B3 as desc_B3',
                'infrastructures.explanation_C1 as desc_C1',
                'infrastructures.explanation_C2 as desc_C2',
                'infrastructures.explanation_C3 as desc_C3',
                'infrastructures.explanation_C4 as desc_C4',
                'infrastructures.explanation_C5 as desc_C5',
                'infrastructures.explanation_C6 as desc_C6',
                'infrastructures.explanation_C7 as desc_C7',
                'infrastructures.explanation_C8 as desc_C8',
                'infrastructures.explanation_C9 as desc_C9',
                'infrastructures.explanation_D1 as desc_D1',
                'infrastructures.explanation_D2 as desc_D2',
                'infrastructures.explanation_D3 as desc_D3',
                'infrastructures.explanation_D4 as desc_D4',
                'infrastructures.explanation_D5 as desc_D5',
                'infrastructures.explanation_D6 as desc_D6',
                'infrastructures.explanation_E1 as desc_E1',
                'infrastructures.explanation_E2 as desc_E2',
                'infrastructures.explanation_E3 as desc_E3',
            )
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeBasis_Data_SMP()
    {
        $data = DB::table('infrastructures')
            ->select(
                'infrastructures.id',
                'schools.name as school',
                'schools.bp as bp',
                'infrastructures.B1 as B1',
                'infrastructures.B2 as B2',
                'infrastructures.B3 as B3',
                'infrastructures.C1 as C1',
                'infrastructures.C2 as C2',
                'infrastructures.C3 as C3',
                'infrastructures.C4 as C4',
                'infrastructures.C5 as C5',
                'infrastructures.C6 as C6',
                'infrastructures.C7 as C7',
                'infrastructures.C8 as C8',
                'infrastructures.C9 as C9',
                'infrastructures.D1 as D1',
                'infrastructures.D2 as D2',
                'infrastructures.D3 as D3',
                'infrastructures.D4 as D4',
                'infrastructures.D5 as D5',
                'infrastructures.D6 as D6',
                'infrastructures.E1 as E1',
                'infrastructures.E2 as E2',
                'infrastructures.E3 as E3',
                'infrastructures.explanation_B1 as desc_B1',
                'infrastructures.explanation_B2 as desc_B2',
                'infrastructures.explanation_B3 as desc_B3',
                'infrastructures.explanation_C1 as desc_C1',
                'infrastructures.explanation_C2 as desc_C2',
                'infrastructures.explanation_C3 as desc_C3',
                'infrastructures.explanation_C4 as desc_C4',
                'infrastructures.explanation_C5 as desc_C5',
                'infrastructures.explanation_C6 as desc_C6',
                'infrastructures.explanation_C7 as desc_C7',
                'infrastructures.explanation_C8 as desc_C8',
                'infrastructures.explanation_C9 as desc_C9',
                'infrastructures.explanation_D1 as desc_D1',
                'infrastructures.explanation_D2 as desc_D2',
                'infrastructures.explanation_D3 as desc_D3',
                'infrastructures.explanation_D4 as desc_D4',
                'infrastructures.explanation_D5 as desc_D5',
                'infrastructures.explanation_D6 as desc_D6',
                'infrastructures.explanation_E1 as desc_E1',
                'infrastructures.explanation_E2 as desc_E2',
                'infrastructures.explanation_E3 as desc_E3',
            )
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeBasis_Data_SMA()
    {
        $data = DB::table('infrastructures')
            ->select(
                'infrastructures.id',
                'schools.name as school',
                'schools.bp as bp',
                'infrastructures.B1 as B1',
                'infrastructures.B2 as B2',
                'infrastructures.B3 as B3',
                'infrastructures.C1 as C1',
                'infrastructures.C2 as C2',
                'infrastructures.C3 as C3',
                'infrastructures.C4 as C4',
                'infrastructures.C5 as C5',
                'infrastructures.C6 as C6',
                'infrastructures.C7 as C7',
                'infrastructures.C8 as C8',
                'infrastructures.C9 as C9',
                'infrastructures.D1 as D1',
                'infrastructures.D2 as D2',
                'infrastructures.D3 as D3',
                'infrastructures.D4 as D4',
                'infrastructures.D5 as D5',
                'infrastructures.D6 as D6',
                'infrastructures.E1 as E1',
                'infrastructures.E2 as E2',
                'infrastructures.E3 as E3',
                'infrastructures.explanation_B1 as desc_B1',
                'infrastructures.explanation_B2 as desc_B2',
                'infrastructures.explanation_B3 as desc_B3',
                'infrastructures.explanation_C1 as desc_C1',
                'infrastructures.explanation_C2 as desc_C2',
                'infrastructures.explanation_C3 as desc_C3',
                'infrastructures.explanation_C4 as desc_C4',
                'infrastructures.explanation_C5 as desc_C5',
                'infrastructures.explanation_C6 as desc_C6',
                'infrastructures.explanation_C7 as desc_C7',
                'infrastructures.explanation_C8 as desc_C8',
                'infrastructures.explanation_C9 as desc_C9',
                'infrastructures.explanation_D1 as desc_D1',
                'infrastructures.explanation_D2 as desc_D2',
                'infrastructures.explanation_D3 as desc_D3',
                'infrastructures.explanation_D4 as desc_D4',
                'infrastructures.explanation_D5 as desc_D5',
                'infrastructures.explanation_D6 as desc_D6',
                'infrastructures.explanation_E1 as desc_E1',
                'infrastructures.explanation_E2 as desc_E2',
                'infrastructures.explanation_E3 as desc_E3',
            )
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }
}
