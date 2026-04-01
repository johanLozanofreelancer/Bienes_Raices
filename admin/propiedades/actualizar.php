<?php

    require '../../includes/app.php';
    $auth = estaAutenticado();

    if(!$auth) {
        header ('Location: /');
    }


    // validar la URL por id valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id) {
        header('location: /admin');
    }



    $db = conectarDB();

    //consulta para obtener los datos de propiedad

    $consulta = " SELECT * FROM propiedades WHERE id = {$id} ";
    $resultado = mysqli_query($db, $consulta);
    $propiedades = mysqli_fetch_assoc($resultado);

    // consultar para obtener datos de los vendedores
    $consulta = " SELECT * FROM vendedores ";
    $resultado = mysqli_query ($db, $consulta);


    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = $propiedades['titulo'];
    $precio = $propiedades['precio'];
    $descripcion = $propiedades['descripcion'];
    $habitaciones = $propiedades['habitaciones'];
    $wc = $propiedades['wc'];
    $estacionamiento = $propiedades['estacionamiento'];
    $vendedores_id = $propiedades['vendedores_id'];
    $creado = date('Y/m/d');
    $imagenPropiedad = $propiedades['imagen'];


    //Ejecuta el codigo despues de que se envia el formulario

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";

        //  echo "<pre>";
        //  var_dump($_FILES);
        //  echo "</pre>";

        $titulo = mysqli_real_escape_string($db,  $_POST['titulo'] );
        $precio = mysqli_real_escape_string($db,  $_POST['precio'] );
        $descripcion = mysqli_real_escape_string($db,  $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string($db,  $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string($db,  $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string($db,  $_POST['estacionamiento'] );
        $vendedores_id = mysqli_real_escape_string($db,  $_POST['vendedor'] );
        $creado = date('Y/m/d');

        $imagen = $_FILES['imagen'];


        if(!$titulo) {
            $errores[] = 'Debes añadir un titulo a tu propiedad';
        };
        if (!$precio) {
            $errores[] = 'Debes añadir un precio';
        };
        if (strlen($descripcion) < 100 ) {
            $errores[] = 'Debes añadir una descripcion de al menos 100 caracteres';
        };
        if (!$habitaciones) {
            $errores[] = 'Debes añadir el numero de habitaciones';
        };
        if (!$wc) {
            $errores[] = 'Debes añadir el numero de baños';
        };
        if (!$estacionamiento) {
            $errores[] = 'Debes añadir el numero de estacionamientos';
        };
        if (!$vendedores_id) {
            $errores [] = 'Debes asignar la venta a un vendedor';
        };


        $medida = 1000 * 4000;
        if ($imagen ['size'] > $medida) {
            $errores[] = 'la imagen es demasiado pesada';
        }


        //Insertar imagen y el query en la Base de Datos si el array   de errores esta vacio
        if (empty ($errores)) {

              //crear carpeta
            $carpetaImagen = '../../imagenes/';

            if ( !is_dir($carpetaImagen)) {
                mkdir($carpetaImagen);
            }
            
            $nombreImagen = '';
                

            if ($imagen['name']){   
                unlink($carpetaImagen . $propiedades['imagen']);  
                
  
                // Generar un nombre unico
                $nombreImagen = md5( uniqid( rand(), true ) ) . '.jpg' ;

                //subir la imagen
                move_uploaded_file($imagen['tmp_name'], $carpetaImagen . $nombreImagen );
                    
            }else {
                $nombreImagen =  $propiedades['imagen'];
            }    


            $query = " UPDATE propiedades SET  titulo = '{$titulo}', precio = '{$precio}', imagen = '{$nombreImagen}', descripcion = '{$descripcion}', habitaciones = {$habitaciones}, wc = {$wc}, estacionamiento = {$estacionamiento}, vendedores_id = {$vendedores_id} WHERE id = {$id} ";

            // echo $query;


            $resultado = mysqli_query($db, $query);
            if($resultado) { 
                header('location: /admin?resultado=2');
            }

        }

    }



    incluirTemplate('header');
?>




    <main class="contenedor seccion">
        <h1>Actualizar propiedad</h1>

        <a href="/admin" class="boton boton-verde"> Volver </a>

        <?php foreach($errores as $error) : ?>
            <div class="alerta error">
                 <?php echo $error; ?> 
            </div>
        <?php endforeach; ?>
            




    </main>

    <form  class="formulario contenedor" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion General</legend>

            <label for="titulo">Titulo:</label>
            <input 
                type="text" 
                id="titulo" 
                name="titulo" 
                placeholder="Titulo Propiedad" 
                value="<?php echo $titulo ?>">

            <label for="precio">Precio:</label>
            <input 
                type="number" 
                id="precio" 
                name="precio" 
                placeholder="Precio Propiedad" 
                value="<?php echo $precio ?>">
 
            <label for="imagen">Imagen: </label>
            <input 
                type="file" 
                id="imagen" 
                accept="image/jpeg , image/png"
                name="imagen">
            
            <img src="/imagenes/<?php echo $imagenPropiedad; ?>" alt="imagen propiedad" class="imagen-small">
                

            <label for="descripcion"> Descripcion:</label>
            <textarea id="descripcion" name="descripcion"> <?php echo $descripcion ?> </textarea>

        </fieldset>

        <fieldset>
            <legend>Informacion de la Propiedad</legend>

            <label for="habitaciones">Habitaciones: </label>
            <input 
                type="number" 
                id="habitaciones" 
                name="habitaciones" 
                min="1" 
                max="9" 
                placeholder="Ej: 3" 
                value="<?php echo $habitaciones ?>">

            <label for="wc">Baños: </label>
            <input 
                type="number" 
                id="wc" 
                name="wc" 
                min="1" 
                max="9" 
                placeholder="Ej: 3" 
                value="<?php echo $wc ?>">

            <label for="estacionamiento">Estacionamiento: </label>
            <input 
                type="number" 
                id="estacionamiento" 
                name="estacionamiento" 
                min="1" 
                max="9" 
                placeholder="Ej: 3" 
                value="<?php echo $estacionamiento ?>">

        </fieldset>

        <fieldset>
            <legend>Vendedor</legend>
            
            <select name="vendedor">
                <option value="" selected disabled>--Seleccione--</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option  <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?> </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>

<?php
    incluirTemplate('footer');
?>
<?php
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>