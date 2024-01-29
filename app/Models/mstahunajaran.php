<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mstahunajaran extends Model
{
    use HasFactory;
    protected $table = 'sidangta_mstahunajaran';
    protected $primaryKey = 'thn_id';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['thn_id', 'thn_tahunajaran', 'thn_status'];
}
