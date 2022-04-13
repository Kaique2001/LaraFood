@extends('adminlte::page')

@section('title', 'Perfis')

@section('content_header')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.index') }}">Dashboard</a>
        </li>

        <li class="breadcrumb-item active">
            <a href="{{ route('profiles.index') }}">Perfis</a>
        </li>
    </ol>

    <h1>Perfis <a href="{{ route('profiles.create') }}" class="btn btn-dark" method="POST" style="margin-left: 10px">Novo Plano</a> </h1>

@stop

@section('content')
    <p>Listagem dos Planos</p>
    <div class="card">
        <div class="card-header">
            <form action="{{ route('plans.search') }}" method="POST" class="form form-inline">
                @csrf
                <div class="form-group">
                <input type="text" name="filter" placeholder="Procurar" class="form-control" value="{{ $filters['filter'] ??  ''}}">
                <button type="submit" class="btn btn-dark">Filtrar</button>
                </div>
            </form>
        </div>

        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                  
                        <th style="width:228px; text-align: center;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($profiles as $profile)
                        <tr>
                            <td>
                                {{ $profile->name }}
                            </td>
                           
                            <td>
                                <a href="{{ route('profiles.show', $profile->url) }}" class="btn btn-warning">Ver</a>

                                <a href="{{ route('details.profile.index', $profile->url) }}" class="btn btn-primary">Detalhes</a>

                                <a href="{{ route('profiles.edit', $profile->url) }}" class="btn btn-info">Editar</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            @if(isset($filters))
                {!! $profiles->appends($filters)->links() !!}
            @else
                {!! $profiles->links() !!}
            @endif
        </div>
    </div>
@stop