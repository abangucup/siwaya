<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kelurahan',
        'slug'
    ];

    public function lokasis()
    {
        return $this->hasMany(Lokasi::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
