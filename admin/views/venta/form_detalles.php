<h1 class="text-center"> Nuevo producto de la venta</h1>
<form method="POST" action="venta.php?action=<?php echo $action; ?>&id=<?php echo ($data[0]['id_venta']) ?>">
    <div class="row">
        <div class="col-2">
            <label class="form-label">Producto</label>
            <select name="data[id_producto]" class="form-control" required>
                <?php
                foreach ($dataProductos as $key => $productos) :
                    $selected = "";
                    if ($productos['id_producto'] == $data[0]['id_producto']) :
                        $selected = " selected";
                    endif;
                ?>
                    <option value="<?php echo $productos['id_producto']; ?>" <?php echo $selected; ?>><?php echo $productos['producto']; ?> </option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label for="cantidad">Cantidad:</label>
        </div>
    </div>

    <div class="col-2">
        <input type="number" step="1" min="0" name="data[cantidad]" placeholder="Cantidad" class="form-control" value="<?php echo isset($data[0]['cantidad']) ? $data[0]['cantidad'] : ''; ?>" required />
    </div>

    <div class="row">
        <div class="col-2">
            <label for="precio_unitario">Precio:</label>
        </div>
    </div>

    <div class="col-2">
        <input type="number" step="0.5" min="0" name="data[precio_unitario]" placeholder="Precio" class="form-control" value="<?php echo isset($data[0]['precio_unitario']) ? $data[0]['precio_unitario'] : ''; ?>" required />
    </div>


    <div class="row">
        <p></p>
    </div>

    <div class="row">
        <div class="col-2">
            <input type="hidden" name="data[id_venta]" value="<?php echo ($data[0]['id_venta']) ?>">     
            <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
        </div>
    </div>
</form>