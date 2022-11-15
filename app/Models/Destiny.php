<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destiny extends Model
{
    protected $guarded = ['id', 'timestamps'];

    /* Relation one to many inverse */
    public function origin() {
        return $this->belongsTo(Origin::class);
    }

    public function guide() {
        return $this->belongsTo(Guide::class);
    }

    use HasFactory;
}
