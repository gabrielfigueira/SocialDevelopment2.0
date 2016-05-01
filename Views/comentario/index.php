 <div class="timeline_comentarios comentario" style="display: none">
 <h4 style="text-align: center">Comentarios : </h4>
	<?php foreach ($post->comentarios as $item) :
	    $comentario = (object) $item;
	    ?>	    
	    <?php echo $comentario->foto_perfil ?>
	    <span class="label" style="border-radius: 10px;"><?php echo $comentario->nome ?></span>
	   <?php echo $comentario->comentario ?>
	   <hr>

	<?php endforeach; ?>
</div>
