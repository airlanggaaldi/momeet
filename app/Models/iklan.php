<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class iklan extends Model
{
    use HasFactory;

    protected function poster():Attribute{
        return Attribute::make(
            get: fn ($poster)=>asset('/storage/ads/images/'.$poster)
        );
    }

    protected $fillable = [
        'poster',
        'id_properti',
        'status'
    ];

    protected $primaryKey = "id_iklan";
}
