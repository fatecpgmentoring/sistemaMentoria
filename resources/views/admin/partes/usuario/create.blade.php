<form action="{{route('admin.profissao.store')}}" method="POST">
    @csrf
    <div class="form-group">
        <label class="label-control" for="profissao">Descrição:</label>
        <input type="text" class="form-control" name="profissao" id="profissao">
    </div>
</form>