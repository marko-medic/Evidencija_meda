<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class VrstaMeda extends Model
{
    public $table = "VrstaMeda";
    public $timestamps = false;

    public function med() {
        return $this->hasMany(Med::class);
    }
}
