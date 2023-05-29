<h1 class="text-center">Tiendas</h1>
<a href="tienda.php?action=new" class="btn btn-success">Añadir tienda</a>
<br><br>
<table class="table table-responsive table-bordered">
    <thead>
        <tr>
            <th scope="col" class="col-md-1">Id</th>
            <th scope="col" class="col-md-5">Tienda</th>
            <th scope="col" class="col-md-5">Dirección</th>
            <th scope="col" class="col-md-2">Opciones</th>
        </tr>
    </thead>
    <tbody>
        <?php $nReg = 0;
        foreach ($data as $key => $tienda):
            $nReg++; ?>
            <tr>
                <th scope="row">
                    <?php echo $tienda["id_tienda"] ?>
                </th>
                <th scope="row">
                    <?php echo $tienda["tienda"] ?>
                </th>
                <th scope="row">
                    <?php echo $tienda["direccion"] ?>
                </th>
                <th>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="tienda.php?action=edit&id=<?php echo $tienda["id_tienda"] ?>"
                            type="button" class="btn btn-primary">Modificar</a>
                        <a href="tienda.php?action=delete&id=<?php echo $tienda["id_tienda"] ?>"
                            type="button" class="btn btn-danger">Eliminar</a>
                    </div>
                </th>
            </tr>
        <?php endforeach; ?>
        <tr>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th>
                No. tiendas: 
                <?php echo $nReg ?>.
            </th>
        </tr>
    </tbody>
</table>