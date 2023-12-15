<?php
use Controller\UsuarioController;

    //if(!empty($_SESSION['id']) ){//VALIDACIÓN, OBLIGATORIO INICIO DE SESION

$usuarioController = new UsuarioController;
$listado = $usuarioController->mostrarU();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Alumnos</title>

</head>
<body>  
<BR></BR>
<h4 >LISTADO USUARIOS:</h4>
<a href="index.php?action=repAlumnos">pdf</a>
<br>
<table class="table mt-3" id="tabla">
    <thead>
        <tr class="table-primary" >
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
        <?php foreach($listado as $row => $item) : ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['nombres']; ?></td>
                <td><?php echo $item['apellidos']; ?></td>
                <td><?php echo $item['usuario']; ?></td>
                <td><?php echo $item['rol']; ?></td>

                <td><a href='index.php?action=editarUsuario&idalumno=<?php echo $item['id']; ?>'><button type="button" class="btn btn-warning">Editar</button></a></td>
                <td><a href='index.php?action=eliminarUsuario&idalumno=<?php echo $item['id']; ?>'><button type="button" class="btn btn-danger">Eliminar</button></a></td>

                    
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
