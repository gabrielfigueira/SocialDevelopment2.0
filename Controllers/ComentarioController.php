<?php
/**
 * Controlador Home
 */

namespace Controllers;

use Controllers\AplicacaoController;
use Models\ComentarioModel;

class ComentarioController extends AplicacaoController {
    
       private $comentario_model;
       
    
    // Método construtor da classe
    public function __construct() {
        // Instanciar modelos
        $this->comentario_model = new ComentarioModel(); 
         parent::__construct();
    }
    
    // URL /
    public function index() {
        $listar = $_POST['post_id'];     
        $comentario = $this->comentario_model->listar();
              
    }

    public function inserir_comentario(){

      $postagem = $_POST["post_id"];
      $comentario = (object) $_POST;     
      $comentario->post_id = $postagem;
      $comentario->user_id = $_SESSION['usuario']['id'];       
      $this->comentario_model->salvar_comentario( $comentario );
      header('Location: http://localhost/SocialDevelopment/timeline');
    }
}