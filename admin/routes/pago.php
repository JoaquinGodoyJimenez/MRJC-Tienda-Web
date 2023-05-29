<?php
require_once("../controllers/pago_controller.php");
require_once("../controllers/venta_controller.php");
include_once("../views/header.php");
include_once("../views/menu.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        $dataVentas = $venta->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $pago->new($data);
            if ($cantidad) {
                $pago->flash('success', 'Pago dado de alta con éxito');
                $data = $pago->get(null);
                include('../views/pago/index_pago.php');
            } else {
                $pago->flash('danger', 'Algo ha fallado');
                include('../views/pago/form_pago.php');
            }
        } else {
            include('../views/pago/form_pago.php');
        }
        break;
    case 'delete':
        $cantidad = $pago->delete($id);
        if ($cantidad) {

            $pago->flash('success', 'Pago con el id= ' . $id . ' eliminado con éxito');
            $data = $pago->get(null);
            include('../views/pago/index_pago.php');
        } else {
            $pago->flash('danger', 'Algo ha fallado');
            $data = $pago->get(null);
            include('../views/pago/index_pago.php');
        }
        break;
    case 'edit':
        $dataVentas = $venta->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_pago'];
            $cantidad = $pago->edit($id, $data);
            if ($cantidad) {
                $pago->flash('success', 'Pago actualizado con éxito');
                $data = $pago->get(null);
                include('../views/pago/index_pago.php');
            } else {
                $pago->flash('danger', 'Algo fallo');
                $data = $pago->get(null);
                include('../views/pago/index_pago.php');
            }
        } else {
            $data = $pago->get($id);
            include('../views/pago/form_pago.php');
        }
        break;
    case 'getAll':
    default:
        $data = $pago->get(null);
        include("../views/pago/index_pago.php");
}
include("../views/footer.php");
