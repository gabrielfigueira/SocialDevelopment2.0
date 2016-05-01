<?php

namespace Models;

use Classes\Model;

class TimelineModel extends Model {

      public function inserir($post) {

        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
                'INSERT INTO posts (user_id,titulo,conteudo ,foto_post)
                    VALUES (?,?,?,?)'
        );
          
    $stmt->bind_param( 'isss',
            $post->user_id ,
            $post->titulo,
            $post->conteudo,           
            $post->foto_post
        );
        
        // Executar comando SQL
        return $stmt->execute();
    }



     public function listar() {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT p.*, users.nome FROM posts AS p '
           .'INNER JOIN users on p.user_id = users.id '
           .'ORDER BY data_post DESC'

        );
        
        //Executar comando SQL e retorna resultado
        $stmt->execute();
        
        //Returna resultado
        return $stmt->get_result();
    }

     public function salvar_comentario($comentario) {

        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
                'INSERT INTO comentarios (user_id,post_id,comentario )
                    VALUES (?,?,?)'
        );
          
    $stmt->bind_param( 'iis',
            $comentario->user_id,
            $comentario->post_id,
            $comentario->comentario
        );
        
        // Executar comando SQL
        return $stmt->execute();
    }
}