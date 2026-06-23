<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bengkel extends Model
{
    protected $table = 'bengkels';
    protected $fillable = ['namabengkel', 'alamat', 'deskripsi', 'tipeID'];

    public function tipeLayanan()
    {
        return $this->belongsTo(TipeLayanan::class, 'tipeID');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'bengkelID');
    }

    public function promos()
    {
        return $this->hasMany(Promo::class, 'bengkelID');
    }

}
