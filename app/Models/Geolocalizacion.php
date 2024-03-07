<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geolocalizacion extends Model
{
    use HasFactory;

    protected $table  = 'geolocalizacions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'entrada',
        'latitud',
        'longitud',
    ];
}
