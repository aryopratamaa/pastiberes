<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipeLayanan extends Model
{
    protected $table = "tipe_layanans";
    protected $fillable = ['tipe', 'deskripsi'];

    public function bengkels()
    {
        return $this->hasMany(Bengkel::class, 'id');
    }
    
}
