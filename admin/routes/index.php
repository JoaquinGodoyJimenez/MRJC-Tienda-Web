<?php
include("../views/header.php");
include("../views/menu.php");
require_once("../controllers/index_controller.php");
require_once("../controllers/usuario_controller.php");
require_once("../controllers/producto_controller.php");

$action = (isset($_GET["action"])) ? $_GET["action"] : null;

switch ($action) {
    case 'new':
        $dataUsuarios = $usuario->get(null);
        $dataProductos = $producto->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $index->new($data);
            if ($cantidad) {
                $index->flash('success', 'Venta dada de alta con éxito');
                //$lastID = $index->getLastID();
                include("../views/dashboard/index_dashboard.php");
            } else {
                $index->flash('danger', 'Algo ha fallado');
                include('../views/dashboard/form_venta.php');
            }
        } else {
            include('../views/dashboard/form_venta.php');
        }
        break;
    default:
        include("../views/dashboard/index_dashboard.php");
}
include("../views/footer.php");
?>