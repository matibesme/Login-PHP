<?php
include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp8/model/usuario.php');

class UsuarioDao {

    public static function InicioSesion($email, $clave ) {

        $DBH = new PDO("mysql:host=127.0.0.1;dbname=sistema", "root", "");

      
        $query = 'SELECT * FROM usuario WHERE email = :email AND clave = :clave';


        $STH = $DBH->prepare($query);
        $STH->setFetchMode(PDO::FETCH_ASSOC);        

        $params = array(                                
            ":email" => $email,
            ":clave" => $clave
        );


        $STH->execute($params);



        $usuario = new Usuario();

        if ($STH->rowCount() > 0) {

    
            while($row = $STH->fetch()) {
                $usuario->nombre = $row['nombre'];
                $usuario->apellido = $row['apellido']; 
                $usuario->email = $row['email'];
                $usuario->id = $row['id'];
                $usuario->clave = $row['clave'];               
            }
        }
        else{
            $usuario = null;
        }
        

        return $usuario;
    }

    
}

?>