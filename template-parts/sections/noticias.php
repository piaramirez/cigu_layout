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
 * 
 */

$section_title = get_theme_mod('cigu_carousel_section_title', 'Actividades Destacadas');
$defaults = array(
    1 => array(
        'img'   => 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1200&q=80',
        'tag'   => 'Noticia',
        'title' => 'Foro: Mujeres en la Ciencia 2026',
        'desc'  => 'Investigadoras de la UNAM compartirán experiencias y retos para cerrar la brecha de género en STEM.',
        'url'   => '#',
    ),
    2 => array(
        'img'   => 'https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1200&q=80',
        'tag'   => 'Curso',
        'title' => 'Nuevo curso: Lenguaje Inclusivo',
        'desc'  => 'Inscripciones abiertas para la comunidad UNAM. Modalidad híbrida y con constancia oficial.',
        'url'   => '#',
    ),
    3 => array(
        'img'   => 'https://images.unsplash.com/photo-1590650153855-d9e808231d41?auto=format&fit=crop&w=1200&q=80',
        'tag'   => 'Publicación',
        'title' => 'Violeta y Oro: nueva edición',
        'desc'  => 'Ya está disponible el número más reciente de nuestra revista sobre igualdad de género.',
        'url'   => '#',
    ),
);
?>
<!-- Carrucel de Actividades destacadas -->
 <section class="news-carousel-section" aria-labelledby="noticias-title">
    <div class="container">
        <div class="section-title">
            <h2 id="noticias-title"><?php echo esc_html($section_title); ?></h2>
        </div>
        <div class="carousel" id="newsCarousel" role="region" aria-roledescription="carrusel" aria-label="Actividades destacadas" tabindex="0">
            <div class="carousel-track" id="carouselTrack">
                <?php for ($i = 1; $i <= 3; $i++) :
                    $img   = get_theme_mod("cigu_slide_{$i}_img", $defaults[$i]['img']);
                    $tag   = get_theme_mod("cigu_slide_{$i}_tag", $defaults[$i]['tag']);
                    $title = get_theme_mod("cigu_slide_{$i}_title", $defaults[$i]['title']);
                    $desc  = get_theme_mod("cigu_slide_{$i}_desc", $defaults[$i]['desc']);
                    $url   = get_theme_mod("cigu_slide_{$i}_url", $defaults[$i]['url']);
                ?>
                    <article class="carousel-slide" role="group" aria-roledescription="diapositiva" aria-label="<?php echo esc_attr("$i de 3"); ?>">
                        <div class="slide-image">
                            <a href="<?php echo esc_url($url); ?>" tabindex="-1">
                                <img src="<?php echo esc_url($img); ?>"
                                     alt="<?php echo esc_attr($title); ?>" width="1200" height="320" loading="lazy">
                            </a>
                            <?php if (!empty($tag)) : ?>
                                <span class="slide-tag"><?php echo esc_html($tag); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="slide-content">
                            <h3><?php echo esc_html($title); ?></h3>
                            <p><?php echo esc_html($desc); ?></p>
                            <a href="<?php echo esc_url($url); ?>" class="card-link">
                                Leer más <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                <span class="sr-only"> sobre <?php echo esc_html($title); ?></span>
                            </a>
                        </div>
                    </article>
                <?php endfor; ?>
            </div>
            <button class="carousel-btn prev" aria-label="Noticia anterior"><i class="fas fa-chevron-left" aria-hidden="true"></i></button>
            <button class="carousel-btn next" aria-label="Siguiente noticia"><i class="fas fa-chevron-right" aria-hidden="true"></i></button>
            <div class="carousel-dots" id="carouselDots" role="tablist" aria-label="Seleccionar noticia">
                <button class="dot active" role="tab" aria-selected="true" aria-label="Noticia 1" aria-current="true"></button>
                <button class="dot" role="tab" aria-selected="false" aria-label="Noticia 2"></button>
                <button class="dot" role="tab" aria-selected="false" aria-label="Noticia 3"></button>
            </div>
        </div>
    </div>
</section>