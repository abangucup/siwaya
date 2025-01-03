<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'wbtb_id',
        'hash_name',
        'url_image',
        'full_url_image',
        'original_name',
        'description_image',
    ];

    public function wbtb()
    {
        return $this->belongsTo(Wbtb::class);
    }
}
