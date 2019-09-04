<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Med extends Model
{
    public $table = "Med";
    public $timestamps = false;

    public function vrstaMeda() {
        return $this->belongsTo(VrstaMeda::class);
    }
}
