<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kamar;

class TipeKamar extends Model
{
    use HasFactory;
    protected $table = 'tipe_kamar';
    protected $fillable = ['tipe_kamar','jumlah_kamar','fasilitas'];
}
