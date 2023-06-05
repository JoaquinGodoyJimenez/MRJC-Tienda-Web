<?php
require_once("../controllers/tienda_controller.php");
include_once("../views/header.php");
include_once("../views/menu.php");

$tienda -> validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $tienda->new($data);
            if ($cantidad) {
                $tienda->flash('success', 'Tienda dada de alta con éxito');
                $data = $tienda->get(null);
                include('../views/tienda/index_tienda.php');
            } else {
                $tienda->flash('danger', 'Algo fallo');
                include('../views/tienda/form_tienda.php');
            }
        } else {
            include('../views/tienda/form_tienda.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_tienda'];
            $cantidad = $tienda->edit($id, $data);
            if ($cantidad) {
                $tienda->flash('success', 'Tienda actualizada con éxito');
                $data = $tienda->get(null);
                include('../views/tienda/index_tienda.php');
            } else {
                $tienda->flash('danger', 'Algo fallo');
                $data = $tienda->get(null);
                include('../views/tienda/index_tienda.php');
            }
        } else {
            $data = $tienda->get($id);
            include('../views/tienda/form_tienda.php');
        }
        break;
    case 'delete':
        $cantidad = $tienda->delete($id);
        if ($cantidad) {
            $tienda->flash('success', 'Tienda con el id= ' . $id . ' eliminada con éxito');
            $data = $tienda->get(null);
            include('../views/tienda/index_tienda.php');
        } else {
            $tienda->flash('danger', 'Algo ha fallado');
            $data = $tienda->get(null);
            include('../views/tienda/index_tienda.php');
        }
        break;
    case 'getAll':
    default:
        $data = $tienda->get(null);
        include("../views/tienda/index_tienda.php");
}
include("../views/footer.php");
?>