<form method="post" action="<?php echo HOME_URL . 'comentario/inserir_comentario'; ?>" class="comentario" style="display: none">
    <input type="hidden" class="dados" name="post_id" value="<?php echo $post->id ?>"><?php $data = $post->data_post ?>
    <input type="hidden" class="dados" name="user_id" value="<?php echo $_SESSION['usuario']['id'] ?>">  
    <input name="comentario" type="text" placeholder="Comentar"/>
    <button type="submit" class="button column row"> Comentar</button>
</form>
