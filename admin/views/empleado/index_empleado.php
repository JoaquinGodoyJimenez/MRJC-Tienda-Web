<h1 class="text-center">Empleados</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-3">
            <p><a class="btn btn-success" href="empleado.php?action=new" role="button">Ingresar un empleado nuevo</a>
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <table class="table table-responsive table-bordered">
                <thead>
                    <tr>
                        <th scope="col-md-1">ID</th>
                        <th scope="col-md-5">Nombre</th>
                        <th scope="col-md-5">Tienda</th>
                        <th scope="col-md-2">Operación</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nReg = 0;
                    foreach ($data as $key => $empleado):
                        $nReg++; ?>
                        <tr>
                            <td>
                                <?php echo $empleado["id_empleado"] ?>
                            </td>
                            <td>
                                <?php echo $empleado["empleado"] ?>
                            </td>
                            <td>
                                <?php echo $empleado["tienda"] ?>
                            </td>

                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="empleado.php?action=edit&id=<?php echo $empleado["id_empleado"] ?>"
                                        type="button" class="btn btn-primary">Modificar</a>
                                    <a href="empleado.php?action=delete&id=<?php echo $empleado["id_empleado"] ?>"
                                        type="button" class="btn btn-danger">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                    <tr>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>

                        <th>
                            No. empleados:
                            <?php echo $nReg ?>.
                        </th>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>