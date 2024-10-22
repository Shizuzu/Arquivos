@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <h1>Meus Eventos</h1>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if(count($events) > 0)
        <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Participantes</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td scropt="row">{{ $loop->index + 1 }}</td>
                        <td><a href="/events/{{ $events->id }}">{{ $event-> title }}</a></td>
                        <td></td>
                        <td><a href="#">Editar</a> <a href="#">Deletar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>Você ainda não tem eventos, <a href="events/create"></a>Criar Evento</p>
        @endif
    </div>
@endsection