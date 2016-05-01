<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>
<?php //if ($posts->num_rows > 0) : ?>
    <?php 
        foreach ($posts as $key => $item):
            $post = (object) $item;?>

        <div class="row medium-8 large-7 columns timeline">
            <div class="blog-post">               
                <h3>
                    <?php echo $post->titulo ?> 
                    <small>
                        <?php echo date('d/m/Y H:i:s', strtotime($data)); ?>
                    </small>
                </h3>
                <?php if ($post->foto_post == '') { ?>
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $post->conteudo ?>" frameborder="0" allowfullscreen></iframe>
                <?php } else { ?>
                    <img class="thumbnail" src="<?php echo 'public/' . $post->foto_post ?>">
                <?php } ?>
                <p><?php echo $post->conteudo ?></p>
            </div>
            <div class="callout">
                <ul class="menu simple">
                    <li><a><i class="fi-torso">Autor: <?php echo $post->nome ?></i></a></li>
                    <li><a onclick="comentar(this)" class="comentario"><i class="fi-comments"> Comentarios </i></a></li> 
                </ul>
                <?php include ABSPATH . 'Views/comentario/form.php' ?>
                <?php include ABSPATH . 'Views/comentario/index.php' ?>
            </div>
        </div>          

    <?php endforeach; ?>       
<?php // else : ?>            
<!--   <p>Nenhum registro encontrado!</p>-->
<?php// endif; ?>

<script type="text/javascript">
    function comentar(e) {
        $(e).closest('.callout').children('.comentario').show();     
    }
</script>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>