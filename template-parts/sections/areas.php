<?php
/**
 * Template Part: Sección Próximos Eventos.
 *
 * Renderiza el contenedor de próximos eventos. Si el plugin de eventos CIGU
 * está activo, ejecuta su shortcode; de lo contrario, muestra la maqueta base.
 *
 * @package    cigu-theme
 * @subpackage Template_Parts\Sections
 * @author     Área de Sistemas CIGU
 * @since      1.0.0
 * @link       https://developer.wordpress.org/reference/functions/do_shortcode/
 */
if(!defined('ABSPATH')){
    exit;
}
/**
 * @var bool $show_areas controla si la sección de áreas es visible.
 */
$show_areas = get_theme_mod('cigu_areas_show', true);
if(!$show_areas){
    return;
}
/**
 * @var string  $areas_title Es el título principal de la sección 
 */
$areas_title = get_theme_mod('cigu_areas_section_title', 'Nuestra Área de trabajo');
/**
 * @var array<int array<string, string>> $areas_defaults datos por defectos de las áreas
 */
$areas_defaults = array(
	1 => array(
		'icon'      => 'fa-balance-scale',
		'title'     => 'Políticas de Igualdad',
		'desc'      => 'Desarrollo e implementación de políticas institucionales para promover la igualdad de género en todos los ámbitos universitarios.',
		'link_text' => 'Ver políticas',
		'url'       => '#',
	),
	2 => array(
		'icon'      => 'fa-graduation-cap',
		'title'     => 'Formación y Capacitación',
		'desc'      => 'Programas de formación en perspectiva de género, derechos humanos y prevención de la violencia para toda la comunidad universitaria.',
		'link_text' => 'Ver programas',
		'url'       => '#',
	),
	3 => array(
		'icon'      => 'fa-hands-helping',
		'title'     => 'Prevención, Atención y Asesoría',
		'desc'      => 'Servicios de atención, asesoría y acompañamiento para personas que enfrentan situaciones de violencia o discriminación.',
		'link_text' => 'Conoce los servicios',
		'url'       => '#',
	),
);
?>
<!--Aquí comienza la sección de nuestra áreas de trabajo -->
<section class="container" aria-labelledby="areas-title">
    <div class="section-title">
        <h2 id="areas-title"><?php echo esc_html( $areas_title ); ?></h2>
    </div>
    <div class="features-grid">
        <?php
		for ( $i = 1; $i <= 3; $i++ ) :
			$icon      = get_theme_mod( "cigu_area_{$i}_icon", $areas_defaults[ $i ]['icon'] );
			$title     = get_theme_mod( "cigu_area_{$i}_title", $areas_defaults[ $i ]['title'] );
			$desc      = get_theme_mod( "cigu_area_{$i}_desc", $areas_defaults[ $i ]['desc'] );
			$link_text = get_theme_mod( "cigu_area_{$i}_link_text", $areas_defaults[ $i ]['link_text'] );
			$url       = get_theme_mod( "cigu_area_{$i}_url", $areas_defaults[ $i ]['url'] );
			?>
            <div class="feature-card">
                <div class="card-icon">
                    <i class="fas <?php echo esc_attr( $icon ); ?>" aria-hidden="true"></i>
                </div>
                <div class="card-content">
                    <h3><?php echo esc_html( $title ); ?></h3>
					<p><?php echo esc_html( $desc ); ?></p>
					<a href="<?php echo esc_url( $url ); ?>" class="card-link">
						<?php echo esc_html( $link_text ); ?> <i class="fas fa-arrow-right" aria-hidden="true"></i>
					</a>
                </div>
            </div>
            <?php endfor; ?>
    </div>
</section >