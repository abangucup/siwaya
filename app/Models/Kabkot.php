<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabkot extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kabkot',
        'slug'
    ];

    public function instansis()
    {
        return $this->hasMany(Instansi::class);
    }

    public function wbtbs()
    {
        return $this->belongsToMany(Wbtb::class, 'sebarans', 'kabkot_id', 'wbtb_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
