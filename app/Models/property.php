<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;
    protected function gambar():Attribute{
        return Attribute::make(
            get: fn ($gambar)=>asset('/storage/properties/images/'.$gambar)
        );
    }

    protected $fillable = [
        'nama_properti',
        'kapasitas',
        'jenis_properti',
        'deskripsi',
        'rating',
        'gambar',
        'status',
        'id_user',
        'id_kota',
        'harga'
    ];

    protected $primaryKey = "id_properti";

    public function order(){
        return $this->belongsTo(Order::class, 'id_properti', 'id_properti');
    }
}
