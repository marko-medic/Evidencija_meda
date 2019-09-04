@extends("layouts.app")

@section("content")
 <h1>Izmeni med</h1>
 {!! Form::open(["action" => ["MedController@update", $data["med"]->id], "method" => "POST"]) !!}
 <div class="form-group">
  {{Form::label("naziv", "Naziv")}}
  {{Form::text("naziv", $data["med"]->naziv, ["class" => "form-control", "placeholder" => "Naziv meda"])}}
  {{Form::label("vrsta_meda_id", "Vrsta meda")}}
  <select name="vrsta_meda_id" class="form-control">
   @foreach($data["vrsteMeda"] as $vrsta)
    <option value="{{$vrsta->id}}">{{$vrsta->naziv}}</option>
    @endforeach
  </select>
  {{Form::label("kolicina", "Kolicina")}}
  {{Form::text("kolicina", $data["med"]->kolicina, ["class" => "form-control", "placeholder" => "Kolcina meda (g)"])}}
  {{Form::label("boja", "Boja")}}
  {{Form::text("boja", $data["med"]->boja, ["class" => "form-control", "placeholder" => "Boja meda"])}}
  {{Form::label("opis", "Opis")}}
  {{Form::textarea("opis", $data["med"]->opis, ["class" => "form-control", "placeholder" => "Opis meda", "rows" => 3])}}
  {{Form::hidden("_method", "PUT")}}
  {{Form::submit("Potvrdi", ["class" => "btn btn-primary mt-2"])}}
 </div>
 {!! Form::close() !!}

@endsection