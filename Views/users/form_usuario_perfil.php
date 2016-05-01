<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<form action="<?php echo HOME_URL . 'user/cadastrar' ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
  <div class="formpost">
    <h1>Seus dados <?php echo $user_id->nome ?></h1>   
        <div class="name-field">
          <input type="hidden" name="id" value="<?php echo $user_id->id ?>" required>
          <small>Email</small>
          <input type="email" name="email" value="<?php echo $user_id->email ?>" required>
          <small>Nome</small>
          <input type="text" name="name" value="<?php echo $user_id->nome ?>" required>
          <small>Senha</small>
          <input type="password" name="password" required></input>
          <small>Foto perfil</small>
          <input type="file" name="foto_perfil">           
        </div>
          <button type="submit" class="button column row">Alterar Dados</button> 
    </div>         
  </form>
 <?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>