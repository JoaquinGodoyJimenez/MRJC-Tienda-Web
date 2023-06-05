<?php
require_once("../controllers/proveedor_controller.php");
include_once("../views/header.php");
include_once("../views/menu.php");

$proveedor -> validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $proveedor->new($data);
            if ($cantidad) {
                $proveedor->flash('success', 'Proveedor dado de alta con éxito');
                $data = $proveedor->get(null);
                include('../views/proveedor/index_proveedor.php');
            } else {
                $proveedor->flash('danger', 'Algo fallo');
                include('../views/proveedor/form_proveedor.php');
            }
        } else {
            include('../views/proveedor/form_proveedor.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_proveedor'];
            $cantidad = $proveedor->edit($id, $data);
            if ($cantidad) {
                $proveedor->flash('success', 'Proveedor actualizado con éxito');
                $data = $proveedor->get(null);
                include('../views/proveedor/index_proveedor.php');
            } else {
                $proveedor->flash('danger', 'Algo fallo');
                $data = $proveedor->get(null);
                include('../views/proveedor/index_proveedor.php');
            }
        } else {
            $data = $proveedor->get($id);
            include('../views/proveedor/form_proveedor.php');
        }
        break;
    case 'delete':
        $cantidad = $proveedor->delete($id);
        if ($cantidad) {
            $proveedor->flash('success', 'Proveedor con el id= ' . $id . ' eliminado con éxito');
            $data = $proveedor->get(null);
            include('../views/proveedor/index_proveedor.php');
        } else {
            $proveedor->flash('danger', 'Algo fallo');
            $data = $proveedor->get(null);
            include('../views/proveedor/index_proveedor.php');
        }
        break;
    case 'getAll':
    default:
        $data = $proveedor->get(null);
        include("../views/proveedor/index_proveedor.php");
}
include("../views/footer.php");
?>