<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'warisan_id',
        'nama_lokasi',
        'slug',
        'kelurahan_id',
        'kecamatan_id',
        'kabkot_id',
        'provinsi_id',
    ];

    public function wbtb()
    {
        return $this->belongsTo(Wbtb::class);
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    public function kabkot()
    {
        return $this->belongsTo(Kabkot::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
