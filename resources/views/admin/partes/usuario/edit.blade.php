@extends('admin.layouts.dashboard')
@section('page_heading','Editar Usuario')
@section('section')

<form action="{{route('admin.usuario.edit', $usuario->id_usuario)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label class="label-control" for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" value="{{$usario->email}}" id="email">
        </div>
        <div class="form-group">
            <label class="label-control" for="role">Permissão:</label>
            <select class="form-control" name="role" id="role">
                <option value="0">Selecione...</option>
                <option value="1" {{$usario->cd_role == 1 ? 'selected' : ''}}>Mentorado</option>
                <option value="2" {{$usario->cd_role == 2 ? 'selected' : ''}}>Mentor</option>
                <option value="3" {{$usario->cd_role == 3 ? 'selected' : ''}}>Administrador</option>
                <option value="4" {{$usario->cd_role == 4 ? 'selected' : ''}}>Desenvolvedor</option>
            </select>
        </div>
        <div class="form-group">
                <label class="label-control" for="vinculo">Vinculo:</label>
                <select class="form-control" name="vinculo" id="vinculo">
                    <option value="">Selecione...</option>
                    @if($usuario->cd_role == 2)
                        @foreach ($mentores as $mentor)
                            <option value="{{$mentor->id_mentor.' - Mentor'}}" {{$mentor->id_vinculo == $mentor->id_mentor ? 'selected' : '' }}>{{$mentor->nm_mentor}}</option>
                        @endforeach
                    @elseif($usuario->cd_role == 1)
                        @foreach ($mentorados as $mentorado)
                <option value="{{$mentorado->id_mentorado.' - Mentorado'}}"{{$mentorado->id_vinculo == $mentorado->id_mentorado ? 'selected' : '' }}>{{$mentorado->nm_mentorado}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Alterar</button>
        </div>
    </form>
    @include('admin.includes.scripts')

@stop
