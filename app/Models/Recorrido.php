<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Recorrido extends Model
{
    use HasFactory;

    protected $table  = 'recorridos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_id',
        'operatividad',
        'fecha_reporte',
        'area',
        'total_personal',
        'observaciones',
        'responsable',
        'img1',
        'img2',
        'img3',
        'img4',
        'img5',
        'img6',
    ];

    /**
     * Get the get_items that owns the Subitem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function get_items(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'item_id');
    }

}
