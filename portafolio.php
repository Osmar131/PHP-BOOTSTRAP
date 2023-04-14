<?php include("cabecera.php"); ?>

<br/>

<div class="container">
    <div class="row">
        <?php // primer columna ?>
        <div class="col-md-6">
            
            <div class="card">
                <div class="card-header">
                    Datos del proyecto
                </div>
                <div class="card-body">

                    <form action="portafolio.php" method="post">
                        Nombre del proyecto: <input class="form-control" type="text" name="nombre" id="">
                        <br/>
                        Imagen del proyecto: <input class="form-control" type="file" name="archivo" id="">
                        <br/>  
                        <input class="btn btn-success" type="submit" value="Enviar proyecto">

                    </form>
                
                </div>
            </div>

        </div>
        <?php // segunda columna ?>
        <div class="col-md-6">
            
            <div class="table">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="">
                            <td scope="row">3</td>
                            <td>Aplicación web</td>
                            <td>Imagen.jpg</td>
                        </tr>
                        <tr class="">
                            <td scope="row">Item</td>
                            <td>Item</td>
                            <td>Item</td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
        
    </div>
</div>


<?php include("pie.php"); ?>