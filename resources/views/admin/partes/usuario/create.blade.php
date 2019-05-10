@extends('admin.layouts.dashboard')
@section('page_heading','Cadastrar Usuario')
@section('section')

<form action="{{route('admin.usuario.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <label class="label-control" for="email">E-mail:</label>
            <input type="email" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
            <label class="label-control" for="carreira">Senha:</label>
            <input type="password" class="form-control" name="senha" id="senha">
        </div>
        <div class="form-group">
            <label class="label-control" for="carreira">Confirmação de Senha:</label>
            <input type="password" class="form-control" name="senha_confirmation" id="senha_confirmation">
        </div>
        <div class="form-group">
            <label class="label-control" for="role">Permissão:</label>
            <select class="form-control" name="role" id="role">
                <option value="0">Selecione...</option>
                <option value="1">Mentorado</option>
                <option value="2">Mentor</option>
                <option value="3">Administrador</option>
                <option value="4">Desenvolvedor</option>
            </select>
        </div>
        <div class="form-group">
                <label class="label-control" for="vinculo">Vinculo:</label>
                <select class="form-control" name="vinculo" id="vinculo">
                    <option value="0">Selecione...</option>
                    @foreach ($mentores as $mentor)
                        <option value="{{$mentor->id_mentor.' - Mentor'}}">{{$mentor->nm_mentor}}</option>
                    @endforeach
                    @foreach ($mentorados as $mentorado)
                        <option value="{{$mentorado->id_mentorado.' - Mentorado'}}">{{$mentorado->nm_mentorado}}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            <button class="btn btn-success" type="submit">Cadastrar</button>
        </div>
    </form>
    @include('admin.includes.scripts')

@stop
