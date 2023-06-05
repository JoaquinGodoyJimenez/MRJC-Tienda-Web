<?php
require_once("../controllers/producto_controller.php");
require_once("../controllers/marca_controller.php");
require_once("../controllers/categoria_controller.php");
include_once("../views/header.php");
include_once("../views/menu.php");

$producto -> validateRol('Administrador');
$action = (isset($_GET["action"])) ? $_GET["action"] : null;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        $dataMarcas = $marca->get(null);
        $dataCategorias = $categoria->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $producto->new($data);
            if ($cantidad) {
                $producto->flash('success', 'Producto dado de alta con éxito');
                $data = $producto->get(null);
                include('../views/producto/index_producto.php');
            } else {
                $producto->flash('danger', 'Algo fallo');
                include('../views/producto/form_producto.php');
            }
        } else {
            include('../views/producto/form_producto.php');
        }
        break;
    case 'delete':
        $cantidad = $producto->delete($id);
        if ($cantidad) {

            $producto->flash('success', 'Producto con el id= ' . $id . ' eliminado con éxito');
            $data = $producto->get(null);
            include('../views/producto/index_producto.php');
        } else {
            $producto->flash('danger', 'Algo fallo');
            $data = $producto->get(null);
            include('../views/producto/index_producto.php');
        }
        break;
    case 'edit':
        $dataMarcas = $marca->get(null);
        $dataCategorias = $categoria->get(null);
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_producto'];
            $cantidad = $producto->edit($id, $data);
            if ($cantidad) {
                $producto->flash('success', 'Producto actualizado con éxito');
                $data = $producto->get(null);
                include('../views/producto/index_producto.php');
            } else {
                $producto->flash('danger', 'Algo fallo');
                $data = $producto->get(null);
                include('../views/producto/index_producto.php');
            }
        } else {
            $data = $producto->get($id);
            include('../views/producto/form_producto.php');
        }
        break;
    case 'getAll':
    default:
        $data = $producto->get(null);
        include("../views/producto/index_producto.php");
}
include("../views/footer.php");
