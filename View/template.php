<?php
require_once('autoload.php');
use Controller\PaginaController;
    $capturaEnlace = new PaginaController();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página que maneja enlaces</title>
    <!--<meta http-equiv="Content-Security-Policy" content="default-src 'self'"> -->
    
    <link rel="stylesheet" href="View/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f31d6f48e7.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/intro.js@7.2.0/intro.min.js"></script>
    <link href=" https://cdn.jsdelivr.net/npm/intro.js@7.2.0/minified/introjs.min.css " rel="stylesheet">
 
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>


    <style>
         .letra-negra{
            color:black;
            text-align: center;
         }
    </style>
</head>
<body>

    <?php require_once("navbar.php"); ?>

    <div class="container">
        <?php
            $capturaEnlace->enlacesPagina();
        ?>
    </div>
<!-- Agrega el enlace al script de Bootstrap al final del body -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

