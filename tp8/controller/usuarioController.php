<?php
    include_once ($_SERVER["DOCUMENT_ROOT"] . '/tp8/dao/usuarioDao.php');
    

    $accion = isset($_POST['accion']) ? $_POST['accion'] : (isset($_GET['accion']) ? $_GET['accion'] : ''); 

    switch ($accion) {

       case 'login':
            $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';

            $usuario = UsuarioDao::InicioSesion($email, $clave);

            if($usuario != null){
                echo json_encode($usuario);
            }

            else{

                echo json_encode('EL usuario no existe');
            }
            break;
        }
?>