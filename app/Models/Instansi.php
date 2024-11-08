<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_instansi',
        'slug',
        'kabkot_id',
        'provinsi_id'
    ];

    public function kabkot()
    {
        return $this->belongsTo(Kabkot::class);
    }


    public function getRouteKeyName()
    {
        return 'slug';
    }
}
