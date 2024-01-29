<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class msmahasiswa extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    protected $table = 'sidangta_msmahasiswa';
    protected $primaryKey = 'mhs_username';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['mhs_username', 'mhs_password', 'mhs_nama'];
    public function trSidang()
    {
        return $this->hasMany(TrPendaftaranSidangTa::class);
    }

    protected $hidden = [
        'mhs_password',
    ];
    protected $casts = [
        'mhs_username' => 'string',
    ];

    public function getAuthPassword()
    {
        return $this->mhs_password;
    }
}
