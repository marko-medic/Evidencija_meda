@extends("layouts.app")

@section("content")
    <h1>Evidencija meda</h1>
    <div class="form-group">
        {!! Form::open(["action" => "MedController@filter", "method" => "GET"]) !!}
        {{Form::label("q", "Pretraga po nazivu")}}
        {{Form::text("q", "", ["class" => "form-control", "placeholder" => "Naziv meda"])}}
        {{Form::submit("Pretraga", ["class" => "btn btn-info my-2"])}}
        {!! Form::close() !!}
    </div>
    @if (count($listaMeda) > 0)
        <p>Lista evidentiranog meda</p>
        <ul class="list-group">
        @foreach($listaMeda as $med)
            <li class="list-group-item"><a href="/med/{{$med->id}}">{{$med->naziv}}</a></li>
        @endforeach
            <p class="mt-2">{{$listaMeda->links()}}</p>
        </ul>

    @else
        <h3>Trenutno nemamo ni jedan med u evidenciji</h3>
    @endif
    <img src="{{asset("images/med.jpg")}}" alt="med">
@endsection