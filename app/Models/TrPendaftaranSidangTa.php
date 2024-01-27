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
