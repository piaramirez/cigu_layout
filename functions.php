
/**
* Funciones y configuración principal del la CIGU Theme
* https://developer.wordpress.org/reference/functions/wp_enqueue_style/
**/
<?php

if(!define('ABSPATH')){
    exit;
}

/**
 * Esta funcion crea las configuraciones básicas de la plantilla
 * ligas de las funciones que ocupas:
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 * 
 */
function cigu_theme_setup(){

    add_theme_support('title-tag');


}
# Registers the style if source provided (does NOT overwrite) and enqueues.
wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');