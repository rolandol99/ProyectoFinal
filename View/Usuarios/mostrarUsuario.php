<?php
use Controller\UsuarioController;

$usuarios = new UsuarioController;
$listado = $usuarios->mostrarU();
?>

<!DOCTYPE html>
<html lang="es"> <!-- Cambiado a español -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS</title>
    
    <!-- Agrega las dependencias de DataTable -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
    
    <!-- Agrega el archivo de idioma en español para DataTable -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/plug-ins/1.11.5/i18n/Spanish.json"></script>
</head>
<body>
<form method="POST" action="">
        <div class="alert alert alert-dismissible alert-primary" role="alert">
            <h6 class="letra-negra"> <?php echo "Usuario:  ". $_SESSION['nombres'] . " " . $_SESSION['apellidos']; ?> </h6>
        </div>
        <div>
            <br>
            <h4>LISTADO DE USUARIOS</h4>
            <a href="index.php?action=pdfUsuario" class="btn btn-sm btn-primary">
                <button type="button" class="btn btn-sm btn-primary">Descargar PDF</button>
            </a>
        </div>
        <br>
<table class="table mt-3" id="tabla">
    <thead>
        <tr class="table-primary">
            <th scope="row">ID</th>
            <td>NOMBRES</td>
            <td>APELLIDOS</td>
            <td>USUARIO</td>
            <td>ROL</td>
            <td>ACCION</td>
            <td>ACCION</td>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($listado as $row => $item) : ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo isset($item['nombres']) ? $item['nombres'] : ''; ?></td>
                <td><?php echo isset($item['apellidos']) ? $item['apellidos'] : ''; ?></td>
                <td><?php echo $item['usuario']; ?></td>
                <td><?php echo $item['rol']; ?></td>
                
                <td><a href='index.php?action=editarUsuario&idusuario=<?php echo $item['id']; ?>'><button type="button" class="btn btn-warning">Editar</button></a></td>
                <td><a href='index.php?action=eliminarUsuario&idusuario=<?php echo $item['id']; ?>'><button type="button" class="btn btn-danger">Eliminar</button></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script >
    var tabla= document.querySelector("#tabla");

    var dataTable = new DataTable(tabla);
</script>
</body>
</html>
