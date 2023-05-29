<h1 class="text-center">Proveedores</h1>
<div class="container-fluid">
    <a href="proveedor.php?action=new" class="btn btn-success">Añadir proveedor</a>
    <br><br>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-md-1">Id</th>
                <th scope="col" class="col-md-5">Proveedor</th>
                <th scope="col" class="col-md-5">Teléfono</th>
                <th scope="col" class="col-md-2">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data as $key => $proveedor):
                $nReg++; ?>
                <tr>
                    <th scope="row">
                        <?php echo $proveedor["id_proveedor"] ?>
                    </th>
                    <th scope="row">
                        <?php echo $proveedor["proveedor"] ?>
                    </th>
                    <th scope="row">
                        <?php echo $proveedor["telefono"] ?>
                    </th>
                    <th>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="proveedor.php?action=edit&id=<?php echo $proveedor["id_proveedor"] ?>"
                                type="button" class="btn btn-primary">Modificar</a>
                            <a href="proveedor.php?action=delete&id=<?php echo $proveedor["id_proveedor"] ?>"
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
                    No. proveedores: 
                    <?php echo $nReg ?>.
                </th>
            </tr>
        </tbody>
    </table>
</div>