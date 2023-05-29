<h1 class="text-center">Productos</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="producto.php?action=new" role="button">Ingresar un producto nuevo</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col-md-1">ID</th>
                        <th scope="col-md-1">Producto</th>
                        <th scope="col-md-1">Precio</th>
                        <th scope="col-md-1">Costo</th>
                        <th scope="col-md-1">SKU</th>
                        <th scope="col-md-1">Unidades</th>
                        <th scope="col-md-1">Marca</th>
                        <th scope="col-md-1">Proveedor</th>
                        <th scope="col-md-1">Teléfono</th>
                        <th scope="col-md-1">Categorias</th>
                        <th scope="col-1">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $producto):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $producto["id_producto"] ?>
                            </td>
                            <td>
                                <?php echo $producto["producto"] ?>
                            </td>
                            <td>
                                <?php echo $producto["precio"] ?>
                            </td>
                            <td>
                                <?php echo $producto["costo"] ?>
                            </td>
                            <td>
                                <?php echo $producto["sku"] ?>
                            </td>
                            <td>
                                <?php echo $producto["unidades"] ?>
                            </td>
                            <td>
                                <?php echo $producto["marca"] ?>
                            </td>
                            <td>
                                <?php echo $producto["proveedor"] ?>
                            </td>                            
                            <td>
                                <?php echo $producto["telefono"] ?>
                            </td>
                            <td>
                                <?php echo $producto["categoria"] ?>
                            </td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="producto.php?action=edit&id=<?php echo $producto["id_producto"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="producto.php?action=delete&id=<?php echo $producto["id_producto"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            No. productos: <?php echo $nReg ?>.
        </div>
    </div>
</div>