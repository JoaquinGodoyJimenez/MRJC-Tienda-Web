<h1>
  <?php echo ($action == 'edit') ? 'Modificar ' : 'Nuevo ' ?>Proveedor
</h1>
<form method="POST" action="proveedor.php?action=<?php echo $action; ?>">
  <div class="mb-3">
    <label class="form-label">Nombre del proveedor</label>
    <input type="text" name="data[proveedor]" class="form-control" placeholder="Proveedor"
      value="<?php echo isset($data[0]['proveedor']) ? $data[0]['proveedor'] : ''; ?>" required minlength="3" maxlength="50" />
  </div>
  <div class="mb-3">
    <label class="form-label">Teléfono</label>
    <input type="number" name="data[telefono]" class="form-control" placeholder="Telefono"
      value="<?php echo isset($data[0]['telefono']) ? $data[0]['telefono'] : ''; ?>" required minlength="7" maxlength="11" />
  </div>
  <div class="mb-3">
    <?php if ($action == 'edit'): ?>
      <input type="hidden" name="data[id_proveedor]"
        value="<?php echo isset($data[0]['id_proveedor']) ? $data[0]['id_proveedor'] : ''; ?>">
    <?php endif; ?>
    <input type="submit" name="enviar" value="Guardar" class="btn btn-primary" />
  </div>
</form>