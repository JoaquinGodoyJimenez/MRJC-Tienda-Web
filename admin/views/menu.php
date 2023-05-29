<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sistema</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- 
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Datos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">            
            <li><a class="dropdown-item" href="../routes/categoria.php">Categorias</a></li>
            <li><a class="dropdown-item" href="../routes/empleado.php">Empleados</a></li>
            <li><a class="dropdown-item" href="../routes/marca.php">Marcas</a></li>
            <li><a class="dropdown-item" href="../routes/marca_categoria.php">Categorias de marcas</a></li>
            <li><a class="dropdown-item" href="../routes/pago.php">Pagos</a></li>
            <li><a class="dropdown-item" href="../routes/privilegio.php">Privilegios</a></li>
            <li><a class="dropdown-item" href="../routes/producto.php">Productos</a></li>
            <li><a class="dropdown-item" href="../routes/proveedor.php">Proveedores</a></li>
            <li><a class="dropdown-item" href="../routes/rol.php">Roles</a></li>
            <li><a class="dropdown-item" href="../routes/tienda.php">Tiendas</a></li>
            <li><a class="dropdown-item" href="../routes/usuario.php">Usuarios</a></li>
            <li><a class="dropdown-item" href="../routes/usuario_rol.php">Roles de usuarios</a></li>
            <li><a class="dropdown-item" href="../routes/venta.php">Ventas</a></li>
            <li><a class="dropdown-item" href="../routes/venta_detalle.php">Detalles de ventas</a></li>
            <!--  Linea separadora  <li><hr class="dropdown-divider"></li>-->
          </ul>
        </li>
        <!-- 
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li>-->
      </ul>
      <!-- 
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>-->
    </div>
  </div>
</nav>