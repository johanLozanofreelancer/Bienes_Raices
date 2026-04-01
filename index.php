<?php
    require 'includes/funciones.php';
    incluirTemplate('header', $inicio = true);
?>


    <main class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono de Seguridad" loading="lazy">
                <h3> Seguridad</h3>
                <p> Amet neque reiciendis debitis ex ab impedit iure quasi maiores placeat, veritatis laborum quidem adipisci architecto expedita eos accusantium omnis voluptatem tempore. lore
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
    </main>

    <section class="contenedor seccion" >
        <h2>Casa y Pisos En Venta</h2>
        
        <?php

            $limite = 3;
            include 'includes/templates/anuncios.php' ;
        ?>
        <div class="ver-todas">
            <a href="anuncios.php" class="boton-verde">Ver Todas</a>
        </div>
    </section>

    <section class="imagen-contacto">
        <h2>Encuentra La Casa De Tus Sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
        <a href="contacto.html" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        <section class="blog">
            <h3>Nuestro Blog</h3>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jepg">
                        <img src="build/img/blog1.jpg" alt="imagen del Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Terraza en el Techo De Tu Casa</h4>
                        <p>Escrito el: <span>20/10/2024</span>
                        por: <span>Admin</span></p>

                        <p>
                            consejos para construir una terraza en el techo de tu casa con los mejores materiales ahorrando tu dinero
                        </p>
                    </a>

                </div>

            </article>

            <article class="entrada-blog">
                <div class="imagen">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog2.jpg" type="image/jepg">
                        <img src="build/img/blog2.jpg" alt="imagen del Blog">
                    </picture>
                </div>
                <div class="texto-entrada">
                    <a href="entrada.html">
                        <h4>Guia para la decoracion de tu hogar</h4>
                        <p>Escrito el: <span>20/10/2024</span>
                        por: <span>Admin</span></p>

                        <p>
                            Maximiza el espacio en tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio
                        </p>
                    </a>

                </div>

            </article>
        </section>

        <section class="testimoniales">
            <h3>Testimoniales</h3>
            <div class="testimonial">
                <blockquote> El personal se comportó de una excelente forma, muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas.
                </blockquote>
                <p>- Johan lozano</p>
            </div>
        </section>
    </div>

<?php
    incluirTemplate('footer');
?>