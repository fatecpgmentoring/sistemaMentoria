@extends('admin.layouts.dashboard')
@section('page_heading','Listar Mentores')
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
        @foreach ($mentores as $mentor)
            <tr><td>{{$mentor->id_mentor}}</td>
            <td><a href="{{route('admin.mentor.show', $mentor->id_mentor)}}">{{$mentor->nm_mentor}}</a></td>
            <td>{{$mentor->usuario->email}}</td>
            <td>{{date('d/m/Y H:i:s', strtotime($mentor->created_at))}}</td>
            <td>{{$mentor->usuario->assuntos->count()}}</td>
            <td>{{$mentor->conexoes->count()}}</td>
            <td>
                <div class="btn-group">
                    <form action="{{route('admin.mentor.destroy', $mentor->id_mentor)}}" method="post">
                        @csrf
                        @method('DELETE')
                            <div class="btn-group">
                            <a href="{{ route('admin.mentor.edit', $mentor->id_mentor) }}" class="btn btn-primary fa fa-edit"></a>
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
