<?php

if(!defined('ABSPATH')){
    exit;
}

/**
 * Esta funcion crea las configuraciones básicas de la plantilla
 * ligas de las funciones que ocupas:
 * https://developer.wordpress.org/reference/functions/add_theme_support/
 * https://developer.wordpress.org/reference/functions/register_nav_menus/
 * 
 */
function cigu_theme_setup(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo', array(
        'height' => 60,
        'width'  => 60,
        'flex-height' => true,
        'flex-width'  => true
    ));

    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    #registe_nav_menus permite registar dónde estaran ubicados nuestros menus
    register_nav_menus(array(
        'primary' => __('Menú Principal Header', 'cigu-theme'),
        'footer'  => __('Menú Enlaces Rápidos Footer', 'cigu-theme')
    ));
}
add_action('after_setup_theme', 'cigu_theme_setup');

/**
 * Esta función nos permite cargar la hoja de estilos y el js
 * https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 * https://developer.wordpress.org/reference/functions/get_template_directory/
 * https://developer.wordpress.org/reference/functions/get_template_directory_uri/
 * https://developer.wordpress.org/reference/functions/wp_enqueue_script/
 */
function cigu_enqueue_assets(){
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
        array(),
        '6.4.0'
    );

    $css_path = get_template_directory() . '/assets/css/main.css';
    wp_enqueue_style(
        'cigu-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array('font-awesome'),
        file_exists($css_path) ? filemtime($css_path): '1.0.0'
    );

    $js_path = get_template_directory() . '/assets/js/main.js';
    wp_enqueue_script(
        'cigu-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        file_exists($js_path) ? filemtime($js_path): '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'cigu_enqueue_assets');

# Se manda a llamar el archivo dónde nos permite modificar el Baner Principal
require_once get_template_directory() . '/inc/hero-metabox.php';