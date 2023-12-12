<?php
/*
Plugin Name: Contador Hola
Description: Plugin para contar la cantidad de veces que aparece la palabra "hola" en el contenido y el título.
Version: 1.0
Author: Lucas
*/


// Función de creacion de la tabla donde guardara la cantidad de veces que aparece la palabra "hola" en el contenido y el título.
function crear_tabla_contador_hola() {
    global $wpdb;
    $nombre_tabla = $wpdb->prefix . 'contador_hola';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE IF NOT EXISTS $nombre_tabla (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        titulo varchar(50) NOT NULL,
        contenido varchar(50) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

// Funcion que añade cantidad de veces que aparece la palabra "hola" en el contenido y el título.
function insertar_contador_hola($titulo, $contenido) {
    global $wpdb;
    $nombre_tabla = $wpdb->prefix . 'contador_hola';
$wpdb->query("INSERT INTO $nombre_tabla (titulo, contenido) VALUES ('$titulo', '$contenido')");

}

// Funcion que muestra la cantidad de veces que aparece la palabra "hola" en la parte unferio de la publicacion de wordpress.
function mostrar_contador_hola() {
    global $wpdb;
    $nombre_tabla = $wpdb->prefix . 'contador_hola';
    $resultados = $wpdb->get_results( "SELECT * FROM $nombre_tabla" );
    echo '<h3>Contador de Hola</h3>';
    echo '<table>';
    echo '<tr>';
    echo '<th>Titulo</th>';
    echo '<th>Contenido</th>';
    echo '</tr>';
    foreach ( $resultados as $fila ) {
        echo '<tr>';
        echo '<td>' . $fila->titulo . '</td>';
        echo '<td>' . $fila->contenido . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}
//para content
add_filter( 'the_content', 'insertar_contador_hola' );
add_filter( 'the_content', 'mostrar_contador_hola');
add_filter( 'the_content', 'crear_tabla_contador_hola');

//para title
add_action( 'the_title', 'insertar_contador_hola' );
add_action( 'the_title', 'mostrar_contador_hola');
add_action( 'the_title', 'crear_tabla_contador_hola');
