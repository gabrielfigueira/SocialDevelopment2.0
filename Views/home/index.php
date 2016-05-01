<?php require_once ABSPATH . 'Views/includes/cabecalho.inc.php'; ?>

<div class="jumbotron">
    <h1 style="margin-top: 0;">Seja bem-vindo(a)</h1>
    <p>
        Bem vindo a nossa rede Social <strong><?php echo $_SESSION['usuario']['nome'] ?></strong>
    </p>
</div>

<?php require_once ABSPATH . 'Views/includes/rodape.inc.php'; ?>