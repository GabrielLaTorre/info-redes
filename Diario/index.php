<?php

    require '../backend/articulos_crud.php';
    require '../backend/autor_crud.php';
    
    //Llamaremos esta funcion para entregar los articulos de a uno por vez
    $listaArticulos = getArticulo();
    $articulo=[];
    $id="";
    $titulo="";
    $subtitulo="";
    $img="";
    
    $nombre_autor ="";
    $foto_autor ="";


    
    function siguienteArticulo(){ 
        global $contador;
        global $listaArticulos;
        global $articulo;
        global $id;
        global $titulo;
        global $subtitulo;
        global $img;
        global $genero;
        global $nombre_autor;
        global $foto_autor;
		
        $tamaño = count( $listaArticulos );
        static $contador =-1;	
        $contador++;
        if( !isset($listaArticulos[$contador]) ){
            $contador = 0;
        }
       
        $articulo = $listaArticulos[ $contador ];
        $id=$articulo['id'];
        $titulo=substr( $articulo['titulo'] , 0 , 60 );
        $subtitulo = $articulo['subtitulo'];
        
        $genero = $articulo['genero'];

        
        $img = $articulo['imagen_1']; 
        if(substr($img ,0 ,4)!="http"){
            $img = "./imagenes/" . $img;
        }

        $autor = getAutor( $articulo['autor_id'] )[0];
        $nombre_autor = $autor['nombre'];
        $foto_autor = $autor['foto'];

    }

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>InfoRedes | Diario digital</title>
    <script src="https://kit.fontawesome.com/5162fbebe5.js" crossorigin="anonymous"></script>
    <link rel = "icon" href ="https://www.freeiconspng.com/uploads/information-icon-5.png" type ="image/x-icon">
    <link rel="stylesheet" href="estilos.css">
    <script src="js/script.js"></script>
    <!--Libreria Axios-->
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

