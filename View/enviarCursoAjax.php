<?php

    use Controller\CursoController;

    $curso = new CursoController();

    //$listadoCursos = $curso->getCursos();

?>

<h1>Página de inscripción</h1>

<div class="container">

    <form method="POST">

        <div class="form-group">
            <div class="row">
                <div class="col-2"><label>Curso</label></div>
                <div class="col-10">
                    <input type="text" name="curso" id="curso">
                </div>
            </div>
        </div>

        <p id="resultado"></p>

    </form>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
let inputCurso = document.getElementById('curso');

    inputCurso.addEventListener("keyup", function (event) {
       sendData();
    });

    function sendData(){
        
    let url = "index.php?action=recibirCursoAjax";
    let formaData = new FormData();
    let input = document.getElementById("curso").value;    
    formaData.append('campo', input);

    
    fetch(url, {
    method : 'POST',
    mode:    'cors',
    body: formaData
    })
        .then(function (response){return response.text();})
        .then(function (response){let m =JSON.parse(response); console.log(m.mensaje);document.getElementById("resultado").innerHTML = m.mensaje;})
        .catch(err => console.log(err))
    }


</script>