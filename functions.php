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

