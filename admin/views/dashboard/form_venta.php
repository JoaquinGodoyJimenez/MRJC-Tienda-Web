<h1 class="text-center">Nueva venta</h1>
<form class="container-fluid" method="POST" action="index.php?action=<?php echo ($action); ?>"
    enctype="multipart/form-data">

    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <input type="hidden" name="data[fecha]" class="form-control" value="<?php echo date('Y-m-d'); ?>" required />
        </div>        
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <input type="hidden" name="data[id_empleado]" class="form-control" value="<?php echo $_SESSION['id_usuario'];?>" required />
        </div>        
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <input type="hidden" name="data[id_tienda]" class="form-control" value="<?php echo $_SESSION['id_tienda'];?>" required />
        </div>        
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <label for="id_usuario"><b>Cliente</b></label>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <select name="data[id_usuario]" required="required" class="form-control">
                <?php
                $selected = " ";
                foreach ($dataUsuarios as $key => $tnd):
                    if ($tnd['id_usuario'] == $data[0]['id_usuario']):
                        $selected = "selected";
                    endif;
                    ?>
                    <option value="<?php echo $tnd['id_usuario']; ?>" <?php echo $selected; ?>>
                        <?php echo $tnd['nombre'] ?></option>
                    <?php $selected = " "; endforeach; ?>
            </select>
        </div>
    </div>

    <div class="row ">
        <div class="col-1"></div>
        <div class="col-4">
            <label class="form-label"><b>Producto</b></label>
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
        <div class="col-1"></div>
        <div class="col-4">
            <label for="cantidad"><b>Cantidad</b></label>
        </div>
    </div>


    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <input type="number" step="1" min="0" name="data[cantidad]" placeholder="Cantidad" class="form-control" value="<?php echo isset($data[0]['cantidad']) ? $data[0]['cantidad'] : ''; ?>" required />                    
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <label for="precio_unitario">Precio:</label>
        </div>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <input type="number" step="0.5" min="0" name="data[precio_unitario]" placeholder="Precio" class="form-control" value="<?php echo isset($data[0]['precio_unitario']) ? $data[0]['precio_unitario'] : ''; ?>" required />
        </div>
    </div>

    <div class="row">
        <p></p>
    </div>

    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <input type="submit" class="btn btn-primary mb-3" name="enviar" value="Guardar">
        </div>
    </div>
</form>