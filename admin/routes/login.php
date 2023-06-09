<?php
include("../controllers/sistema.php");
include("../views/header.php");
$action = (isset($_GET['action'])) ? $_GET['action'] : 'login';
switch ($action) {
    case 'logout':
        $sistema ->logout();
        include("../views/login/index.php");
        break;
    case 'forgot':
        include("../views/login/forgot.php");
        break;
    case 'recovery':
        $data = $_GET;
        if(isset($data['correo']) and isset($data['token'])){
            if($sistema->validateToken($data['correo'],$data['token'])){
                //die('OK');
                include_once('../views/login/recovery.php');
            }else{
                $sistema->flash('danger', 'el Token expiró');
                include_once('../views/login/index.php');
            }
        } else{
            $sistema->flash('danger','URL no puede ser completada como la requirio');
            include_once('../views/login/index.php');
        }
        //die('error');
        break;
    case 'reset':
        $data = $_POST;
            if(isset($data['correo']) and isset($data['token']) and isset($data['contrasena'])){
                if($sistema->validateToken($data['correo'],$data['token'])){
                    if($sistema->resetPassword($data['correo'],$data['token'],$data['contrasena'])){
                        $sistema->flash('success', 'Contraseña actualizada');
                        include_once('../views/login/index.php');
                    } else{
                        $sistema->flash('warning', 'Contacta a soporte técnico o intenta otra vez más tarde.');
                        include_once('../views/login/forgot.php');
                    }
                }else{
                    $sistema->flash('danger', 'El tiempo para cambiar la contraseña se ha agotado.');
                    include_once('../views/login/index.php');
                }
            } else{
                $sistema->flash('danger','El URL no pudo ser completado como se requirió.');
                include_once('../views/login/index.php');
            }
    break;
    case 'send':
        if(isset($_POST['enviar'])){
            $correo=$_POST['correo'];
            $cantidad=$sistema->loginSend($correo);
            if ($cantidad) {
                $sistema->flash('success', "Si el correo se encuentra registrado le enviaremos un correo electrónico.");
                include('../views/login/index.php');
            } else {
                $sistema->flash('warning', "Si el correo se encuentra registrado le enviaremos un correo electrónico.");
                include('../views/login/index.php');
            }
        }           
        break;
    case 'login':
        default:
        if(isset($_POST['enviar'])){
            $data = $_POST;
            if($sistema ->login($data['correo'],$data['contrasena'])){
                $sistema->flash('success', "Ingresando espere un momento");
                $paginaDestino = "index.php";
                echo '<html><head><meta http-equiv="refresh" content="1; url=' . $paginaDestino . '"></head><body></body></html>';
            }else{
                $sistema->flash('danger', "El usuario no existe o los datos son incorrectos.");
            }
        }
        include("../views/login/index.php");
        break;
}
include("../views/footer.php");
