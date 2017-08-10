@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <h1>Vizualizari total : {{$views}} vizualizari</h1>
    <h1>Comenzi total : {{$countCommands}} comenzi</h1>
    <hr>
    @if(!empty($commands) && count($commands)>0)
        @foreach($commands as $command)
            <div>
                <h4><b>Comanda Burlacul Tv nr. {{$command->id}}</b></h4>
                <p><b>Informatii Comandator</b></p>
                <p><b>Nume :</b> {{$command->name}}</p>
                <p><b>Email :</b> {{$command->email}}</p>
                <p><b>Telefon :</b> {{$command->telephone}}</p>
                <p><b>Informatii Produs</b></p>
                <p><b>Denumire :</b> {{$command->product->title}}</p>
                <p><b>Pret :</b> {{$command->product->price}} Lei , {{$command->honoroc->price}} Lei Honoroc</p>
                <p><b>Pret Total :</b> {{($command->product->price + $command->honoroc->price) * $command->quantity}} Lei ({{$command->quantity}} bucati)</p>
                <p><b>Sex :</b> {{$command->sex == 1 ? "Masculin" : "Feminin"}}</p>
                <p><b>Marime :</b> {{$command->size->size}}</p>
                <p><b>Culoare :</b> {{$command->color ==1 ? "Alb" : "Negru"}}</p>
                <p><b>Honoroc :</b> {{$command->honoroc->title}}</p>
                <p><b>Cantitate :</b> {{$command->quantity}} bucati</p>
                <p>Link <a href="{{route('frontend.item',$command->product_id)}}" target="_blank">Apasa pentru a vedea produsul online</a></p>
            </div>
            <hr>
            <div class="clearfix"></div>
        @endforeach
        {{$commands->links()}}
    @endif
@endsection