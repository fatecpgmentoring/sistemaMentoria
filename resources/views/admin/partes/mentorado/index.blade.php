@extends('admin.layouts.dashboard')
@section('page_heading','Listar Mentorados')
@section('section')

<table class="table">
    <thead>
        <th>#</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Criado em</th>
        <th>Qnt. Assuntos</th>
        <th>Qnt. Conexões</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach ($mentorados as $mentorado)
            <tr><td>{{$mentorado->id_mentorado}}</td>
            <td><a href="{{route('admin.mentorado.show', $mentorado->id_mentorado)}}">{{$mentorado->nm_mentorado}}</a></td>
            <td>{{$mentorado->usuario->email}}</td>
            <td>{{date('d/m/Y H:i:s', strtotime($mentorado->created_at))}}</td>
            <td>{{$mentorado->usuario->assuntos->count()}}</td>
            <td>{{$mentorado->conexoes->count()}}</td>
            <td>
                <div class="btn-group">
                    <form action="{{route('admin.mentorado.destroy', $mentorado->id_mentorado)}}" method="post">
                        @csrf
                        @method('DELETE')
                            <div class="btn-group">
                            <a href="{{ route('admin.mentorado.edit', $mentorado->id_mentorado) }}" class="btn btn-primary fa fa-edit"></a>
                            <button class="btn btn-danger fa fa-trash"></button>
                        </div>
                    </form>
                </div>
            </td></tr>
        @endforeach
    </tbody>
</table>

@include('admin.includes.scripts')

@stop
