@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

    <div id="searcj-container" class="col-md-12">
        <h1> Busque um evento </h1>
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>Próximos Eventos</h2>
        <p>Veja os eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach ($events as $event)
                <div class="card col-md-3">
                    <img src="/img/event.jpg" alt="{{ $event->title }}">
                    <div class="card-body">
                        <p class="cadt-date">10/30/2024</p>
                        <h5 class="card-title">{{ $event->title }} </h5>
                        <p class="card-partipants"> X Participantes</p>
                        <a href="#" class="btn btn-primary"> Saber mais</a>
                    </div>
                </div>
            @endforeach
        @endsection
