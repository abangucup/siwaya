<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wbtb extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nomor_wbtb',
        'nama_wbtb',
        'slug',
        'status',
        'kategori_id',
        'kondisi_id',
        'deskripsi_wbtb',
    ];
    
    public function verifikasi()
    {
        return $this->hasOne(VerifikasiWbtb::class);
    }

    public function penetapan()
    {
        return $this->hasOne(PenetapanWbtb::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lokasis()
    {
        return $this->hasMany(Lokasi::class);
    }

    public function galeries()
    {
        return $this->hasMany(Galeri::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
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
