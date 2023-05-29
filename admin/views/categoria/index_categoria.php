<h1 class="text-center">Categorias</h1>
<div class="container-fluid">
    <a href="categoria.php?action=new" class="btn btn-success">Añadir categoria</a>
    <br><br>
    <table class="table table-responsive table-bordered">
        <thead>
            <tr>
                <th scope="col" class="col-md-1">Id</th>
                <th scope="col" class="col-md-8">Categoria</th>
                <th scope="col" class="col-md-3">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php $nReg = 0;
            foreach ($data as $key => $categoria):
                $nReg++; ?>
                <tr>
                    <th scope="row">
                        <?php echo $categoria["id_categoria"] ?>
                    </th>
                    <th scope="row">
                        <?php echo $categoria["categoria"] ?>
                    </th>
                    <th>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="categoria.php?action=edit&id=<?php echo $categoria["id_categoria"] ?>"
                                type="button" class="btn btn-primary">Modificar</a>
                            <a href="categoria.php?action=delete&id=<?php echo $categoria["id_categoria"] ?>"
                                type="button" class="btn btn-danger">Eliminar</a>
                        </div>
                    </th>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th>
                    No. categorias: 
                    <?php echo $nReg ?>.
                </th>
            </tr>
        </tbody>
    </table>
</div>