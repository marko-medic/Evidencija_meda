@extends("layouts.app")

@section("content")
    <h1>Unos nove vrste meda</h1>
    {!! Form::open(["action" => "VrsteMedaController@store", "method" => "POST"]) !!}
    <div class="form-group">
        {{Form::label("naziv", "Vrsta meda")}}
        {{Form::text("naziv", "", ["class" => "form-control", "placeholder" => "Vrsta meda"])}}
        {{Form::submit("Unesi", ["class" => "btn btn-primary mt-2"])}}
    </div>
    {!! Form::close() !!}
@endsection