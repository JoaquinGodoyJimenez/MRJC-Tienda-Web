<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> Marca
</h1>

<form class="container-fluid" method="POST" action="marca.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-2">
            <label for="marca">marca:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <input required="required" type="text" class="" id="marca" name="data[marca]"
                value="<?php echo isset($data[0]['marca']) ? $data[0]['marca'] : ''; ?>" minlength="5"
                maxlength="50">
        </div>
    </div>
    
    <div class="row">
        <div class="col-2">
            <label for="id_proveedor">Proveedor:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_proveedor]" required="required">
                <?php
                $selected = " ";
                foreach ($dataProveedores as $key => $tnd):
                    if ($tnd['id_proveedor'] == $data[0]['id_proveedor']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tnd['id_proveedor']; ?>" <?php echo $selected; ?>>
                        <?php echo $tnd['proveedor'] ?></option>
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
        <input type="hidden" name="data[id_marca]"
            value="<?php echo isset($data[0]['id_marca']) ? $data[0]['id_marca'] : ''; ?>" class="" />
    <? endif; ?>
</form>