<?php
/**
 * 
 */

if(!defined('ABSPATH')){
    exit;
}
// valida que desde editar se mande a llamar la visibilidad de la sección
$show_sumate = get_theme_mod('cigu_sumate_show', true);
if(!$show_sumate){
    return;
}
// Creamos las variables que mandan a llamar la info
$sumate_title = get_theme_mod('cigu_sumate_title', 'Quieres formar parte de la CIGU?');
$sumate_desc  = get_theme_mod('cigu_sumate_desc',  'Súmate a nuestro becariado, servicio social y voluntariado para construir juntas y juntos una universidad más igualitaria.');
$sumate_btn   = get_theme_mod('cigu_sumate_btn_text', 'Súmate');  
$sumate_url   = get_theme_mod('cigu_sumate_btn_url', '#');
?>
<!-- Súmate -->
<section class="sumate-section" aria-labelledby="sumate-title">
	<div class="sumate-content">
		<h2 id="sumate-title"><?php echo esc_html( $sumate_title ); ?></h2>
		<p><?php echo esc_html( $sumate_desc ); ?></p>
		<?php if ( ! empty( $sumate_btn ) ) : ?>
			<a href="<?php echo esc_url( $sumate_url ); ?>" class="btn-sumate">
				<?php echo esc_html( $sumate_btn ); ?> <i class="fas fa-arrow-right" aria-hidden="true"></i>
			</a>
		<?php endif; ?>
	</div>
</section>

