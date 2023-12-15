<nav class="navbar navbar-expand-lg navbar-dark bg-primary"> 
 
  <div class="container-fluid">

  
  <nav class="navbar bg-body-tertiary"> 
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="" alt="Logo" width="0" height="0" class="d-inline-block align-text-top">
      <!---<img src="https://intecap.edu.gt/wp-content/uploads/2021/06/logo-intecap.png" alt="Logo" width="80" height="40" class="d-inline-block align-text-top">--->
    </a>
  </div>
</nav>


    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
        <a class="nav-link" href="index.php?action=nosotros">Nosotros <i class="fa-solid  fa-2xs"></i> </a>
        <a class="nav-link" href="index.php?action=contacto">contacto</a>

        <?php
          if(!empty($_SESSION['id']) ){//Tiene sesión activa
        ?>
          <a class="nav-link" href="index.php?action=inscripcion">Inscribir <i class="fa-solid  fa-beat fa-xs"></i> </a>
          <a class="nav-link" href="index.php?action=inscripcioncategoria">Inscribir por categoria<i class="fa-solid  fa-beat fa-xs"></i> </a>
          <a class="nav-link" href="index.php?action=verinscripcion">Ver Inscripciones</a>
          <a class="nav-link" href="index.php?action=logout">Cerrar sesión</a>
        <?php }
        else{ //No ha iniciado sesión?>
          <a class="nav-link" href="index.php?action=login">Iniciar sesión</a>
          <a class="nav-link" href="index.php?action=crearUsuarioEstudiante">Crear usuario</a>
        <?php } ?>

        

        
      </div>
    </div>
  </div>
</nav>