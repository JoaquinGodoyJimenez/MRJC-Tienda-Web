<h1>
  <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Tienda
</h1>
<form method="POST" action="tienda.php?action=<?php echo $action; ?>">
  <div class="mb-3">
    <label class="form-label">Nombre de la tienda</label>
    <input type="text" name="data[tienda]" class="form-control" placeholder="tienda"
      value="<?php echo isset($data[0]['tienda']) ? $data[0]['tienda'] : ''; ?>" required minlength="3" maxlength="50" />
  </div>
  <div class="mb-3">
    <label class="form-label">Dirección</label>
    <input type="text" name="data[direccion]" class="form-control" placeholder="Dirección"
      value="<?php echo isset($data[0]['direccion']) ? $data[0]['direccion'] : ''; ?>" required minlength="5" maxlength="100" />
  </div>
  <div class="mb-3">
    <?php if ($action == 'edit'): ?>
      <input type="hidden" name="data[id_tienda]"
        value="<?php echo isset($data[0]['id_tienda']) ? $data[0]['id_tienda'] : ''; ?>">
    <?php endif; ?>
    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
  </div>
</form>