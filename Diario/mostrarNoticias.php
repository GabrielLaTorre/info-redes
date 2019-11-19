<?php
include "conexion.php";

$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PWD, DB_DB);

$sql =  "select articulo.id, articulo.titulo, articulo.contenido, articulo.imagen_1, articulo.subtitulo, articulo.fecha, autor.nombre autor, genero.nombre genero from articulo
        inner join autor on autor_id=autor.id
        inner join genero on genero_id=genero.id ORDER BY `articulo`.`id` ASC";

$respuesta = mysqli_query($conexion, $sql);

while 	($fila = mysqli_fetch_array($respuesta)) {
        $id = $fila["id"];
				$titulo = $fila["titulo"];
				$contenido = $fila["contenido"];
        $imagen = $fila["imagen_1"];
        $autor_id = $fila["autor"];
        $sub = $fila["subtitulo"];
        $fecha = $fila["fecha"];
        $genero = $fila ["genero"];

        echo "<tbody>
              <tr>
                <td>$id</td>
                <td>$titulo</td>
                <td>$contenido</td>
                <td>$imagen</td>
                <td>$autor_id</td>
                <td>$sub</td>
                <td>$fecha</td>
                <td>$genero</td>
                <td>Borrar Editar</td>
              </tr>
        </tbody>";
        }
?>
