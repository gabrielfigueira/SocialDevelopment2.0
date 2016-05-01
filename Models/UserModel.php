<?php

namespace Models;

use Classes\Model;

class UserModel extends Model {


    public function verifica_login($email,$senha) {



$stmt = $this->db->prepare("SELECT * FROM users WHERE email = ? AND senha = ? ");
$stmt->bind_param('ss', 
        $email,
        $senha
);
$stmt->execute();

 return $stmt->get_result()->fetch_object();
 }

    public function filtrar_por__id( $user_id ) {
        
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'SELECT * FROM users
              WHERE id = ?'
        );
        
        // Proteger contra SQL Injection
        $stmt->bind_param( 'i', $user_id );
        
        // Executar comando SQL e retorna resultado
        $stmt->execute();
        
        // Returnar um registro, se encontrar
        return $stmt->get_result()->fetch_object();
    }

    public function salvar( $user ) {

        if ( $user->id == NULL || empty( $user->id ) ) {
            $this->inserir( $user );
        } else {         
            $this->alterar( $user );
        }
    }

    public function inserir($user) {

        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
                'INSERT INTO users (email, nome, senha,foto_perfil)
                    VALUES (?,?,?,?)'
        );
    

    $stmt->bind_param( 'ssss',
            $user->email,
            $user->name,
            $user->password,
            $user->foto_perfil
        );
        
        // Executar comando SQL
        return $stmt->execute();
    }

     public function alterar( $user ) { 
            
        // Prepare SQL para receber parametros
        $stmt = $this->db->prepare(
            'UPDATE users
                SET email = ?,
                    nome = ?,
                    senha = ?,
                    foto_perfil= ?
              WHERE id = ?'
        ); 
         
        // Proteger contra SQL Injection
        $stmt->bind_param( 'ssssi',
            $user->email,
            $user->name,
            $user->password,
            $user->foto_perfil,
            $user->id        
        );
        
        // Executar comando SQL
        return $stmt->execute();
    } 
}