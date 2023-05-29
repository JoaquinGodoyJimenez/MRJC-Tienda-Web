<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Empleado
</h1>

<form class="container-fluid" method="POST" action="empleado.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-2">
            <label for="empleado">Nombre del empleado:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="empleado" name="data[empleado]"
                value="<?php echo isset($data[0]['empleado']) ? $data[0]['empleado'] : ''; ?>" minlength="10"
                maxlength="100">
        </div>
    </div>
    

    <div class="row">
        <p></p>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="id_tienda">Tienda:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_tienda]" required="required">
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
        <p></p>
    </div>


    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>

    <?
    if ($action == 'edit'): ?>
        <input type="hidden" name="data[id_empleado]"
            value="<?php echo isset($data[0]['id_empleado']) ? $data[0]['id_empleado'] : ''; ?>" class="" />
    <? endif; ?>
</form>