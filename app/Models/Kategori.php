<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kategori',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function wbtbs()
    {
        return $this->belongsToMany(Wbtb::class, 'kategori_wbtb', 'kategori_id', 'wbtb_id');
    }
}
