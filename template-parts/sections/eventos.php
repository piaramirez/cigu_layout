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

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<!-- Próximos Eventos -->
<section class="container" aria-labelledby="eventos-title">
	<div class="section-title">
		<h2 id="eventos-title">Próximos Eventos</h2>
	</div>

	<?php if ( shortcode_exists( 'cigu_eventos' ) ) : ?>
		<?php echo do_shortcode( '[cigu_eventos limit="3"]' ); ?>
	<?php else : ?>
		<div class="events-container">
			<div class="event-card">
				<div class="event-date"><i class="far fa-calendar-alt" aria-hidden="true"></i> 15 Ago 2026 | 10:00 AM</div>
				<div class="event-content">
					<h3>Taller: Lenguaje Inclusivo en el Ámbito Académico</h3>
					<div class="event-meta">
						<div><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Sala de Conferencias, Torre II</div>
						<div><i class="fas fa-user" aria-hidden="true"></i> Dra. Laura Martínez</div>
						<div><i class="fas fa-clock" aria-hidden="true"></i> Duración: 2 horas</div>
					</div>
					<p>Taller práctico sobre el uso del lenguaje inclusivo en documentos académicos, comunicación institucional y espacios educativos.</p>
					<a href="#" class="event-link">Registrarse <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="event-card">
				<div class="event-date"><i class="far fa-calendar-alt" aria-hidden="true"></i> 22 Ago 2026 | 4:00 PM</div>
				<div class="event-content">
					<h3>Conferencia: Masculinidades Positivas</h3>
					<div class="event-meta">
						<div><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Auditorio Ho Chi Minh</div>
						<div><i class="fas fa-user" aria-hidden="true"></i> Dr. Carlos Mendoza</div>
						<div><i class="fas fa-clock" aria-hidden="true"></i> Duración: 1.5 horas</div>
					</div>
					<p>Análisis de los modelos de masculinidad y su impacto en las relaciones interpersonales y la cultura organizacional.</p>
					<a href="#" class="event-link">Registrarse <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="event-card">
				<div class="event-date"><i class="far fa-calendar-alt" aria-hidden="true"></i> 5 Sep 2026 | 11:00 AM</div>
				<div class="event-content">
					<h3>Foro: Mujeres en la Ciencia</h3>
					<div class="event-meta">
						<div><i class="fas fa-map-marker-alt" aria-hidden="true"></i> Sala de Usos Múltiples, Ciencias</div>
						<div><i class="fas fa-user" aria-hidden="true"></i> Panel de Investigadoras</div>
						<div><i class="fas fa-clock" aria-hidden="true"></i> Duración: 2.5 horas</div>
					</div>
					<p>Diálogo sobre los desafíos y oportunidades para las mujeres en carreras científicas y tecnológicas.</p>
					<a href="#" class="event-link">Registrarse <i class="fas fa-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div style="text-align: center; margin-top: 2.5rem;">
		<a href="#" class="btn btn-primary">Ver todos los eventos</a>
	</div>
</section>