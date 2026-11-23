<?php
/** 
 ** Plantilla principal. Desde aquí se manda a llamar la información que se verá
**/

get_header();
?>
<!-- Aqui viene la mágia, aqui es dónde tenemos que meter mucha cabeza para ver como crear las áreas que se editarán. zizizi -->
<main id="main-content">
    <?php get_template_part('template-parts/hero'); ?>
</main>
<?php 
get_footer();
?>