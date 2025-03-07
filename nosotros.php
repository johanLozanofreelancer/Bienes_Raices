<?php
    require 'includes/funciones.php';
    incluirTemplate('header');
?>




    <main class="contenedor seccion">
        <h1> Conoce Sobre Nosotros</h1>
        <div class="contenido-nosotros">

            <picture class="imagen">
                <source srcset="build/img/nosotros.webp" type="image/webp">
                <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                <img loading="lazy" src="build/img/nosotros.jpg" alt="imagen de nosotros">
            </picture>

            <div class="texto-nosotros">
                <blockquote>
                    25 Años de experiencia 
                </blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti sequi aliquid veniam explicabo eos suscipit, cupiditate cum incidunt quam sed aperiamProin consequat viverra sapien, malesuada tempor tortor feugiat vitae. In dictum felis et nunc aliquet molestie. Proin tristique commodo felis, sed auctor elit auctor pulvinar. Nunc porta, nibh quis convallis sollicitudin, arcu nisl semper mi, vitae sagittis lorem dolor non risus. Vivamus accumsan maximus est, eu mollis mi. Proin id nisl vel odio semper hendrerit. Nunc porta in justo finibus tempor. </p>
                <p> Repellendus deserunt nisi, fugit porro minima nemo autem quia neque! Eaque quod quibusdam velit distinctio nihil enim dignissimos vero dolorem illo quas!quae recusandae consequuntur hic doloribus? Nemo nesciunt quo amet.</p>
                
            </div>
        </div>        
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono de Seguridad" loading="lazy">
                <h3> Seguridad</h3>
                <p> Amet neque reiciendis debitis ex ab impedit iure quasi maiores placeat, veritatis laborum quidem adipisci architecto expedita eos accusantium omnis voluptatem tempore.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono de Precio" loading="lazy">
                <h3>Precio</h3>
                <p> Amet neque reiciendis debitis ex ab impedit iure quasi maiores placeat, veritatis laborum quidem adipisci architecto expedita eos accusantium omnis voluptatem tempore.
                </p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono de Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p> Amet neque reiciendis debitis ex ab impedit iure quasi maiores placeat, veritatis laborum quidem adipisci architecto expedita eos accusantium omnis voluptatem tempore.
                </p>
            </div>

        </div>  <!--.iconos-nosotros-->
    </section>


<?php
    incluirTemplate('footer');
?>