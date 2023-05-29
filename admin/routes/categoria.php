<?php
require_once("../controllers/categoria_controller.php");
include_once("../views/header.php");
include_once("../views/menu.php");
//$categoria -> validateRol('Administrador');
$action = (isset($_GET['action'])) ? $_GET['action'] : "getAll";
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($action) {
    case 'new':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $cantidad = $categoria->new($data);
            if ($cantidad) {
                $categoria->flash('success', 'Categoria dada de alta con éxito');
                $data = $categoria->get(null);
                include('../views/categoria/index_categoria.php');
            } else {
                $categoria->flash('danger', 'Algo fallo');
                include('../views/categoria/form_categoria.php');
            }
        } else {
            include('../views/categoria/form_categoria.php');
        }
        break;
    case 'edit':
        if (isset($_POST['enviar'])) {
            $data = $_POST['data'];
            $id = $_POST['data']['id_categoria'];
            $cantidad = $categoria->edit($id, $data);
            if ($cantidad) {
                $categoria->flash('success', 'Categoria actualizada con éxito');
                $data = $categoria->get(null);
                include('../views/categoria/index_categoria.php');
            } else {
                $categoria->flash('danger', 'Algo fallo');
                $data = $categoria->get(null);
                include('../views/categoria/index_categoria.php');
            }
        } else {
            $data = $categoria->get($id);
            include('../views/categoria/form_categoria.php');
        }
        break;
    case 'delete':
        $cantidad = $categoria->delete($id);
        if ($cantidad) {
            $categoria->flash('success', 'Categoria con el id= ' . $id . ' eliminado con éxito');
            $data = $categoria->get(null);
            include('../views/categoria/index_categoria.php');
        } else {
            $categoria->flash('danger', 'Algo fallo');
            $data = $categoria->get(null);
            include('../views/categoria/index_categoria.php');
        }
        break;
    case 'getAll':
    default:
        $data = $categoria->get(null);
        include("../views/categoria/index_categoria.php");
}
include("../views/footer.php");
?>