<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> venta
</h1>

<form class="container-fluid" method="POST" action="venta.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-2">
            <label for="fecha">fecha:</label>
        </div>
    </div>
    
    <div class="col-2">
        <input type="date" name="data[fecha]" class="form-control" value="<?php echo isset($data[0]['fecha']) ? $data[0]['fecha'] : ''; ?>" required />
    </div>
    
    <div class="row">
        <div class="col-2">
            <label for="id_usuario">Usuario:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_usuario]" required="required" class="form-control">
                <?php
                $selected = " ";
                foreach ($dataUsuarios as $key => $tnd):
                    if ($tnd['id_usuario'] == $data[0]['id_usuario']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tnd['id_usuario']; ?>" <?php echo $selected; ?>>
                        <?php echo $tnd['usuario'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="id_tienda">Tienda:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <select name="data[id_tienda]" required="required" class="form-control">
                <?php
                $selected = " ";
                foreach ($dataTiendas as $key => $tnd):
                    if ($tnd['id_tienda'] == $data[0]['id_tienda']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tnd['id_tienda']; ?>" <?php echo $selected; ?>>
                        <?php echo $tnd['tienda'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="id_empleado">Empleado:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <select name="data[id_empleado]" required="required" class="form-control">
                <?php
                $selected = " ";
                foreach ($dataEmpleados as $key => $tnd):
                    if ($tnd['id_empleado'] == $data[0]['id_empleado']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tnd['id_empleado']; ?>" <?php echo $selected; ?>>
                        <?php echo $tnd['empleado'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row">
        <p></p>
    </div>

    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>

    <?
    if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_venta]"
            value="<?php echo isset($data[0]['id_venta']) ? $data[0]['id_venta'] : ''; ?>" class="" />
    <? endif; ?>
</form>