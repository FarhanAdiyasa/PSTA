<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
class mspengguna extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'sidangta_mspengguna';
    protected $primaryKey = 'png_username';
    public $timestamps = false;

    protected $fillable = [
        'png_username',
        'png_password',
        'png_role',
    ];
    protected $hidden = [
        'png_password'
    ];
    protected $casts = [
        'png_username' => 'string',
    ];
    public function getAuthPassword()
    {
        return $this->png_password;
    }
    const DAAA = 'DAAA';
    const Penguji = 'Penguji';
    const Pembimbing = 'Pembimbing';
    const Koordinator_TA = 'Koordinator TA';
    const Mahasiswa = 'Mahasiswa';
    const Kepala_Prodi = 'Kepala Prodi';
    public static function getValidRoles()
    {
        return [
            self::DAAA,
            self::Penguji,
            self::Pembimbing,
            self::Koordinator_TA,
            self::Mahasiswa,
            self::Kepala_Prodi,
        ];
    }


}