</head>
<body>
    <!-- ########           ZONA HEADER-PORTADA             ######-->
    <header class="head-portada">
        <div class="head-ppal head-info">
            <div>
                11 de Octubre de 2019
            </div>

            <div>
                Compra $53,00 | Venta $57,00
            </div>

            <div>
                20° Capital Federal
            </div>

            <div class="head-input head-info">
                <input type="text" id="buscar" placeholder="Buscar">
                <label for="buscar"><i class="fas fa-search"></i></label>
            </div>
        </div>

        <div class="head-social head-info">
            <a href="https://www.facebook.com"> <img  src="imagenes/facebook.png" alt="facebook.logo"></a>
            <a href="https://www.twitter.com"> <img  src="imagenes/twitter.png" alt="twitter.logo"></a>
            <a href="https://www.youtube.com"><img  src="imagenes/youtube.png" alt="youtube.logo"></a>
        </div>

        <div class="head-ppal head-responsive">
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

    <!--Menu Hamburguesa-->
    <nav id="menu-lateral"  class="ocultar"> <!--Menu oculto-->
        <i class="fas fa-times" onclick="hideWhenClick()"></i>    
        <img src="imagenes/PruebaLogoWhite.png" alt="logo InfoRedes">
        <ul>
            <li><a href="#">Ultimas Noticias</a></li>
            <li><a href="#">Opiniones</a></li>
            <li><a href="#">Internacionales</a></li>
            <li><a href="#">Politica</a></li>
            <li><a href="#">Mundo del espectaculo</a></li>
            <li><a href="#">Regionales</a></li>
            <li><a href="#">Canal de Youtube</a></li>
        </ul>
    </nav>
    <div id="fondo" onclick="hideWhenClick()"></div> <!--para oscurecer con el fondo cuando aparece el menu-->



    <!-- ########            ZONA NAV                        ######-->
    <nav class="nav-portada">
        
        <div class="logo-portada">					
            <img src="imagenes/PruebaLogo2.png" alt="logo">		
        </div>						
                                
        <hr class="nav-line">					
                            
        <div class="nav-list">					
            <ul>						
                <li><a href="#">NACIONAL</a></li>			
                <li><a href="#">MUNDO</a></li>			
                <li><a href="#">DEPORTES</a></li>			
                <li><a href="#">TECNOLOGÍA</a></li>			
                <li><a href="#">ECONOMÍA</a></li>			
                <li><a href="#">SALUD</a></li>				
                <li><a href="#">CLIMA</a></li>				
            </ul>						
        </div>

    </nav>


    <!-- ########       ZONA SECTION-PORTADA (BANNER CENTRAL INTERACTIVO)       ######-->
    <section class="section-portada">
        
        <div class="imagenes-chica">
            <?php
                siguienteArticulo();
                echo "
                    <div>
                        <a href='noticia.php?id=$id'><img src='$img' alt='trumpbolsonaro'></a>
                        <span>$genero</span>
                        <h3>$titulo</h3>
                    </div>        
                    ";

                siguienteArticulo();
                echo "
                    <div>
                        <a href='noticia.php?id=$id'><img src='$img' alt='trumpbolsonaro'></a>
                        <span>$genero</span>
                        <h3>$titulo</h3>
                    </div>        
                    ";
                
                    siguienteArticulo();
                    echo "
                        <div>
                            <a href='noticia.php?id=$id'><img src='$img' alt='trumpbolsonaro'></a>
                            <span>$genero</span>
                            <h3>$titulo</h3>
                        </div>        
                        ";
            ?>
            
            
            
            
        
        </div>
        
        <div class="imagen-grande">
            <?php 

                echo "
                    <a href='noticia.php?id=$id'><img src='$img' alt='trumpbolsonaro' id='img-grande'></a>
                    <a href='noticia.php?id=$id'><h2>$titulo</h2></a>    
                ";

            ?>
            
        </div>

    </section>  


    <!-- ########           ZONA MAIN-PORTADA (NOTICIAS EN CARDS)       ######-->
    <main class="main-portada">

        <h2>Economia</h2>

        <hr>
        <div class="contenedor-main">
            <div class="main-izq">

                <div class="cards-uno">

                    <?php

                    siguienteArticulo();
                    echo "
                            <article class='card-small'>
                                <a href='noticia.php?id=$id'>
                                    <img src='$img' alt='tecnologia'>
                                    <h3>
                                        $titulo
                                    </h3>
                                </a>
                                <span>$genero</span>
                            </article>
                        ";

                    siguienteArticulo();
                    echo "
                            <article class='card-small'>
                                <a href='noticia.php?id=$id'>
                                    <img src='$img' alt='tecnologia'>
                                    <h3>
                                        $titulo
                                    </h3>
                                </a>
                                <span>$genero</span>
                            </article>
                        ";

                    siguienteArticulo();
                    echo "
                            <article class='card-small'>
                                <a href='noticia.php?id=$id'>
                                    <img src='$img' alt='tecnologia'>
                                    <h3>
                                        $titulo
                                    </h3>
                                </a>
                                <span>$genero</span>
                            </article>
                        ";
                            
                    ?>
                    
                
				</div>
				
					<?php 

					siguienteArticulo();
					echo "
							<article class='card-large'>
								<div class='container-large'>
									<div class='card-enlace'>
										<img src='$img' alt='varias1'>
									</div>
								
									<div class='text-card'>
										<a href='noticia.php?id=$id'>
											<h2>$titulo</h2>
											<p>
												$subtitulo
											</p>
										</a>
									</div>
								</div>
							
								<span>
									$genero
								</span>
							</article>
						";

						
					siguienteArticulo();
					echo "
							<article class='card-large'>
								<div class='container-large'>
									<div class='card-enlace'>
										<img src='$img' alt='varias1'>
									</div>
								
									<div class='text-card'>
										<a href='noticia.php?id=$id'>
											<h2>$titulo</h2>
											<p>
												$subtitulo
											</p>
										</a>
									</div>
								</div>
							
								<span>
									$genero
								</span>
							</article>
						";

					?>

					
            </div>

            <aside class="aside-portada">
                <h2>Otras Relacionadas</h2>
                <?php 
                
                    siguienteArticulo();
                    echo "<a href='noticia.php?id=$id'><h3>$titulo</h3></a>";
                   
                    siguienteArticulo();
                    echo "<a href='noticia.php?id=$id'><h3>$titulo</h3></a>";

                    siguienteArticulo();
                    echo "<a href='noticia.php?id=$id'><h3>$titulo</h3></a>";

                    siguienteArticulo();
                    echo "<article class='mini-noticia'>
                            <a href='noticia.php?id=$id'><img src='$img' alt='varias3'></a>
                            <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                          </article>";

                    siguienteArticulo();
                    echo "<a href='noticia.php?id=$id'><h3>$titulo</h3></a>";
                    
                    siguienteArticulo();
                    echo "<a href='noticia.php?id=$id'><h3>$titulo</h3></a>";
            

                   
                ?>
                
            </aside>
        </div>
    </main>
    

    
    <!-- ########           ZONA OPINION     ######-->
    <section class="opinion">
                
        <h2>OPINIÓN</h2>  
                
        <div class="contenedor-cards">

            <?php
            
            siguienteArticulo();
            echo "
                    <article class='card-opinion'>
                            <a href='noticia.php?id=$id'>
                                <img src='imagenes/$foto_autor' alt='rostro autor'>
                            </a>
                            <div>
                                <h3><a href='noticia.php?id=$id'>$titulo</a></h3>
                                <p><a href='noticia.php?id=$id'>$nombre_autor</a></p>
                            </div>
                    </article>
                ";

            siguienteArticulo();
            echo "
                    <article class='card-opinion'>
                            <a href='noticia.php?id=$id'>
                                <img src='imagenes/$foto_autor' alt='rostro autor'>
                            </a>
                            <div>
                                <h3><a href='noticia.php?id=$id'>$titulo</a></h3>
                                <p><a href='noticia.php?id=$id'>$nombre_autor</a></p>
                            </div>
                    </article>
                ";

            siguienteArticulo();
            echo "
                    <article class='card-opinion'>
                            <a href='noticia.php?id=$id'>
                                <img src='imagenes/$foto_autor' alt='rostro autor'>
                            </a>
                            <div>
                                <h3><a href='noticia.php?id=$id'>$titulo</a></h3>
                                <p><a href='noticia.php?id=$id'>$nombre_autor</a></p>
                            </div>
                    </article>
                ";

            ?>
            

    </section>

    
    <!-- ########           ZONA MEDIA (CANAL DE YOUTUBE)           ####-->
    <section class="media">
        
        <img src="imagenes/youtube-logo-largo.png" alt="logo youtube">
        <div class="media-contenedor">
            <div>
                <h3>El Heavy-Rock mas vivo que nunca</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius possimus veniam debitis tenetur cupiditate sit, numquam nisi suscipit facilis tempore ipsum et saepe expedita id qui! Eum voluptatem dolorum labore!</p>
                <button>
                    <i class="fab fa-youtube"></i>
                    <span>Subscribe</span>
                </button>
            </div>
            <video class="video-canal" src="video/video.mp4" autoplay muted controls></video>
        </div>

    </section>

    <!-- ####### ZONA NOTICIAS VARIAS    ######-->
    <div class="contenedor-noticias">
        <section class="hora">
            <h2>Ultima Hora</h2>
            <hr>
            <?php

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><img src='$img' alt='Noticias1'></a>
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";
           
            ?>
        </section>

        <section class="hora no-show">
            <h2>Penultima Hora</h2> 
            <hr>
            <?php

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><img src='$img' alt='Noticias1'></a>
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";
           
            ?>
        </section>

        <section class="hora no-show">
            <h2>Otra Hora</h2>
            <hr>
            <?php

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><img src='$img' alt='Noticias1'></a>
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";

            siguienteArticulo();
            echo "
                    <a href='noticia.php?id=$id'><h3>$titulo</h3></a>
                    <hr>
                ";
           
            ?>
        </section>
    </div>


    <!-- ########           ZONA FOOTER   ######-->
    <footer>
        
        <img src="imagenes/PruebaLogoWhite.png" alt="logo InfoRedes">
        <div class="cont-listas-footer">
            <div>
                <h4>InfoRedes</h4>
                <ul>
                    <li><a href="noticia.php"> Ultimo</a></li>
                    <li><a href="noticia.php">Feed RSSS</a></li>
                    <li><a href="noticia.php">Términos y condiciones</a></li>
                    <li><a href="noticia.php">Política de Privacidad</a></li>
                </ul>
            </div>
    

            <div>
                <h4>Contacto</h4>
                <ul>
                    <li><a href="noticia.php">Escribenos</a></li>
                    <li><a href="noticia.php">Redacción</a></li>
                    <li><a href="noticia.php">Comercial</a></li>
                    <li><a href="noticia.php">Media Kit</a></li>
                </ul>
            </div>
    
            <div>
                <h4>Secciones</h4>
                <ul>
                    <li><a href="noticia.php">Política</a></li>
                    <li><a href="noticia.php">Economia</a></li>
                    <li><a href="noticia.php">Deportes</a></li>
                    <li><a href="noticia.php">Espectaculos</a></li>
                </ul>
            </div>
        </div>
        <p>Curso Webmaster profesional intensivo Equipo 1 | <a id="vamos-al-mock" href="https://www.figma.com/file/CzXaOrxLkSKEBGvEHR7dj5/Untitled?node-id=0%3A1"> Mira nuestro Mock!!</a></p>
        <button onclick="funcionLoca()"> CONSUMIR API DE NOTICIAS ALEATORIAS </button>
    </footer>

</body>
</html>