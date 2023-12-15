<br>
<h1>Bienvenidos al sitio web.</h1>


<?php
    if(!empty($_SESSION['usuario'])){
        echo "
        <h4>
        Usuario: 
            <strong> {$_SESSION['nombres']} {$_SESSION['apellidos']} </strong>
        </h4>
        ";
    }
    
?>

