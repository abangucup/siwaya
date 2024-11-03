<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'foto',
        'nomor_telepon',
        'whatsapp',
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
