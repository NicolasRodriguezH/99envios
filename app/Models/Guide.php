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

    public function origin() {
        return $this->hasOne(Origin::class);
    }

    public function destiny() {
        return $this->hasOne(Destiny::class);
    }

    // Relation one at many (reverse)
    public function user() {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
