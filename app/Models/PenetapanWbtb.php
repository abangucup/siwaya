<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenetapanWbtb extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'wbtb_id',
        'user_id',
        'tanggal_penetapan',
        'keterangan',
        'status_verifikasi',
    ];

    public function wbtb()
    {
        return $this->belongsTo(Wbtb::class);
    }   

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
