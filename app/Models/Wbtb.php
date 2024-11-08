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
        'tanggal_penetapan_wbtb',
        'tanggal_verifikasi_wbtb',
        'kategori_id',
        'domain_id',
        'kondisi_id',
        'deskripsi_wbtb',
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
