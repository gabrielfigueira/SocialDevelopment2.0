<?php
/* 
 * Arquivo contendo configurações básicas do projeto
 */

/* Caminho raiz do servidor */
define( 'ABSPATH', realpath( dirname( __FILE__ ) ) . DIRECTORY_SEPARATOR );

/* Caminho da home */
define( 'HOME_URL', dirname( $_SERVER['PHP_SELF'] ) . DIRECTORY_SEPARATOR );

/* Endereço do servidor de banco de dados */
define( 'HOST', '127.0.0.1' );

/* Usuário do banco de dados */
define( 'USUARIO', 'root' );

/* Senha do banco de dados */
define( 'SENHA', 'root' );

/* Nome do banco de dados */
define( 'BANCO_DE_DADOS', 'social' );

/* Se você estiver desenvolvendo, modifique o valor para true */
define( 'DEBUG', true );