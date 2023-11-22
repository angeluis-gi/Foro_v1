<?php
function usuarioOk($usuario, $contraseña) :bool {
   return (strlen($usuario) >= 8 && strrev($usuario) == $contraseña);
}

function detallesComentario($comentario):array {
   //convertimos string en array separado por palabras (espacios)
   $comentario = explode(" ",$comentario);
   $detalles = [];

   //numero de palabras
   $detalles[0] = count($comentario);

   //palabra mas repetida
   //creamos un nuevo array que cuente cada instancia de cada elemento
   $palabra = array_count_values($comentario);
   //ordenamos por valor de forma descendente
   arsort($palabra);
   //mostramos la primera posicion del array (es el elemento con el conteo mas alto)
   $detalles[1] = array_keys($palabra)[0];

   //letra mas repetida
   //transformamos el array en string (implode) y una vez mas en array (str_split), esta vez separando por caracter
   $comentario = str_split(implode($comentario));
   //creamos un nuevo array que cuente cada instancia de cada elemento
   $letra = array_count_values($comentario);
   arsort($letra);
   $detalles[2] = array_keys($letra)[0];

   return $detalles;
}

function limpiarEntrada (&$cadena){
   $cadena = htmlspecialchars($cadena);
}