<?php


require "includes/config/databases.php";
$db = conectarDB();

$errores = [];

if ($_SERVER["REQUEST_METHOD"] === 'POST'){

    $email = mysqli_real_escape_string($db,  filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL) ) ;
    $password = mysqli_real_escape_string($db,  $_POST['password']) ;

    if (!$email) {
        $errores[] = 'El Email es obligatorio o no es valido';
    }
    if (!$password) {
        $errores[] = 'El Password es obligatorio';
    }
    if (empty($errores) ){
        $query = "SELECT * FROM usuarios WHERE email = '{$email}'";
        $resultado = mysqli_query($db, $query);
    
        if ( $resultado->num_rows) {
            $usuario = mysqli_fetch_assoc($resultado);
            
            $auth = password_verify($password, $usuario['password']);

            if($auth) {
                session_start();

                //llenar el arreglo de la sesion

                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: /admin');

            }else{
                $errores [] = 'el password es incorrecto';
            }
        } else {
            $errores[] = 'el usuario no existe';
        };
    };  



    // echo '<pre>';
    // var_dump($errores);
    // echo '</pre>';
}
    require 'includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesión</h1>

        <?php foreach ($errores as $error ) :?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach;?>

        <form method="POST" class="formulario">
            <fieldset>
                <legend> Email y Password</legend>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" name="email" id="email" required>

                <label for="password">Password</label>
                <input type="password" placeholder="Tu Password" name="password" id="password" required>

                <input type="submit" value="Iniciar Sesión" class="boton boton-verde">
            </fieldset>
        </form>

    </main>

<?php
    incluirTemplate('footer');
?>