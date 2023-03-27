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

    public function scopeKepadatanSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.B2 / infrastructures.B3 as answer'))
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeKepadatanSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.B2 / infrastructures.B3 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeKepadatanSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', DB::raw('infrastructures.B2 / infrastructures.B3 as answer'))
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id')->pluck('answer', 'school');
        return $data;
    }

    public function scopeVentilasiSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.C3 as answer')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeVentilasiSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.C3 as answer')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeVentilasiSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.C3 as answer')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeTempatCuciTanganSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A1 as answer', 'infrastructures.explanation_A1 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeTempatCuciTanganSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A1 as answer', 'infrastructures.explanation_A1 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeTempatCuciTanganSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A1 as answer', 'infrastructures.explanation_A1 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeSabunCuciTanganSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A2 as answer', 'infrastructures.explanation_A2 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeSabunCuciTanganSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A2 as answer', 'infrastructures.explanation_A2 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeSabunCuciTanganSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A2 as answer', 'infrastructures.explanation_A2 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeAirToiletSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A3 as answer', 'infrastructures.explanation_A3 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeAirToiletSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A3 as answer', 'infrastructures.explanation_A3 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeAirToiletSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A3 as answer', 'infrastructures.explanation_A3 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeHandsanitizerSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A4 as answer', 'infrastructures.explanation_A4 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeHandsanitizerSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A4 as answer', 'infrastructures.explanation_A4 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeHandsanitizerSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A4 as answer', 'infrastructures.explanation_A4 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeMaskerSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A5 as answer', 'infrastructures.explanation_A5 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeMaskerSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A5 as answer', 'infrastructures.explanation_A5 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeMaskerSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A5 as answer', 'infrastructures.explanation_A5 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeKetaatanMaskerSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A6 as answer', 'infrastructures.explanation_A6 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeKetaatanMaskerSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A6 as answer', 'infrastructures.explanation_A6 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeKetaatanMaskerSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A6 as answer', 'infrastructures.explanation_A6 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeThermogunSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A7 as answer', 'infrastructures.explanation_A7 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeThermogunSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A7 as answer', 'infrastructures.explanation_A7 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeThermogunSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.A7 as answer', 'infrastructures.explanation_A7 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeSatgasCovidSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D1 as answer', 'infrastructures.explanation_D1 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeSatgasCovidSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D1 as answer', 'infrastructures.explanation_D1 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeSatgasCovidSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D1 as answer', 'infrastructures.explanation_D1 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeProtokolKesehatanSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D2 as answer', 'infrastructures.explanation_D2 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeProtokolKesehatanSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D2 as answer', 'infrastructures.explanation_D2 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeProtokolKesehatanSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D2 as answer', 'infrastructures.explanation_D2 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeProsedurCovidSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D3 as answer', 'infrastructures.explanation_D3 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeProsedurCovidSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D3 as answer', 'infrastructures.explanation_D3 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeProsedurCovidSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D3 as answer', 'infrastructures.explanation_D3 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeMediaInformasiSD()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D4 as answer', 'infrastructures.explanation_D4 as description')
            ->where('infrastructures.school_bp', '=', 'SD')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeMediaInformasiSMP()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D4 as answer', 'infrastructures.explanation_D4 as description')
            ->where('infrastructures.school_bp', '=', 'SMP')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }

    public function scopeMediaInformasiSMA()
    {
        $data = DB::table('infrastructures')
            ->select('infrastructures.id', 'schools.name as school', 'schools.bp as bp', 'infrastructures.D4 as answer', 'infrastructures.explanation_D4 as description')
            ->where('infrastructures.school_bp', '=', 'SMA')
            ->join('schools', 'schools.id', '=', 'infrastructures.school_id');
        return $data;
    }
}
