<h1 class="text-center">Marcas</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="marca.php?action=new" role="button">Ingresar un marca nueva</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col-md-1">ID</th>
                        <th scope="col-md-3">Marca</th>
                        <th scope="col-md-3">Proveedores</th>
                        <th scope="col-md-3">Teléfono</th>
                        <th scope="col-1">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $marca):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $marca["id_marca"] ?>
                            </td>
                            <td>
                                <?php echo $marca["marca"] ?>
                            </td>
                            <td>
                                <?php echo $marca["proveedor"] ?>
                            </td>
                            <td>
                                <?php echo $marca["telefono"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-secondary" href="marca.php?action=category&id=<?php echo $marca['id_marca'] ?>">Categorias</a>
                                    <a href="marca.php?action=edit&id=<?php echo $marca["id_marca"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="marca.php?action=delete&id=<?php echo $marca["id_marca"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            No. marcas: <?php echo $nReg ?>.
        </div>
    </div>
</div>