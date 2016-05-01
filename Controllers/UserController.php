<?php
/**
 * Controlador Categorias
 */

namespace Controllers;

use Classes\Controller;
use Models\UserModel;

class UserController extends Controller {

    
    private $user_model;
    
    // Método construtor da classe
    public function __construct() {
        
        // Instanciar modelos
        $this->user_model = new UserModel(); 
        parent::__construct();
    }
    
    
    // URL /login
    public function index() {
        // Verificar login
     

        // Incluir o layout da ação
        require_once ABSPATH . 'Views/login/index.php';
    }
    
    public function cadastrar() {
        
        // Salvar registro no banco 


        $foto = $_FILES["foto_perfil"];
        $user = (object) $_POST;
          
        if ((!preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"])) && ($foto["name"] == "")) {
            $user->foto_perfil = '';
            $this->user_model->salvar( $user );
            header( 'Location: ' . HOME_URL . 'home' ); 
        }  else {
                  // Pega extensão da imagem
            preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

           
            $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
           

            // Caminho de onde ficará a imagem
            $caminho_imagem = "public/" . $nome_imagem;

            // Faz o upload da imagem para seu respectivo caminho
            move_uploaded_file($foto["tmp_name"], $caminho_imagem); 
            
             $user->foto_perfil = $nome_imagem;         
             
            // Salvar registro no banco
            $this->user_model->salvar( $user );
            header( 'Location: ' . HOME_URL . 'home' ); 
            }     
      
    
    }
    public function novo_usuario() {
        require_once ABSPATH . 'Views/login/form_cadastro.php';   
    }

    public function logar() {        

        
        $user = (object) $_POST;
        
        $email = $user->email;
        $senha = $user->password;
        
        $user = $this->user_model->verifica_login($email,$senha);
        if(!isset($user))
        {
             header( 'Location: ' . HOME_URL . 'user' ); 
        } else
        {
        $usuario["id"] = $user->id;
        $usuario["nome"] = $user->nome;
        $usuario["foto_perfil"] = $user->foto_perfil;
        $_SESSION['usuario'] = $usuario;  
        header( 'Location: ' . HOME_URL . 'home' );        
        }
    }
    public function form() {
        
        // Buscar registro quando receber o parametro ID via GET
        $user_id = array_get( $_GET, 'id' );    
        $user_id = $this->user_model->filtrar_por__id( $user_id);      
        
        // Incluir o layout da ação
      require_once ABSPATH . 'Views/users/form_usuario_perfil.php';   
    }
    
    public function logout ()
    {
        session_destroy();
        header( 'Location: ' . HOME_URL . 'user' ); 
    }
}
