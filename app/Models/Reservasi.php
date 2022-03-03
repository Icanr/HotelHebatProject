<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = 'reservasi';
    protected $guarded = ['id'];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search']?? false, function ($query, $search) {
            return $query->where('nama_tamu', 'like', "%$search%");
        });

        $query->when($filters['check_in']?? false, function ($query, $check_in) {
            return $query->whereDate('check_in', $check_in);
        });
    }
}

