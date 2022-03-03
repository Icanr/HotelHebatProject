<?php

namespace App\Models;

use App\Models\FasilitasKamar;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FasilitasHotel extends Model
{
    use HasFactory;
    protected $table = 'fasilitas';
    protected $fillable = ['nama_fasilitas','keterangan','image'];
}
