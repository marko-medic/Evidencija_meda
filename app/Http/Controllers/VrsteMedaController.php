<?php

namespace App\Http\Controllers;

use App\VrstaMeda;
use App\VrstaMedaBLL;
use Illuminate\Http\Request;

class VrsteMedaController extends Controller
{

    public function create() {
     return view("vrstaMeda.create");
    }

    public function store(Request $request){
        $this->validate($request, [
            "naziv" => "required",
        ]);
        $vrstaMedaBLL = new VrstaMedaBLL();
        $jelNazivPostoji = $vrstaMedaBLL->validirajNaziv($request->input("naziv"));
        $vrstaMeda = new VrstaMeda();
        $vrstaMeda->naziv = $request->input("naziv");
        if (!$jelNazivPostoji) {
            $vrstaMeda->save();
        } else {
            header("Refresh:2; url=/vrsteMeda/create");
            die ("Ovaj naziv vec postoji, pokusajte sa drugim nazivom");
        }
        return redirect("/med");
    }
}
