<?php
    require "./backend/comentario_crud.php";

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
    
    <script src="script.js"></script>
    <script src="./js/asincronos.js"></script>

</head>
<body>
    <!-- ######## ZONA HEADER   ######-->
    <header class="head-portada head-sticky">
        <div class="head-ppal">
            <div class="menu-responsive">
                <i class="fas fa-bars" onclick="hideWhenClick()"></i>
                
                
            </div>
            
            <div class="logo-header-noticia">
                <a href="index.html"> <img src="imagenes/PruebaLogoWhite2.png" alt="logo-header"></a>
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
            <li><a href="noticia.html">Ultimas Noticias</a></li>
            <li><a href="noticia.html">Opiniones</a></li>
            <li><a href="noticia.html">Internacionales</a></li>
            <li><a href="noticia.html">Politica</a></li>
            <li><a href="noticia.html">Mundo del espectaculo</a></li>
            <li><a href="noticia.html">Regionales</a></li>
            <li><a href="noticia.html">Canal de Youtube</a></li>
        </ul>
    </nav>
    <div id="fondo" onclick="hideWhenClick()"></div> <!--para oscurecer con el fondo cuando aparece el menu-->

    <main class="main-noticia">

        <!-- ######## NOTICIA PRINCIPAL   ######-->
        <article class='noticia-ppal'>
            <h3>US drone strike kills 16 civilians in Afghanistan, governor's spokesman says</h3>
            
            <div class='img-principal-not'>
                <img src="imagenes/img-noticia-ppal.jpg" title="titulo-noticia" alt="noticia principal">
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
                    <strong> ipsum dolor sit amet et delectus accommodare his</strong>             
                    copiosae legendos at vix ad putent delectus delicata usu. Vidit dissentiet eos cu eum an brute copiosae hendrerit. Eos erant dolorum an. Per facer affert ut. Mei iisque mentitum moderatius cu. Sit munere facilis accusam eu dicat falli consulatu at vis. Te facilisis mnesarchum qui posse omnium mediocritatem est cu. Modus argumentum ne qui tation efficiendi in eos. Ei mea.
                    falli legere efficiantur et tollit aliquip deb<i> mel. Lorem ipsum dolor sit amet </i>et delectus accommodare his consul copiosae legendos at vix ad putent delectus delicata usu. Vidit dissentiet eos cu eum an brute copiosae hendrerit. Eos erant dolorum an.
                    Per facer affert ut. Mei iisque mentitum moderatius cu. Sit munere facilis accusam  falli legere efficiantur et tollit aliquip debitis mei. No deseru fsdgkñg gslñsaccusam 
                </p>
                <blockquote>
                    “Ese tipos dijo cualquier cosa, esto o aquellos y lo citamos”
                    <br/>
                    <p>Alguien importante -</p>
                </blockquote>
                <p>
                    erit. Eos erant dolorum an. Per facer affert ut. Mei iisque mentitum moderatius cu. Sit munere facilis accus am eu dicat falli consulatu at vis. Te facilisis mnesarchum qui posse omnium mediocritatem est cu. Modus argumentum ne qui tation efficiendi in eos. Ei mea.
                    falli legere efficiantur <strong> tollit aliquip debitis mei. No deserunt mediocritatem mel.</strong> Lorem ipsum dolor sit amet et delectus accommodare his consul copiosae legendos at vix ad putent delectus delicata usu. Vidit dissentiet eos cu eum an brute copiosae hendrerit. Eos erant dolorum an.
                    Per facer affert ut. Mei iisque mentitum moderatius cu. Sit munere facilis accusam  <a href="noticia.html"> legere efficiantur et tollit</a> aliquip debitis mei. No deseru fsdgkñg gslñsaccusam 
                </p>
                <blockquote>
                    “Ese tipos dijo cualquier cosa, esto o aquellos y lo citamos”
                    <br/>
                    <p>Alguien importante -</p>
                </blockquote>
                <p>
                    erit. Eos erant dolorum an. Per facer affert ut. Mei iisque mentitum moderatius cu. Sit munere facilis accus am eu dicat falli consulatu at vis. Te facilisis mnesarchum qui posse omnium mediocritatem est cu. Modus argumentum ne qui tation efficiendi in eos. Ei mea.
                    falli legere efficiantur <strong> tollit aliquip debitis mei. No deserunt mediocritatem mel.</strong> Lorem ipsum dolor sit amet et delectus accommodare his consul copiosae legendos at vix ad putent delectus delicata usu. Vidit dissentiet eos cu eum an brute copiosae hendrerit. Eos erant dolorum an.
                    Per facer affert ut. Mei iisque mentitum moderatius cu. Sit munere facilis accusam  <a href="noticia.html"> legere efficiantur et tollit</a> aliquip debitis mei. No deseru fsdgkñg gslñsaccusam 
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
                                <small>Hace 2 horas</small>
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
                <li><a href="index.html"> Ultimo</a></li>
                <li><a href="index.html">Feed RSSS</a></li>
                <li><a href="index.html">Términos y condiciones</a></li>
                <li><a href="index.html">Política de Privacidad</a></li>
            </ul>
        </div>
        <div>
            <h4>Contacto</h4>
            <ul>
                <li><a href="index.html">Escribenos</a></li>
                <li><a href="index.html">Redacción</a></li>
                <li><a href="index.html">Comercial</a></li>
                <li><a href="index.html">Media Kit</a></li>
            </ul>
        </div>
        <div>
            <h4>Secciones</h4>
            <ul>
                <li><a href="index.html">Política</a></li>
                <li><a href="index.html">Economia</a></li>
                <li><a href="index.html">Deportes</a></li>
                <li><a href="index.html">Espectaculos</a></li>
            </ul>
        </div>
    </div>
    <p>Curso Webmaster profesional intensivo Equipo 1 | <a id="vamos-al-mock" href="https://www.figma.com/file/CzXaOrxLkSKEBGvEHR7dj5/Untitled?node-id=0%3A1"> Mira nuestro Mock!!</a></p>
    </footer>
    
</body>
</html>