<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<form action="<?php echo HOME_URL . 'timeline/postar' ?>" class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="formpost">
  <h1>Faça sua postagem</h1>   
      <div class="name-field">        
        <input type="hidden" name="user_id" value="<?php echo $_SESSION['usuario']['id'] ?>" required>
        <small>Titulo</small>
        <input type="text" name="titulo" required>
        <small>Conteudo</small>
        <input type="text" name="conteudo" required>
        <input type="file" name="foto_post">
           
      </div>
        <button type="submit" class="button column row">Postar</button>        
    </form>
  </div>
 <?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>