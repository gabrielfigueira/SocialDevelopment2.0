<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<?php if ( isset( $mensagem ) ) : ?>
    <div class="alert alert-danger"><?php echo $mensagem ?></div>
<?php endif; ?>
<div class="form">
          <br>
          <h1>Login</h1>
<form action="<?php echo HOME_URL . 'user/logar' ?>" method="post">
     <div class="email-field">
                  <label>Email <small>obrigatório</small>
                      <input type="email" required placeholder="Email.." name="email">
                  </label>                  
              </div>
              <div class="name-field">                  
                  <input type="password" placeholder="Senha.." name="password" required>  
              </div>
              <button type="submit" class="button column row">Entrar</button>
              <small><a style="color: black;" href="<?php echo HOME_URL . 'user/novo_usuario' ?>">Cadastrar usuário</a></small>
</form>
</div>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>