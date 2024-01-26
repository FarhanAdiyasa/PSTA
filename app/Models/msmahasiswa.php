<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class msmahasiswa extends Model
{
    use HasFactory;
    protected $table = 'sidangta_msmahasiswa';
    protected $primaryKey = 'mhs_username';
    public $incrementing = false;
    protected $fillable = ['mhs_username', 'mhs_password', 'mhs_nama'];
}
