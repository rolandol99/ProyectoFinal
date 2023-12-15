<nav class="navbar navbar-expand-lg navbar-dark  bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CL</a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div>
      <a class="navbar-brand" href="index.php">Inicio</a>
      <a class="navbar-brand" href="index.php?action=nosotros">Nosotros</a>
      <a class="navbar-brand" href="index.php?action=contacto">Contacto</a>
      <?php
          if(!empty($_SESSION['id']) ){//Tiene sesión activa
        ?>
    </div>   
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            LISTAR
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="index.php?action=mostrarAsignacion">Ver Asignaciones</a></li>
            <li><a class="dropdown-item" href="index.php?action=mostrarAlumnos">Ver Alumnos</a></li>
            <li><a class="dropdown-item" href="index.php?action=mostrarCursos">Ver Cursos</a></li>
            <li><a class="dropdown-item" href="index.php?action=mostrarGrado">Ver Grados</a></li>
            <li><a class="dropdown-item" href="index.php?action=mostrarUsuario">Ver Usuario</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            NUEVOS
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
          <li><a class="dropdown-item" href="index.php?action=ingresoAsignar">Asignar Cursos</a></li>
            <li><a class="dropdown-item" href="index.php?action=ingresoAlumno">Ingreso Alumnos</a></li>
            <li><a class="dropdown-item" href="index.php?action=IngresoCursos">Ingreso Cursos</a></li>
            <li><a class="dropdown-item" href="index.php?action=ingresoGrado">Ingreso Grados</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <div>
      <a class="navbar-brand" href="index.php?action=logout">Cerrar sesión</a>
    <?php }
        else{ //No ha iniciado sesión?>
      <a class="navbar-brand" href="index.php?action=login">Iniciar sesión</a>
      <a class="navbar-brand" href="index.php?action=crearUsuarioEstudiante">Crear usuario</a>
      <?php } ?>
    </div>
  </div>
</nav>