<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal',
        'jam',
        'rating',
        'id_properti',
        'id_user',
        'status'
    ];
    protected $primaryKey = "id_order";
    public function properties(): HasMany
    {
        return $this->hasMany(property::class, 'id_properti', 'id_properti');
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'id_user', 'id_user');
    }
}
