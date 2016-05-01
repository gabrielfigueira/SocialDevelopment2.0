<?php

namespace Models;

use Classes\Model;

class ComentarioModel extends Model {    

     public function listar($post_id) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT comentarios.*, users.nome  FROM comentarios '
           .'INNER JOIN users on users.id = comentarios.user_id '
           .'where post_id = ?'
        );
        
        
        $stmt->bind_param( 'i', $post_id );
        
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