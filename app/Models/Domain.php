<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Domain extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_domain',
        'slug'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
