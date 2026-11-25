<?php
/**
 * 
 * 
 */

if(!defined('ABSPATH')){
    exit;
}
$show_resources = get_theme_mod('cigu_resources_show', true);
// valida que desde editar se mande a llamar la visibilidad de la seccion
if(! $show_resources){
    return;
}
//Mandamos a llamar los datos para mostrar en la sección 
$resources_title    = get_theme_mod('cigu_resources_section_title', 'Recursos Descargables');
$btn_more_text      = get_theme_mod('cigu_resources_btn_text', 'Ver más recursos descargables');
$btn_more_url       = get_theme_mod('cigu_resources_btn_url', '#');
/**
 * @var array<int, array<string, string>>   $resources_default Datos iniciales de las 3 cards de los recursos
 */
$resources_defaults = array(
	1 => array(
		'icon'     => 'fa-file-pdf',
		'title'    => 'Guía de Lenguaje Inclusivo',
		'desc'     => 'Recomendaciones para el uso de lenguaje inclusivo en comunicaciones institucionales y documentos académicos.',
		'btn_text' => 'Descargar PDF',
		'url'      => '#',
	),
	2 => array(
		'icon'     => 'fa-book',
		'title'    => 'Protocolo de Atención a la Violencia',
		'desc'     => 'Protocolo institucional para la prevención, atención y sanción de casos de violencia de género en la UNAM.',
		'btn_text' => 'Descargar PDF',
		'url'      => '#',
	),
	3 => array(
		'icon'     => 'fa-chart-bar',
		'title'    => 'Informe Estadístico 2023',
		'desc'     => 'Datos estadísticos sobre igualdad de género, participación y casos atendidos en la comunidad universitaria.',
		'btn_text' => 'Descargar PDF',
		'url'      => '#',
	),
);
?>
<!-- Recursos Descargables -->
<section class="resources-container" aria-labelledby="recursos-title">
	<div class="container">
		<div class="section-title">
			<h2 id="recursos-title"><?php echo esc_html( $resources_title ); ?></h2>
		</div>
		<div class="resources-grid">
			<?php
			for ( $i = 1; $i <= 3; $i++ ) :
				$icon     = get_theme_mod( "cigu_resource_{$i}_icon", $resources_defaults[ $i ]['icon'] );
				$title    = get_theme_mod( "cigu_resource_{$i}_title", $resources_defaults[ $i ]['title'] );
				$desc     = get_theme_mod( "cigu_resource_{$i}_desc", $resources_defaults[ $i ]['desc'] );
				$btn_text = get_theme_mod( "cigu_resource_{$i}_btn_text", $resources_defaults[ $i ]['btn_text'] );
				$url      = get_theme_mod( "cigu_resource_{$i}_url", $resources_defaults[ $i ]['url'] );
				?>
				<div class="resource-card">
					<div class="resource-icon">
						<i class="fas <?php echo esc_attr( $icon ); ?>" aria-hidden="true"></i>
					</div>
					<h3><?php echo esc_html( $title ); ?></h3>
					<p><?php echo esc_html( $desc ); ?></p>
					<a href="<?php echo esc_url( $url ); ?>" class="download-btn" aria-label="<?php echo esc_attr( "Descargar $title en PDF" ); ?>">
						<i class="fas fa-download" aria-hidden="true"></i> <?php echo esc_html( $btn_text ); ?>
					</a>
				</div>
			<?php endfor; ?>
		</div>
		<?php if ( ! empty( $btn_more_text ) ) : ?>
			<div style="text-align: center; margin-top: 2.5rem;">
				<a href="<?php echo esc_url( $btn_more_url ); ?>" class="btn btn-primary">
					<?php echo esc_html( $btn_more_text ); ?>
				</a>
			</div>
		<?php endif; ?>
	</div>
</section>