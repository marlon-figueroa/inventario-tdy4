<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;
    protected $guarded = [];

    /**
     * Get the categories that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clasificacion(): BelongsTo
    {
        return $this->belongsTo(CategoriaClasificacion::class, 'clasificacion_id');
    }

    /**
     * Get the categories that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function marca(): BelongsTo
    {
        return $this->belongsTo(Marca::class, 'marca_id');
    }

    /**
     * Get the categories that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function presentacion(): BelongsTo
    {
        return $this->belongsTo(Presentacion::class, 'presentacion_id');
    }

    /**
     * Get the categories that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function medida(): BelongsTo
    {
        return $this->belongsTo(Medida::class, 'medida_id');
    }

}
