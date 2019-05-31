<div class="container" id="container-contato">
  <h2>Fale Conosco</h2>
  <form action="#" class="needs-validation" novalidate>
     <div class="form-group">
      <label for="email">Nome:</label>
      <input type="text" class="form-control" id="name" placeholder="Digite seu nome" name="name" required>
        <div class="valid-feedback">Válido</div>
        <div class="invalid-feedback">Preencha o campo.</div>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Digite seu email" name="email" required>
        <div class="valid-feedback">Válido</div>
        <div class="invalid-feedback">Preencha o campo.</div>       
    </div>
    <div>
        <label for="message-contato">Digite a mensagem aqui</label>
        <textarea rows="5" name="message" id="message-contato" required></textarea>
        <div class="valid-feedback">Válido</div>
        <div class="invalid-feedback">Preencha o campo.</div>
    </div>
    <div>
    <button type="submit" class="btn" id="btn-enviar">Enviar</button>
    </div>
  </form>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
