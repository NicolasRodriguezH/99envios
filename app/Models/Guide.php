<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    protected $guarded = ['id', 'timestamps'];

    /* Relacion uno a muchos (inversa) */
    public function status() {
        return $this->belongsTo(StatusGuide::class);
    }

    use HasFactory;
}
