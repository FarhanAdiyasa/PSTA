<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrPendaftaranSidangTa extends Model
{
    use HasFactory;

    protected $table = 'sidangta_trpendaftaransidangta';
    protected $primaryKey = 'pdft_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $with = ['mahasiswa', 'pbg', 'thn', 'pbg', 'pbg2', 'pnj', 'pnj2', 'pnj3'];
    public function mahasiswa()
    {
        return $this->belongsTo(msmahasiswa::class, 'mhs_username', 'mhs_username');
    }
    public function pbg()
    {
        return $this->belongsTo(mspebimbingpenguji::class, 'pdft_pembimbing1', 'png_username');
    }
    public function pbg2()
    {
        return $this->belongsTo(mspebimbingpenguji::class, 'pdft_pembimbing2', 'png_username');
    }
    public function pnj()
    {
        return $this->belongsTo(mspebimbingpenguji::class, 'pdft_penguji1', 'png_username');
    }
    public function pnj2()
    {
        return $this->belongsTo(mspebimbingpenguji::class, 'pdft_penguji2', 'png_username');
    }
    public function pnj3()
    {
        return $this->belongsTo(mspebimbingpenguji::class, 'pdft_penguji3', 'png_username');
    }
    public function thn()
    {
        return $this->belongsTo(mstahunajaran::class, 'thn_id', 'thn_id');
    }

    protected $fillable = [
        'pdft_id',
        'pdft_bapsuratketerangan',
        'pdft_bapprasidang',
        'pdft_bapbimbingan',
        'pdft_baplembarpersetujuan',
        'pdft_statusverifikasidokumen',
        'pdft_perusahaan',
        'pdft_tanggalmulai',
        'pdft_judultugasakhir',
        'pdft_tanggaldibuat',
        'pdft_hrd',
        'pdft_tanggalsidang',
        'pdft_jenissidang',
        'pdft_tempatsidang1',
        'pdft_tempatsidang2',
        'pdft_waktu',
        'pdft_link',
        'pdft_statusverifikasidata',
        'pdft_totalnilai',
        'pdft_catatan',
        'pdf_statuskelulusan',
        'mhs_username',
        'thn_id',
        'pdft_penguji1',
        'pdft_penguji2',
        'pdft_penguji3',
        'pdft_pembimbing1',
        'pdft_pembimbing2',
    ];

    protected $casts = [
        'pdft_id' =>'string',
        'pdft_bapsuratketerangan' =>'string',
        'pdft_tanggalmulai' => 'date',
        'pdft_tanggalidbuat' => 'date',
        'pdft_tanggalsidang' => 'datetime'
    ];
}
