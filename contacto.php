<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>



    <main class="contenedor seccion">
        <h1>Contacto</h1>
        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img  loading="lazy" src="build/img/destacada3.jpg " alt=" imagen de contacto">
        </picture>
        
        <h2>Llene El Formulario De Contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend> Informacion Personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu Nombre" name="nombre" id="nombre">

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" name="email" id="email">

                <label for="telefono">Telefono</label>
                <input type="number" placeholder="Tu Telefono" name="telefono" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje"></textarea>
            </fieldset>

            <fieldset>
                <legend>Informacion De La Propiedad</legend>

                <label for="opciones">Vende o Compra</label>
                <select >
                    <option value="" selected disabled> --Seleccione-- </option>
                    <option value="compra">Compra</option>
                    <option value="venta">Venta</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu Precio o Presupuesto" name="Telefono">
            </fieldset>

            <fieldset>
                <legend>Informacion de Contacto</legend>
                
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" id="contactar-telefono" name="contacto" value="telefono">
    
                    <label for="contactar-email">E-mail</label>
                    <input type="radio" id="contactar-email" name="contacto" value="email">
                </div>

                <p>Si eligió Telefono, por favor seleccione fecha y hora</p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" >

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="09:00" max="18:00" >

            </fieldset>

            <input type="submit" name="" value="Enviar" class="boton-verde">

        </form>

    </main>

<?php
    incluirTemplate('footer');
?>