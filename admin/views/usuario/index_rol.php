<h1 class="text-center"> Roles del usuario: <?php echo $data[0]['correo']; ?></h1>
<div class="container-fluid">
    <div class="row>">
        <a href="usuario.php?action=newrole&&id=<?php echo $data[0]['id_usuario']; ?>" class="btn btn-success"> Agregar nuevo rol al usuario </a>
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="col-md-12">Roles</th>
                    <th scope="col" class="col-md-3">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_rol as $key => $rol) : ?>
                    <tr>
                        <th scope="row"><?php echo $rol['rol']; ?></th>
                        <td>
                            <div class="btn-group" role="group" aria-label="Menu Renglon">
                                <a class="btn btn-success" href="usuario.php?action=privilege&id_rol=<?php echo $rol['id_rol']; ?>">Privilegios</a>
                                <a class="btn btn-danger" href="usuario.php?action=deleterole&id=<?php echo $data['0']['id_usuario'] ?>&id_rol=<?php echo $rol['id_rol']; ?>">Eliminar</a>                                
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tr>
                <th scope="col"></th>
                <th scope="col">Total roles: <?php echo sizeof($data_rol); ?></th>
            </tr>
        </table>
    </div>
</div>