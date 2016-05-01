<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>
 <div class="form">
 <h3>Cadastrar</h3>
 
<form action="<?php echo HOME_URL . 'user/cadastrar' ?>" class="form-horizontal" method="post">
<div class="input-wrapper">
  <label>Email
      <input type="email" placeholder="email@email.com" required name="email">
  </label>
</div>
<div class="input-wrapper">
  <label>Nome
      <input type="text" placeholder="Nome" required name="name">
  </label>
</div>
  <div class="password-field">
    <label>Senha
        <input type="password" id="password" name="password">
    </label>    
  </div> 
  <button type="submit" class="button column row">Cadastrar</button>
   <small><a style="color: black;" href="<?php echo HOME_URL . 'user' ?>">Voltar</a></small>
</form>

 <?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>