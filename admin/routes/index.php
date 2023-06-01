<?php
require_once("../controllers/index_controller.php");
require_once("../controllers/usuario_controller.php");
require_once("../controllers/producto_controller.php");
require_once("../controllers/venta_controller.php");
include("../views/header.php");
include("../views/menu.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        $dataUsuarios = $usuario->get(null);
        $dataProductos = $producto->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $index->new($data);
            if ($cantidad) {
                $index->flash('success', 'Venta dada de alta con éxito');
                include("../views/dashboard/index_dashboard.php");
                //include("../views/dashboard/form_detalles.php");
            } else {
                $index->flash('danger', 'Algo ha fallado');
                include('../views/dashboard/form_venta.php');
            }
        } else {
            include('../views/dashboard/form_venta.php');
        }
        break;
    case 'details':
        $lastID = $index->getLastID();
        $data = $venta->get($lastID);
        $data_producto = $venta->getDetails($lastID);
        include("../views/dashboard/form_detalles.php");
        break;
    default:
        include("../views/dashboard/index_dashboard.php");
}
include("../views/footer.php");
?>