@extends("layouts.app")

@section("content")
<h1>Informacije o medu:</h1>
    <ul class="list-group">
        <li class="list-group-item">
            Naziv: <strong>{{$med->naziv}}</strong>
        </li>
        <li class="list-group-item">
            Vrsta: <strong>{{$med->vrstaMeda->naziv}}</strong>
        </li>
        <li class="list-group-item">
            Kolicina: <strong>{{$med->kolicina}}</strong>
        </li>
        <li class="list-group-item">
            Boja: <strong>{{$med->boja}}</strong>
        </li>
        <li class="list-group-item">
            Opis: <strong>{{$med->opis}}</strong>
        </li>
    </ul>

<a class="btn btn-warning my-2" href="/med/{{$med->id}}}/edit">Izmeni med</a>
    {!!Form::open(["action" => ["MedController@destroy", $med->id], "method" => "post", "class" => "pull-right"])!!}
        {{Form::hidden("_method", "DELETE")}}
        {{Form::submit("Obrisi med", ["class" => "btn btn-danger"])}}
    {!!Form::close()!!}

@endsection;