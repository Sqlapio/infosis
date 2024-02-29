<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subitem extends Model
{
    use HasFactory;

    protected $table  = 'subitems';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'item_id',
        'descripcion',
        'porcentaje',
        'responsable'
    ];

    /**
     * Get the get_items that owns the Subitem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function get_items(): HasOne
    {
        return $this->hasOne(Item::class, 'id', 'item_id');
    }

}
