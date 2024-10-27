<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warisan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nomor_warisan',
        'nama_warisan',
        'slug',
        'status',
        'tanggal_penetapan_warisan',
        'tanggal_verifikasi_warisan',
        'kategori_id',
        'domain_id',
        'kondisi_id',
        'deskripsi_warisan',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lokasis()
    {
        return $this->hasMany(Lokasi::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function domain()
    {
        return $this->belongsTo(Domain::class);
    }

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
