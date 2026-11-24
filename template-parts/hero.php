<?php
/**
 * Template Part: Hero principal
 *
 * Renderiza la sección Hero de la página de inicio obteniendo los valores
 * configurados desde el Personalizador de WordPress.
 *
 * @package     cigu-theme
 * @subpackage  Template_Parts
 * @author      Área de Sistemas CIGU
 * @since       1.0.0
 * @link        https://developer.wordpress.org/reference/functions/get_theme_mod/
 * @var string  $bg_image URL o destino de las imágenes
 * @var string  $titulo Titulo que tiene el  baner de presentación
 * @var string  $descripcion Datos dentro del baner, breve descripcion debajo del título
 * @var string  $btn_text Texto que tiene el botón
 * @var string  $btn_url url que lleva el boton
 * @var int     $padding recibe un numero entero para modificar el padding
 */

$bg_image    = get_theme_mod('cigu_hero_bg', 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3');
$titulo      = get_theme_mod('cigu_hero_title', 'Construyendo una Universidad Igualitaria');
$descripcion = get_theme_mod('cigu_hero_desc', 'Promovemos la igualdad de género, el respeto a los derechos humanos y la erradicación de la violencia en la comunidad universitaria.');
$btn_texto   = get_theme_mod('cigu_hero_btn_text', 'Conoce nuestros programas');
$btn_url     = get_theme_mod('cigu_hero_btn_url', '#areas-title');
$padding     = get_theme_mod('cigu_hero_size', '5rem 2rem');
$hero_style = sprintf(
    "padding: %s; background: linear-gradient(rgba(49, 38, 88, 0.85), rgba(74, 61, 122, 0.9)), url('%s') center/cover;",
    esc_attr($padding),
    esc_url($bg_image)
);
?>
<section class="hero" style="<?php echo $hero_style; ?>">
    <div class="hero-content">
        <h1><?php echo esc_html($titulo); ?></h1>
        <p><?php echo esc_html($descripcion); ?></p>
        <?php if (!empty($btn_texto)) : ?>
            <div class="cta-buttons">
                <a href="<?php echo esc_url($btn_url); ?>" class="btn btn-primary">
                    <?php echo esc_html($btn_texto); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>