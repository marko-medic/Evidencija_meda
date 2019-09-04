<?php

namespace App\Http\Controllers;

use App\VrstaMeda;
use Illuminate\Http\Request;
use App\Med;
use Illuminate\Support\Facades\Redirect;

class MedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMeda = Med::orderBy("id", "desc")->paginate(5);
        return view("med.index")->with("listaMeda", $listaMeda);
    }

    public function filter() {
        $filter = $_GET["q"];
        if (empty($filter)) {
            return redirect("/");
        }
        $listaMeda = Med::where('naziv', $filter)->orWhere('naziv', 'like', '%' . $filter . '%')->paginate(5);
        return view("med.index")->with("listaMeda", $listaMeda);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vrsteMeda = VrstaMeda::all();
        return view("med.create")->with("vrsteMeda", $vrsteMeda);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "naziv" => "required",
            "vrsta_meda_id" => "required",
            "kolicina" => "required",
            "boja" => "required"
        ]);

        $med = new Med();
        $med->naziv = $request->input("naziv");
        $med->kolicina = $request->input("kolicina");
        $med->boja = $request->input("boja");
        $med->opis = $request->input("opis");
        $med->vrsta_meda_id = $request->input("vrsta_meda_id");
        $med->save();
       return redirect("/med");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $med = Med::find($id);
        return view("med.show")->with("med", $med);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ["med" => Med::find($id), "vrsteMeda" => VrstaMeda::all()];
        return view("med.edit")->with("data", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "naziv" => "required",
            "vrsta_meda_id" => "required",
            "kolicina" => "required",
            "boja" => "required",
        ]);

        $med = Med::find($id);
        $med->naziv = $request->input("naziv");
        $med->kolicina = $request->input("kolicina");
        $med->boja = $request->input("boja");
        $med->opis = $request->input("opis");
        $med->vrsta_meda_id = $request->input("vrsta_meda_id");
        $med->save();
        return redirect("/med");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $med = Med::find($id);
        $med->delete();
        return redirect("/med");
    }
}
