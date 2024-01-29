<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class mspebimbingpenguji extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'sidangta_mspembimbingpenguji';
    protected $primaryKey = 'pbn_id';
    public $timestamps = false;

    protected $fillable = [
        'pbn_id',
        'pbn_jenis',
        'pbn_nama',
        'pbn_jabatan',
        'pbn_email',
        'png_username',
        'pbn_status'

    ];
    public function pdft()
    {
        return $this->hasMany(TrPendaftaranSidangTa::class, 'png_username', 'pdft_pembimbing1');
    }
    public function pdft2()
    {
        return $this->hasMany(TrPendaftaranSidangTa::class, 'png_username', 'pdft_pembimbing2');
    }
    public function pdft3()
    {
        return $this->hasMany(TrPendaftaranSidangTa::class, 'png_username', 'pdft_penguji1');
    }
    public function pdft4()
    {
        return $this->hasMany(TrPendaftaranSidangTa::class, 'png_username', 'pdft_penguji2');
    }
    public function pdft5()
    {
        return $this->hasMany(TrPendaftaranSidangTa::class, 'png_username', 'pdft_penguji3');
    }
   

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'pbn_id' => 'string',
        'pbn_jenis' => 'string'
    ];

    /**
     * Define enum for png_role attribute.
     */
    const Akademik = 'Akademik';
    const Industri = 'Industri';
   
    /**
     * Get the valid roles.
     *
     * @return array<string>
     */
    public static function getValidRoles()
    {
        return [
            self::Akademik,
            self::Industri,
          
        ];
    }
}
