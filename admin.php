<?php
session_start();
?>
<?php
include 'database.php';
?>
<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <title>Libreria DP</title>
        <link rel="stylesheet" href="css/login.css">
    </head>

    <body style="background-image: url(imagenes/fondo.jpg); background-repeat: initial;">

        <div class="container" >
            <section id="content">
                <form action="admin.php" method="post">
                    <h1>LOGIN</h1>
                    <div>
                        <input type="text" placeholder="Usuario" required="" name="username" />
                    </div>
                    <div>
                        <input type="password" placeholder="Contraseña" required="" name="password" />
                    </div>
                    <div>
                        <input type="submit" value="Entrar" />
                        

                    </div>
                </form><!-- form -->
                <div class="button">

                </div><!-- button -->
            </section><!-- content -->
        </div><!-- container -->


        <script src="js/index.js"></script>

    </body>
</html>
<?php
$username = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['username'])))));
$password = mysqli_real_escape_string($mysqli, stripslashes(strip_tags(htmlspecialchars(trim($_POST['password'])))));

if (!ctype_alnum($username) OR ! ctype_alnum($password)) {
    
} else {

    $query = mysqli_query($mysqli, "SELECT * FROM usuario WHERE usuario='$username' AND clave='$password'")
            or die('error' . mysqli_error($mysqli));
    $rows = mysqli_num_rows($query);

    if ($rows > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['usuario']  = $data['usuario'];
       // header("Location: gestionadmin.php?module=start");
        echo '<script> window.location.href= "gestionadmin.php";</script>';
    } else {
        echo '<script> alert("Usuario o contraseña incorrecta");</script>';
    }
}
?>
