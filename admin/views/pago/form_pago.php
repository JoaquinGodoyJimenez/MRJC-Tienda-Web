<h1>
    <?php echo ($action == 'edit') ? 'Modificar' : 'Nuevo'; ?> pago
</h1>

<form class="container-fluid" method="POST" action="pago.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-2">
            <label for="id_venta">Fecha:</label>
        </div>
    </div>

    <div class="col-2">
        <input type="date" name="data[fecha]" class="form-control" value="<?php echo isset($data[0]['fecha']) ? $data[0]['fecha'] : ''; ?>" required />
    </div>

    <div class="row">
        <div class="col-2">
            <label for="id_venta">Monto:</label>
        </div>
    </div>

    <div class="col-2">
        <input type="number" step="0.5" min="0" name="data[monto]" placeholder="Monto" class="form-control" value="<?php echo isset($data[0]['monto']) ? $data[0]['monto'] : ''; ?>" required />
    </div>

    <div class="row">
        <div class="col-2">
            <label for="id_venta">Venta:</label>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <select name="data[id_venta]" required="required">
                <?php
                $selected = " ";
                foreach ($dataVentas as $key => $tnd):
                    if ($tnd['id_venta'] == $data[0]['id_venta']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tnd['id_venta']; ?>" <?php echo $selected; ?>>
                        <?php echo $tnd['id_venta'] ?></option>
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