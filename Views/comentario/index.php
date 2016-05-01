<?php foreach ($post->comentarios as $item) :
    $comentario = (object) $item;
    ?>    
    <h3><?php echo $comentario->comentario ?></h3><h6><?php echo $comentario->nome ?></h6>  

<?php
endforeach;
