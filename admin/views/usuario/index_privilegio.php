<h1 class="text-center"> Privilegios del rol: <?php echo $data[0]['rol']; ?></h1>
<div class="container-fluid">
    <div class="row>">
        <a href="usuario.php?action=newprivilege&&id_rol=<?php echo $data[0]['id_rol']; ?>" class="btn btn-success"> Agregar nuevo privilegio al rol </a>
        <table class="table table-responsive table-bordered">
            <thead>
                <tr>
                    <th scope="col" class="col-md-1">ID</th>
                    <th scope="col" class="col-md-10">Privilegios</th>
                    <th scope="col" class="col-md-1">Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data_privilege as $key => $privilege) : ?>
                    <tr>
                        <th scope="row"><?php echo $privilege['id_privilegio']; ?></th>
                        <th scope="row"><?php echo $privilege['privilegio']; ?></th>
                        <td>
                            <div class="btn-group" role="group" aria-label="Menu Renglon">
                                <a class="btn btn-danger" href="usuario.php?action=deleteprivilege&id_rol=<?php echo $data['0']['id_rol'] ?>&id_privilegio=<?php echo $privilege['id_privilegio']; ?>">Eliminar</a>                                
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        Total privilegios: <?php echo sizeof($data_privilege); ?>.
    </div>
</div>