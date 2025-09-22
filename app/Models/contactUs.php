<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contactUs extends Model
{
    use HasFactory;

    protected $fillable = [
        'pesan',
        'id_user'
    ];
    protected $primaryKey = "id_contact";
}
