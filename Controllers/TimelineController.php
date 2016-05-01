<?php
/**
 * Controlador Home
 */

namespace Controllers;

use Controllers\AplicacaoController;
use Models\TimelineModel;
use Models\ComentarioModel;

class TimelineController extends AplicacaoController {
    
       private $timeline_model;
       private $comentario_model;
       
    
    // Método construtor da classe
    public function __construct() {        
        // Instanciar modelos
        $this->timeline_model = new TimelineModel();
        $this->comentario_model = new ComentarioModel();
         parent::__construct();
    }
    
    // URL /
    public function index() {

         $posts = mysqli_fetch_all($this->timeline_model->listar(), MYSQLI_ASSOC);
         foreach ($posts as $key => $post) {
             $post_id = $post['id'];             
             $posts[$key]['comentarios'] = mysqli_fetch_all($this->comentario_model->listar($post_id), MYSQLI_ASSOC);
         }        
         
        // Incluir o layout da ação
        require_once ABSPATH . 'Views/timeline/index.php';         
    }

    public function novo_post(){        
        
        require_once ABSPATH . 'Views/timeline/form_post.php'; 
    }

      public function postar() {
        $foto = $_FILES["foto_post"];
        $post = (object) $_POST;


   
          
        if ((!preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"])) && ($foto["name"] == "")) {
            $post->foto_post = '';
            $this->timeline_model->inserir( $post );
            require_once ABSPATH . 'Views/timeline/form_post.php'; 
       }
              // Pega extensão da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

       
        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
       

        // Caminho de onde ficará a imagem
        $caminho_imagem = "public/" . $nome_imagem;

        // Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($foto["tmp_name"], $caminho_imagem); 
        
         $post->foto_post = $nome_imagem; 
      
        // Salvar registro no banco
        $this->timeline_model->inserir( $post );    
        require_once ABSPATH . 'Views/timeline/form_post.php'; 
      

    }

    public function inserir_comentario(){

      $postagem = $_POST["post_id"];
      $comentario = (object) $_POST;     
      $comentario->post_id = $postagem;
      $comentario->user_id = $_SESSION['usuario']['id'];       
      $this->timeline_model->salvar_comentario( $comentario );

    }
}