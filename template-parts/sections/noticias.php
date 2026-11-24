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

//Noas permite ver si la secciómn está activa o no
$show_carousel = get_theme_mod('cigu_carousel_show', true);
if(!$show_carousel){
    return;
}
// Nos permite obtener las configuraciones
$section_title  = get_theme_mod('cigu_carousel_section_title', 'Actividades Destacadas');
$max_width      = absint(get_theme_mod('cigu_carousel_width', 900)) ?: 900 ;
$img_height     = absint(get_theme_mod('cigu_carousel_height',320)) ?: 320;
$object_fit     = get_theme_mod('cigu_carousel_fit', 'cover');
$slides_count   = absint(get_theme_mod('cigu_carousel_count',3));   
$slides_count   = max(1, min(10, $slides_count));

// Posicion para las felchas 
$btn_top =  round($img_height / 2);

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
        <div class="carousel" id="newsCarousel" style="max-width: <?php echo esc_attr($max_width); ?>px;" role="region" aria-roledescription="carrusel" aria-label="<?php echo esc_attr($section_title); ?>" tabindex="0">
            <div class="carousel-track" id="carouselTrack">
                <?php for ($i = 1; $i <= $slides_count; $i++) :
                    $def_img   = isset($defaults[$i]) ? $defaults[$i]['img'] : '';
                    $def_tag   = isset($defaults[$i]) ? $defaults[$i]['tag'] : 'Actividad';
                    $def_title = isset($defaults[$i]) ? $defaults[$i]['title'] : "Actividad Destacada $i";
                    $def_desc  = isset($defaults[$i]) ? $defaults[$i]['desc'] : '';
                    $def_url   = isset($defaults[$i]) ? $defaults[$i]['url'] : '#';
                    $img   = get_theme_mod("cigu_slide_{$i}_img", $def_img);
                    $tag   = get_theme_mod("cigu_slide_{$i}_tag", $def_tag);
                    $title = get_theme_mod("cigu_slide_{$i}_title", $def_title);
                    $desc  = get_theme_mod("cigu_slide_{$i}_desc", $def_desc);
                    $url   = get_theme_mod("cigu_slide_{$i}_url", $def_url);
                ?>
                    <article class="carousel-slide" role="group" aria-roledescription="diapositiva" aria-label="<?php echo esc_attr("$i de $slides_count"); ?>">
                        <div class="slide-image" style="height: <?php echo esc_attr($img_height); ?>px;">
                            <?php if (!empty($img)) : ?>
                                <a href="<?php echo esc_url($url); ?>" tabindex="-1" style="display: block; width: 100%; height: 100%;">
                                    <img src="<?php echo esc_url($img); ?>"
                                         alt="<?php echo esc_attr($title); ?>"
                                         style="object-fit: <?php echo esc_attr($object_fit); ?>;"
                                         loading="lazy">
                                </a>
                            <?php endif; ?>
                            <?php if (!empty($tag)) : ?>
                                <span class="slide-tag"><?php echo esc_html($tag); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="slide-content">
                            <h3><?php echo esc_html($title); ?></h3>
                            <?php if (!empty($desc)) : ?>
                                <p><?php echo esc_html($desc); ?></p>
                            <?php endif; ?>
                            <a href="<?php echo esc_url($url); ?>" class="card-link">
                                Leer más <i class="fas fa-arrow-right" aria-hidden="true"></i>
                                <span class="sr-only"> sobre <?php echo esc_html($title); ?></span>
                            </a>
                        </div>
                    </article>
                <?php endfor; ?>
            </div>
            <?php if ($slides_count > 1) : ?>
                <button class="carousel-btn prev" style="top: <?php echo esc_attr($btn_top); ?>px;" aria-label="Noticia anterior">
                    <i class="fas fa-chevron-left" aria-hidden="true"></i>
                </button>
                <button class="carousel-btn next" style="top: <?php echo esc_attr($btn_top); ?>px;" aria-label="Siguiente noticia">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                </button>
                <div class="carousel-dots" id="carouselDots" role="tablist" aria-label="Seleccionar noticia">
                    <?php for ($i = 1; $i <= $slides_count; $i++) : ?>
                        <button class="dot <?php echo $i === 1 ? 'active' : ''; ?>"
                                role="tab"
                                aria-selected="<?php echo $i === 1 ? 'true' : 'false'; ?>"
                                aria-label="<?php echo esc_attr("Noticia $i"); ?>"
                                <?php if ($i === 1) echo 'aria-current="true"'; ?>></button>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>