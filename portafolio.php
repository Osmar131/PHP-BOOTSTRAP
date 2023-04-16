<?php include("cabecera.php"); ?>
<?php include("conexion.php"); ?>

<?php

if($_POST){

    // esta instrución print_r es para imprimir en pantalla las variables, y no es necesario
    // print_r($_POST);

    // se recibe el nombre de archivo y se guarda en variable nombre para su guardado en base MYSQL
    $nombre=$_POST['nombre']; // se sustituye en la variable imagen en la instrucción donde se agrega a MYSQL...
    $descripcion=$_POST['descripcion'];
    $imagen=$_FILES['archivo']['name'];

    // se llama a fecha para agregar al archivo que se guardara
    $fecha=new DateTime();
    //esta variable contendra el nombre del archivo original + la fecha en milisegundos
    $imagen=$fecha->getTimestamp()."_".$_FILES['archivo']['name'];
    // se almacena en variable temporal la imágen que se guardara en carpeta local
    $imagen_temporal=$_FILES['archivo']['tmp_name'];
    // se guarda en carpeta definida previamente el archivo que se sube a base de datos
    move_uploaded_file($imagen_temporal,"tifs/".$imagen);

    $objConexion=new conexion();
    $sql="INSERT INTO `proyectos` (`id`, `nombre`, `imagen`, `descripcion`) VALUES (NULL, '$nombre', '$imagen', '$descripcion');";
    $objConexion->ejecutar($sql);

}
// sección de eliminación de imagen y registro proporcionados en plataforma
if($_GET){
    // DELETE FROM proyectos WHERE `proyectos`.`id` = 3"
    $id=$_GET['borrar'];
    $objConexion=new conexion();

    $imagen=$objConexion->consultar("SELECT imagen FROM `proyectos` WHERE id=".$id);
    unlink("tifs/".$imagen[0]['imagen']);

    $sql="DELETE FROM proyectos WHERE `proyectos`.`id` =".$id;
    $objConexion->ejecutar($sql);
}

// esta parte consulta los datos almacenados en MYSQL
$objConexion=new conexion();
$proyectos=$objConexion->consultar("SELECT * FROM `proyectos`");

// print_r($proyectos);


?>

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

                    <form action="portafolio.php" method="post" enctype="multipart/form-data" >
                        Nombre del proyecto: <input class="form-control" type="text" name="nombre" id="">
                        <br/>
                        Imagen del proyecto: <input class="form-control" type="file" name="archivo" id="">
                        <br/>
                        <textarea class="form-control" name="descripcion" id="" cols="30" rows="10"></textarea>
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
                            <td>ID</td>
                            <td>Nombre</td>
                            <td>Imagen</td>
                            <td>Descripción</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($proyectos as $proyecto){ ?>
                        <tr>
                            <td><?php echo $proyecto['id'] ?></td>
                            <td><?php echo $proyecto['nombre'] ?></td>
                            <td>
                                <img width="100" src="tifs/<?php echo $proyecto['imagen'] ?>" alt=""></td>
                            <td><?php echo $proyecto['descripcion'] ?></td>
                            <td><a class="btn btn-danger" href="?borrar=<?php echo $proyecto['id'] ?>" >Eliminar</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
        
    </div>
</div>


<?php include("pie.php"); ?>