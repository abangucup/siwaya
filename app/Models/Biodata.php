<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'nama_legkap',
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
