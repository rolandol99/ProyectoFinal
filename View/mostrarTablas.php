<?php
    use Controller\CategoriaController;  //importo el controlador
    $categoria = new CategoriaController(); //creo el objeto
?>
<link href="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.css" rel="stylesheet">
 
 <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>

<table id="example" class="table cell-border" width="100%"></table>  <!--- estilo de la tabla --->

<script type="text/javascript">
    let dataCategorias = <?php echo json_encode($categoria->mostrar()); ?>;
                                    //{"id":1 , "categoria": "Cocina"}
                                    //{"id":2 , "categoria": "mecánica"}
                                    //{"id":3 , "categoria": "Soldadura"}

    let data = [];//Guardar los items  //declaro un array
    //dataCategorias.forEach((element)=>data.push( element.categoria , element.id));

    for(let i=0; i<dataCategorias.length;i++){
        data.push([dataCategorias[i].id ,dataCategorias[i].categoria]);
        // enviando los datos al array de js -> [1][Cocina], [2][Mecanica]
    }

    
    let table = new DataTable('#example', {
        columns:[
            {title: 'Id'},
            {title: 'Categoria'}
        ],
        data: data//Colocando los valores de la BD
    });

   // var rowNode = table/*Para agregar valores manualmente*/
   // .row.add( [ 100, 'Testing' ] )
  //  .draw()
  //  .node();
</script>