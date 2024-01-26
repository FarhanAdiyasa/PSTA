<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mskategoripenilaian extends Model
{
    use HasFactory;
    protected $table = 'sidangta_mskategoripenilaian';
    protected $primaryKey = 'mkp_id';
    public $incrementing = false;
    protected $fillable = ['mkp_id', 'mkp_nama', 'mkp_bobot'];
}
