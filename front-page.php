<?php
/**
 * Plantilla de la Página de Inicio (Front Page).
 *
 * En esta página se manda a llamar el esqueleto principal:
 * desde el Header, las secciones editables (Hero, Carrusel, Áreas) y el Footer.
 *
 * @package cigu-theme
 * @author  Área de Sistemas CIGU
 * @since   1.0.0
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 * @link    https://developer.wordpress.org/reference/functions/get_header/
 * @link    https://developer.wordpress.org/reference/functions/get_template_part/
 * @link    https://developer.wordpress.org/reference/functions/get_footer/
 */
get_header();
?>
<!-- Aqui viene la mágia, aqui es dónde tenemos que meter mucha cabeza para ver como crear las áreas que se editarán. zizizi -->
<main id="main-content">
    <?php get_template_part('template-parts/hero'); 
          get_template_part('template-parts/sections/noticias');
          get_template_part('template-parts/sections/areas');
          get_template_part('template-parts/sections/eventos');
          get_template_part('template-parts/sections/recursos');
    ?>
    
</main>
<?php 
get_footer();
?>