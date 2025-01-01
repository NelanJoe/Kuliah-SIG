<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kabkota extends Model
{
    //
    use HasFactory;
    protected $table = 'kabkota';
    protected $fillable = ['provinsi_id', 'nama', 'alt_name', 'latitude', 'longitude'];
    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }
}
