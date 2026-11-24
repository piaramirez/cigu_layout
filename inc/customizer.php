<?php
/**
 * Configuraciones del Personalizador de WordPress (Customizer).
 *
 * Registra las secciones, ajustes y controles editables del tema.
 *
 * @package    cigu-theme
 * @subpackage Includes
 * @since      1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registra las secciones, ajustes y controles del tema en el Personalizador de WordPress.
 *
 * Configura la sección del banner principal (Hero) permitiendo modificar la imagen
 * de fondo, título, descripción, botón de acción, altura del contenedor y vista previa
 * mediante Selective Refresh.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Instancia del gestor del Personalizador de WordPress.
 * @return void
 */
function cigu_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'cigu_hero_section',
		array(
			'title'       => __( 'Banner principal', 'cigu-theme' ),
			'description' => __( 'Área para poder editar la imagen y textos', 'cigu-theme' ),
			'priority'    => 25,
		)
	);

	$wp_customize->add_setting(
		'cigu_hero_bg',
		array(
			'default'           => 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-4.0.3',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'cigu_hero_bg',
			array(
				'label'   => __( 'Imagen de fondo del banner', 'cigu-theme' ),
				'section' => 'cigu_hero_section',
			)
		)
	);

	$wp_customize->add_setting(
		'cigu_hero_title',
		array(
			'default'           => 'Construyendo una Universidad Igualitaria',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cigu_hero_title',
		array(
			'label'   => __( 'Título principal', 'cigu-theme' ),
			'section' => 'cigu_hero_section',
			'type'    => 'text',
		)
	);

	$wp_customize->add_setting(
		'cigu_hero_desc',
		array(
			'default'           => 'Promovemos la igualdad de género, el respeto a los derechos humanos y la erradicación de la violencia en la comunidad universitaria.',
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);
	$wp_customize->add_control(
		'cigu_hero_desc',
		array(
			'label'   => __( 'Descripción', 'cigu-theme' ),
			'section' => 'cigu_hero_section',
			'type'    => 'textarea',
		)
	);

	$wp_customize->add_setting(
		'cigu_hero_btn_text',
		array(
			'default'           => 'Conoce nuestros programas',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cigu_hero_btn_text',
		array(
			'label'       => __( 'Texto del botón', 'cigu-theme' ),
			'description' => __( 'Déjalo vacío si quieres ocultar el botón.', 'cigu-theme' ),
			'section'     => 'cigu_hero_section',
			'type'        => 'text',
		)
	);

	$wp_customize->add_setting(
		'cigu_hero_btn_url',
		array(
			'default'           => '#areas-title',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'cigu_hero_btn_url',
		array(
			'label'   => __( 'Enlace (URL) del botón', 'cigu-theme' ),
			'section' => 'cigu_hero_section',
			'type'    => 'url',
		)
	);

	$wp_customize->add_setting(
		'cigu_hero_size',
		array(
			'default'           => '5rem 2rem',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		'cigu_hero_size',
		array(
			'label'   => __( 'Altura / Tamaño del Banner', 'cigu-theme' ),
			'section' => 'cigu_hero_section',
			'type'    => 'select',
			'choices' => array(
				'3rem 2rem'  => 'Compacto (Pequeño)',
				'5rem 2rem'  => 'Normal (Diseño original)',
				'8rem 2rem'  => 'Grande',
				'11rem 2rem' => 'Extra Grande (Pantalla amplia)',
			),
		)
	);

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'cigu_hero_title',
			array(
				'selector' => '.hero-content',
			)
		);
	}

	// ============================================================
	// Sección de Carrucel o actvidades destacadas
	// ============================================================

	$wp_customize->add_section('cigu_carousel_section', array(
		'title'			=> __('Carrusel para actividades destacadas', 'cigu-theme'),	
		'description'	=> __('Puedes editar las 3 imágenes, los textos, títulos, links, y etiqueta', 'cigu-theme'),
		'priority'		=> 26,
	));

	$wp_customize->add_setting('cigu_carousel_section_title', array(
			'default'				=> 'Carrusel',
			'sanitize_callback'		=> 'sanitize_text_field',
	));

	$wp_customize->add_control('cigu_carousel_section_title', array(
			'label'		=> __('Titulo de la sección', 'cigu-theme'),
			'section'	=> 'cigu_carousel_section',
			'type'		=> 'text',
	));

	$slide_defaults = array(
		1 => array(
			'img'		=> 'https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1200&q=80',
			'tag'		=> 'Noticias',
			'title'		=> 'Foro Muejeres en la Ciencia 2026',
			'desc'		=> 'Investigadoras de la UNAM compartirán experiencias y retos para cerrar la brecha de género en STEM.',
            'url'   	=> '#',
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

	for($i = 1; $i <= 3; $i++){
		$wp_customize->add_setting("cigu_slide_{$i}_img", array(
			'default'				=> $slide_defaults[$i]['img'],
			'sanitize_callback'		=> 'esc_url_raw',
		));
		$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "cigu_slide_{$i}_img", array(
			'label' 		=>	sprintf(__("Diapositiva %d etiqueta", "cigu-theme"),$i),
			'section' 		=>	'cigu_carousel_section',
		)));
	}

}
add_action( 'customize_register', 'cigu_customize_register' );

