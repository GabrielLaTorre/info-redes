<?php
    
    include "../backend/comentario_service.php";
    require "../backend/articulos_crud.php";
    
    if( isset($_GET['id']) ){
        $articulo_ppal = getArticulo( $_GET['id'] )[0];
        $titulo_ppal = $articulo_ppal['titulo'];
        $contenido_ppal = $articulo_ppal['contenido'];
        $imagen_ppal = $articulo_ppal['imagen_1'];
        
    }
    


    $comentarios = getAllComments('1'); //HARDCODE POR AHORA
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info Redes | Noticia Principal</title>
    <script src="https://kit.fontawesome.com/5162fbebe5.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script> <!--Libreria Axios-->
    <link rel = "icon" href ="https://www.freeiconspng.com/uploads/information-icon-5.png" type ="image/x-icon">
    <link rel="stylesheet" href="estilos.css">
    
    <script src="js/script.js"></script>

</head>
<body>
    <!-- ######## ZONA HEADER   ######-->
    <header class="head-portada head-sticky">
        <div class="head-ppal">
            <div class="menu-responsive">
                <i class="fas fa-bars" onclick="hideWhenClick()"></i>
                
                
            </div>
            
            <div class="logo-header-noticia">
                <a href="index.php"> <img src="imagenes/PruebaLogoWhite2.png" alt="logo-header"></a>
            </div>

            <div class="head-input">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </header>
    
    <nav id="menu-lateral"  class="ocultar"> <!--Menu oculto-->
        <i class="fas fa-times" onclick="hideWhenClick()"></i>    
        <img src="imagenes/PruebaLogoWhite.png" alt="logo InfoRedes">
        <ul>
            <li><a href="index.php">Ultimas Noticias</a></li>
            <li><a href="index.php">Opiniones</a></li>
            <li><a href="index.php">Internacionales</a></li>
            <li><a href="index.php">Politica</a></li>
            <li><a href="index.php">Mundo del espectaculo</a></li>
            <li><a href="index.php">Regionales</a></li>
            <li><a href="index.php">Canal de Youtube</a></li>
        </ul>
    </nav>
    <div id="fondo" onclick="hideWhenClick()"></div> <!--para oscurecer con el fondo cuando aparece el menu-->

    <main class="main-noticia">

        <!-- ######## NOTICIA PRINCIPAL   ######-->
        <article class='noticia-ppal'>
            <h3><?php echo $titulo_ppal; ?></h3>
            
            <div class='img-principal-not'>
                <img src="<?php echo $imagen_ppal; ?>" title="titulo-noticia" alt="noticia principal">
                <span>Economy</span>
            </div>
            
            <div>
                <img class='autor-img' src="imagenes/escritor-articulo.png" title="autor-usuario" alt="autor">
                <p class="autor-nota">By <i id="autor-cel">Dakin Andone</i> and Aldona Gashi, CNN</p>
                <p class="fecha-nota">Updated 2037 GMT (0437 HKT) September 21, 2019</p>
            </div>

            <hr>

            <div class='noticia-completa'>
                <div class="head-social2">
                        <a href="https://www.facebook.com"> <img  src="imagenes/facebook.png" alt="facebook.logo"></a>
                        <a href="https://www.twitter.com"> <img  src="imagenes/twitter.png" alt="twitter.logo"></a>
                        <a href="https://www.youtube.com"><img  src="imagenes/youtube.png" alt="youtube.logo"></a>
                </div>
                <p>
                    <?php echo $contenido_ppal; ?>
                </p>
            </div>
            
            <!-- ######## FORMULARIO   ######-->
            <div class="area-comentarios" id="area-comentarios">
                <h3> Comentarios</h3>
                <hr>
                <div id="prueba"></div>
                <div class="nuevo-comentario" id="formulario-nuevo.comentario">
                    <img class="avatar" src="imagenes/anon.png" title="Usuario anónimo" alt="logo-header">
                    <div>
                        <input type="text" id="nombre" placeholder="Ingresa su nombre">    
                        <textarea id="comentario" placeholder="Déjanos tu comentario aquí ..."></textarea>
                        <button onclick="doPostComentario()">Comentar</button>
                    </div>
                </div>
                <div id="contenedor-comentarios">

                    <?php foreach($comentarios as $comentario) { ?>
                        <div class="comentario">
                            <img class="avatar" src="imagenes/anon.png" title="Usuario anónimo" alt="logo-header">
                            <div>
                                <p class="nombre-comentario"><?php echo $comentario['nombre']; ?></p>
                                <p><?php echo $comentario['comentario']; ?></p>
                            </div>
                        </div>
                    <?php } ?>
                    
                </div>
          </div>
        </article>

        <!-- ######## ZONA LATERAL   ######-->
        <aside>
            <!-- ZONA SUSCRIPCION ######-->
            <div class="banner-suscribe">
                <img src="imagenes/inforedes-onair.png" alt="logo inforedes-onair">
                <i>Suscribete ya</i>
                <hr>
                <p>Contenido premiun en todos tus dispositivos</p>
                <button onclick="location.href='formulario.html'">Suscribe!!</button>
            </div>
            <!-- ZONA NOTAS RELACIONADAS ######-->
            <div>
                <section class="aside-portada">
                    <h2>Notas Relacionadas</h2>
                    <a href="noticia.html"><h3>uJohnson & Johnson ordered to pay for fueling opioid crisis</h3></a>
                    <a href="noticia.html"><h3>Macron slams Bolsonaro's 'disrespectful' remarks about wife</h3></a>
                    <a href="noticia.html"><h3>uJohnson & Johnson ordered to pay for fueling opioid crisis</h3></a>
            
                    <h2>Ultimos Videos</h2>
                    <article>
                        <video src="video/video.mp4" muted autoplay loop></video>
                        <a href="noticia.html"><h3>uJohnson & Johnson ordered to pay for fueling opioid crisis</h3></a>
                    </article>

                    <article class="mini-video">
                        <img src="imagenes/imagen_random86x80.jpg" alt="random imagen">
                        <a href="noticia.html"><h3>uJohnson & Johnson ordered to pay for fueling opioid crisis</h3></a>
                    </article>

                    <article class="mini-video">
                        <img src="imagenes/imagen_random86x80_fj4j.jpg" alt="random imagen">
                        <a href="noticia.html"><h3>uJohnson & Johnson ordered to pay for fueling opioid crisis</h3></a>
                    </article>

                    <article class="mini-video">
                        <img src="imagenes/imagen_random86x80_ggh.jpg" alt="random imagen">
                        <a href="noticia.html"><h3>uJohnson & Johnson ordered to pay for fueling opioid crisis</h3></a>
                    </article>
                </section>
            </div>
            <!-- ZONA PUBLICIDAD ######-->
            <div class="banner-sponsor">
                <span>SPONSOR</span>
                <div>
                    <img src="imagenes/espacio-disponible-sponsor.jpg" alt="publicidad">
                </div>
            </div>
            <!-- ZONA SUSCRIPCION ######-->
            <div class="banner-suscribe">
                <img src="imagenes/inforedes-onair.png" alt="logo inforedes-onair">
                <i>Suscribete ya</i>
                <hr>
                <p>Contenido premiun en todos tus dispositivos</p>
                <button onclick="location.href='formulario.html'">Suscribe!!</button>
            </div>
        </aside>

    </main>

    <!-- ######## ZONA FOOTER   ######-->
    <footer>
    <img src="imagenes/PruebaLogoWhite.png" alt="logo InfoRedes">
    <div class="cont-listas-footer">
        <div>
            <h4>InfoRedes</h4>
            <ul>
                <li><a href="index.php"> Ultimo</a></li>
                <li><a href="index.php">Feed RSSS</a></li>
                <li><a href="index.php">Términos y condiciones</a></li>
                <li><a href="index.php">Política de Privacidad</a></li>
            </ul>
        </div>
        <div>
            <h4>Contacto</h4>
            <ul>
                <li><a href="index.php">Escribenos</a></li>
                <li><a href="index.php">Redacción</a></li>
                <li><a href="index.php">Comercial</a></li>
                <li><a href="index.php">Media Kit</a></li>
            </ul>
        </div>
        <div>
            <h4>Secciones</h4>
            <ul>
                <li><a href="index.php">Política</a></li>
                <li><a href="index.php">Economia</a></li>
                <li><a href="index.php">Deportes</a></li>
                <li><a href="index.php">Espectaculos</a></li>
            </ul>
        </div>
    </div>
    <p>Curso Webmaster profesional intensivo Equipo 1 | <a id="vamos-al-mock" href="https://www.figma.com/file/CzXaOrxLkSKEBGvEHR7dj5/Untitled?node-id=0%3A1"> Mira nuestro Mock!!</a></p>
    </footer>
    
</body>
</html>