@extends('admin.layouts.dashboard')
@section('page_heading','Listar Usuarios')
@section('section')

<table class="table">
        <thead>
            <th>#</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Permissão</th>
            <th>Vinculo</th>
            <th>Criado em</th>
            <th>Ações</th>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr><td>{{$usuario->id_usuario}}</td>
                <td>@if($usuario->cd_role == 1)
                        {{$usuario->nm_mentorado}}
                    @elseif($usuario->cd_role == 2)
                        {{$usuario->nm_mentor}}
                    @elseif($usuario->cd_role == 3)
                        Administrador
                    @else
                        Desevolvedor
                    @endif</td>
                <td><a href="{{route('admin.usuario.show', $usuario->id_usuario)}}">{{$usuario->email}}</a></td>
                <td>{{$usuario->cd_role == 1 ? 'Mentorado' : $usuario->cd_role == 2 ? 'Mentor' : $usuario->cd_role == 3 ? 'Administrador' : 'Desevolvedor'}}</td>
                <td>{{$usuario->nm_mentorado != null ? 'Mentorado' : $usuario->nm_mentor != null ? 'Mentor' : $usuario->cd_role == 3 ? 'Administrador': 'Desevolvedor'}}</td>
                <td>{{date('d/m/Y H:i:s', strtotime($usuario->created_at))}}</td>
                <td>
                    <div class="btn-group">
                            <form action="{{route('admin.usuario.destroy', $usuario->id_usuario)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                        <div class="btn-group">
                                        <a href="{{ route('admin.usuario.status', $usuario->id_usuario) }}" class="btn {{$usuario->cd_status ? 'btn-warning fa fa-times' : 'btn-success fa fa-check'}}"></a>
                                        <a href="{{ route('admin.usuario.edit', $usuario->id_usuario) }}" class="btn btn-primary fa fa-edit"></a>
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
