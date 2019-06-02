@extends('admin.layouts.dashboard')
@section('page_heading','Listar Eventos')
@section('section')

<table class="table">
    <thead>
        <th>#</th>
        <th>Titulo</th>
        <th>Dias</th>
        <th>Horarios</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach ($eventos as $evento)
            <tr>
                <td>{{ $evento->id_evento }}</td>
                <td><a href="{{route('admin.evento.show', $evento->id_evento)}}">{{ $evento->nm_titulo }}</a></td>
                <td>{{ $evento->dt_inicio != $evento->dt_fim ? date('d/m/Y', strtotime($evento->dt_inicio))." até ".date('d/m/Y', strtotime($evento->dt_fim)) : date('d/m/Y', strtotime($evento->dt_inicio)) }}</td>
                <td>{{ $evento->hr_inicio. " até ". $evento->hr_fim }}</td>
                <td style="width: 10%">
                    <div class="btn-group">
                        <form action="{{route('admin.evento.destroy', $evento->id_evento)}}" method="post">
                            @csrf
                            @method('DELETE')
                                <div class="btn-group">
                                <a href="{{ route('admin.evento.edit', $evento->id_evento) }}" class="btn btn-primary fa fa-edit" data-toggle="tooltip" title="Excluir"></a>
                                <button class="btn btn-danger fa fa-trash" data-toggle="tooltip" title="Excluir"></button>
                            </div>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@stop
