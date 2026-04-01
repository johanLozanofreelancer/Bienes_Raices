<?php
    require '../../includes/app.php';

    use App\Propiedad;

    estaAutenticado();

    $db = conectarDB();

    // consultar para obtener datos de los vendedores
    $consulta = " SELECT * FROM vendedores ";
    $resultado = mysqli_query ($db, $consulta); 


    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = "";
    $precio = "";
    $descripcion = "";
    $imagen = '';
    $habitaciones = "";
    $wc = "";
    $estacionamiento = "";
    $vendedores_id = "";
    $creado = date('Y/m/d');

    //Ejecuta el codigo despues de que se envia el formulario

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $propiedad = new Propiedad($_POST);

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
        if (!$imagen['name'] || $imagen['error']){
            $errores[] = 'la imagen es obligatoria';
        }

        $medida = 1000 * 4000;
        if ($imagen ['size'] > $medida) {
            $errores[] = 'la imagen es demasiado pesada';
        }


        //Insertar en la Base de Datos si el array   de errores esta vacio
        if (empty ($errores)) {

            $carpetaImagen = '../../imagenes/';

            if ( !is_dir($carpetaImagen)) {
                mkdir($carpetaImagen);
            }

            $nombreImagen = md5( uniqid( rand(), true ) ) . '.jpg' ;

            move_uploaded_file($imagen['tmp_name'], $carpetaImagen . $nombreImagen );


           
            $resultado = mysqli_query($db, $query);
            if($resultado) { 
                header('Location: /admin?resultado=1');
            }

        }

    }



    incluirTemplate('header');
?>




    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde"> Volver </a>

        <?php foreach($errores as $error) : ?>
            <div class="alerta error">
                 <?php echo $error; ?> 
            </div>
        <?php endforeach; ?>
            




    </main>

    <form  class="formulario contenedor" method="POST" action="/admin/propiedades/crear.php" enctype="multipart/form-data">
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
            
            <select name="vendedor_id">
                <option value="" selected disabled>--Seleccione--</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resultado)) : ?>
                    <option  <?php echo $vendedores_id === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> <?php echo $vendedor['nombre'] . " " . $vendedor['apellido'] ?> </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>

<?php
    incluirTemplate('footer');
?>
<?php
    require '../../includes/funciones.php';
    incluirTemplate('header');
?>