<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Cadastre um assunto</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="fa fa-times"></span>
            </button>
        </div>
        <div class="modal-body">
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                        <label for="assuntoInput">Assunto: </label>
                        <input type="text" name="assunto" id="assuntoInput" class="form-control" placeholder="Digite um assunto...">
                      </div>
                      <div class="form-group">
                        <label for="carreiraAssunto">Carreira: </label>
                        <select name="carreiraAssunto" id="carreiraAssunto" class="form-control">
                            <option value="">Digite uma carreira...</option>
                            @foreach ($carreiras as $carreira)
                                <option value="{{$carreira->id_carreira}}">{{$carreira->nm_carreira}}</option>
                            @endforeach
                        </select>
                      </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" id="btnSalvaSugestaoAssunto" class="btn btn-mentoring" data-dismiss="modal">Salvar</button>
        </div>
        </div>
    </div>
</div>
