<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class band extends Model
{
    use HasFactory;
    protected $fillable = [
        'band_id',
        'nama_band' ,
        'genre',
        'foto_band',
        'sample_video',
        'no_whatsapp',
        'link',
        'deskripsi_band',
    ];
    protected $table = 'band';
}
