<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class mspengguna extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'sidangta_mspengguna';
    protected $primaryKey = 'png_username';

    protected $fillable = [
        'png_username',
        'png_password',
        'png_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'png_password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'png_username' => 'string',
        
    ];

    /**
     * Define enum for png_role attribute.
     */
    const DAAA = 'DAAA';
    const Penguji = 'Penguji';
    const Pembimbing = 'Pembimbing';
    const Koordinator_TA = 'Koordinator TA';
    const Mahasiswa = 'Mahasiswa';
    const Kepala_Prodi = 'Kepala Prodi';

    /**
     * Get the valid roles.
     *
     * @return array<string>
     */
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
