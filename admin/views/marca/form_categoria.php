<h1 class="text-center"> Nueva categoria de la marca:
    <?php echo $data[0]['marca']; ?></h1>
<form method="POST" action="marca.php?action=<?php echo $action; ?>&id=<?php echo ($data[0]['id_marca']) ?>">
    <div class="mb-3">
        <label class="form-label">Categoria</label>
        <select name="data[id_categoria]" class="form-control" required>
            <?php
            foreach ($dataCategorias as $key => $categorias) :
                $selected = "";
                if ($categorias['id_categoria'] == $data[0]['id_categoria']) :
                    $selected = " selected";
                endif;
            ?>
                <option value="<?php echo $categorias['id_categoria']; ?>" <?php echo $selected; ?>><?php echo $categorias['categoria']; ?> </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <input type="hidden" name="data[id_marca]" value="<?php echo ($data[0]['id_marca']) ?>">
        <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
    </div>
</form>