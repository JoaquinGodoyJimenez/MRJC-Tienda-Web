<?php
require_once('../controllers/rol_controller.php');
include_once('../views/header.php');
include_once('../views/menu.php');
//$departamento -> validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : 'get';
$id = (isset($_GET['id'])) ? $_GET['id'] : null;
switch ($action) {
    case 'new':

        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $rol->new($data);
            if ($cantidad) {
                $rol->flash('success', "Registro dado de alta con éxito");
                $data = $rol->get();
                include('../views/rol/index_rol.php');
            } else {
                $rol->flash('danger', "Algo fallo");
                include('../views/rol/form_rol.php');
            }
        } else {
            include('../views/rol/form_rol.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_rol'];
            $cantidad = $rol->edit($id, $data);
            if ($cantidad) {
                $rol->flash('success', "Registro actualizado con éxito");
                $data = $rol->get();
                include('../views/rol/index_rol.php');
            } else {
                $rol->flash('warning', "Algo fallo o no hubo cambios");
                $data = $rol->get();
                include('../views/rol/index_rol.php');
            }
        } else {
            $data = $rol->get($id);
            include('../views/rol/form_rol.php');
        }
        break;
    case 'delete':
            $cantidad = $rol->delete($id);
            if ($cantidad) {
                $rol->flash('success', "Registro eliminado con exito");
                $data = $rol->get();
                include('../views/rol/index_rol.php');
            } else {
                $rol->flash('danger', "Algo fallo");
                $data = $rol->get();
                include('../views/rol/index_rol.php');
            }
        break;
    case 'get':
    default:
        $data = $rol->get($id);
        include("../views/rol/index_rol.php");
}
include_once('../views/footer.php');
?>