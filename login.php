<?php
session_start();
if($_POST){
    if(($_POST['usuario']=="elMajinbu") && ($_POST['contrasenia']=='elBabidi')){

        $_SESSION['usuario']="elMajinbu";
        
        header("location:index.php");

    }else{
        // alerta tipo javascript
        echo "<script> alert('Susuario o contraseña no son correctos');</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
            <br/>
                <div class="card">
                    <div class="card-header">
                        Inciar sesión
                    </div>
                    <div class="card-body">
                            <form action="login.php" method="post">
                                Usuario: <input class="form-control" type="text" name="usuario" id="">
                                <br/>
                                Contraseña: <input class="form-control" type="password" name="contrasenia" id="">
                                <br/>
                                <button class="btn btn-success" type="submit">Entrar al portafolio</button>
                            </form>
                    </div>
                    <div class="card-footer text-muted">
                    
                    </div>
                </div>

            </div>

            <div class="col-md-4">

            </div>
        </div>

    </div>



</body>

</html>