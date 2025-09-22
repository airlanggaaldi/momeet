<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_properti'
    ];

    protected $primaryKey = "id_bookmark";
}
