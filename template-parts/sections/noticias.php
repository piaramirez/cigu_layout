<?php 
/**
 * Template Part: Carrucel de destacados
 *
 * Renderiza el carrucel de la página de inicio obteniendo los valores
 * configurados desde el Personalizador de WordPress.
 *
 * @package    cigu-theme
 * @subpackage Template_Parts\Sections
 * @author     Área de Sistemas CIGU
 * @since      1.0.0
 * @link       https://developer.wordpress.org/reference/functions/get_theme_mod/
 */

$section_title = get_theme_mod('cigu_carousel_section_title', 'Actividades Destacadas');
$defaults = array(
    1 => array(
        'img'   => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1200&q=80',
        'tag'   => 'Noticia',
        'title' => 'Foro: Mujeres en la Ciencia 2026',
        'desc'  => 'Investigadoras de la UNAM compartirán experiencias y retos para cerrar la brecha de género en STEM.',
        'ulr'   => '#',
    ),
    2 => array(
        'img'   => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1200&q=80',
        'tag'   => 'Curso',
        'title' => 'Nuevo curso: Lenguaje Inclusivo',
        'desc'  => 'Inscripciones abiertas para la comunidad UNAM. Modalidad híbrida y con constancia oficial.',
        'ulr'   => '#',
    ),
    3 => array(
        'img'   => 'https://images.unsplash.com/photo-1590650153855-d9e808231d41?auto=format&fit=crop&w=1200&q=80',
        'tag'   => 'Publicación',
        'title' => 'Violeta y Oro: nueva edición',
        'desc'  => 'Ya está disponible el número más reciente de nuestra revista sobre igualdad de género.',
        'url'   => '#',
    ),
);