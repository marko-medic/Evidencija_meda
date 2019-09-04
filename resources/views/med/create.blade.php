@extends("layouts.app")

@section("content")
    <h1>Unos novog meda</h1>
    {!! Form::open(["action" => "MedController@store", "method" => "POST"]) !!}
        <div class="form-group">
            {{Form::label("naziv", "Naziv")}}
            {{Form::text("naziv", "", ["class" => "form-control", "placeholder" => "Naziv meda"])}}
            {{Form::label("vrsta_meda_id", "Vrsta meda")}}
            <select name="vrsta_meda_id" class="form-control">
                @foreach($vrsteMeda as $vrsta)
                    <option value="{{$vrsta->id}}">{{$vrsta->naziv}}</option>
                @endforeach
            </select>
            {{Form::label("kolicina", "Kolicina")}}
            {{Form::text("kolicina", "", ["class" => "form-control", "placeholder" => "Kolcina meda (g)"])}}
            {{Form::label("boja", "Boja")}}
            {{Form::text("boja", "", ["class" => "form-control", "placeholder" => "Boja meda"])}}
            {{Form::label("opis", "Opis")}}
            {{Form::textarea("opis", "", ["class" => "form-control", "placeholder" => "Opis meda", "rows" => 3])}}
            {{Form::submit("Potvrdi", ["class" => "btn btn-primary mt-2"])}}
        </div>
    {!! Form::close() !!}

@endsection