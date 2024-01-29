<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dtlnilaikategori extends Model
{
    use HasFactory;
    protected $table = 'sidangta_dtlnilaikategori';
    protected $primaryKey = 'dnk_id';
    public $incrementing = false;
    protected $fillable = ['dnk_nilai', 'mkp_id', 'mkp_nama', 'pdft_id', 'png_username'];
}
