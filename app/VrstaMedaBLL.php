<?php

namespace App;

class VrstaMedaBLL {
    public function validirajNaziv($naziv) {
        $vrste = VrstaMeda::all();
        $nazivi = $vrste->pluck("naziv")->toArray();
        return array_search($naziv, $nazivi);
    }
}