<h1 class="text-center">
    Detalles de la venta
    <a href="venta.php?action=newdetails&&id=<?php echo $data[0]['id_venta']; ?>" class="btn btn-success"> Añadir producto </a>
</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <p>Id venta: <?php echo $data[0]['id_venta']; ?></p>
        </div>        
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <p>Fecha: <?php echo $data[0]['fecha']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <p>Cliente: <?php echo $data[0]['nombre']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <p>Empleado: <?php echo $data[0]['empleado']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <p>Tienda: <?php echo $data[0]['tienda']; ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <p>Dirección: <?php echo $data[0]['direccion']; ?></p>            
        </div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col" class="col-md-2">Producto</th>
                        <th scope="col" class="col-md-2">SKU</th>
                        <th scope="col" class="col-md-2">Precio</th>
                        <th scope="col" class="col-md-2">Cantidad</th>
                        <th scope="col" class="col-md-1">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data_producto as $key => $producto) : ?>
                        <tr>

                            <td scope="row">
                                <?php echo $producto['producto']; ?>
                            </td>

                            <td scope="row">
                                <?php echo $producto['sku']; ?>
                            </td>

                            <td scope="row">
                                <?php echo $producto['precio_unitario']; ?>
                            </td>

                            <td scope="row">
                                <?php echo $producto['cantidad']; ?>
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Menu Renglon">
                                    <a class="btn btn-danger" href="venta.php?action=deletedetails&id=<?php echo $data['0']['id_venta'] ?>&id_producto=<?php echo $producto['id_producto']; ?>">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <b>Total productos:<?php echo sizeof($data_producto); ?>.
        </div>
        <div class="col-1"></div>
    </div>
</div>