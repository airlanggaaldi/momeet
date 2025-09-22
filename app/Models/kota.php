<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kota extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kota'
    ];

    protected $primaryKey = "id_kota";

}
