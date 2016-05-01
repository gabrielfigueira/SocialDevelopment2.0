<?php
/**
 * Controlador Categorias
 */

namespace Controllers;

use Classes\Controller;
class AplicacaoController extends Controller {
    
    // Método construtor da classe
    public function __construct() {
    }
    
    //Antes de processar a requisição
     public function antes() {
         if ( ! isset( $_SESSION['usuario'] ) ) {
            header( 'Location: ' . HOME_URL . 'user' );
            die();
        }
   }

    // Depois de processar a requisição
    public function depois() {
    }
    
}