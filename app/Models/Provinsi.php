<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_provinsi',
        'slug'
    ];

    public function instansis()
    {
        return $this->hasMany(Instansi::class);
    }

    public function lokasis()
    {
        return $this->hasMany(Lokasi::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}


