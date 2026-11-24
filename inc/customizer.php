<?php
/**
 * Configuraciones del Personalizador de WordPress (Customizer).
 *
 * Registra las secciones, ajustes y controles editables del tema.
 *
 * @package    	cigu-theme
 * @subpackage 	Includes
 * @author      Área de Sistemas CIGU
 * @since      	1.0.0
 * @link 		https://developer.wordpress.org/themes/classic-themes/customize-api/customizer-objects/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Registra las secciones, ajustes y controles del tema en el Personalizador de WordPress.
 *
 * Configura la sección del banner principal (Hero)	 permitiendo modificar la imagen
 * también permite modificar la sección de carrucel
 * de fondo, título, descripción, botón de acción, altura del contenedor y vista previa
 * mediante Selective Refresh.
 *
 * @since 1.0.0
 *
 * @param WP_Customize_Manager $wp_customize Instancia del gestor del Personalizador de WordPress.
 * @return void
 */
function cigu_customize_register( $wp_customize ) {
	// add_ Section nos permite crear o añadir la sección en la parte del menú lateral
	$wp_customize->add_section(
		'cigu_hero_section',
		array(
			'title'       => __( 'Banner principal', 'cigu-theme' ),
			'description' => __( 'Área para poder editar la imagen y textos', 'cigu-theme' ),
			'priority'    => 25,
		)
	);
	//Nos permite traer la imagen que está por defecto para posteriormente poderla editar
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
	// Nos trae el título para poder editarlos
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
	// Nos trae la descripción para después poder editarla
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
	// Nos permite editar el texto del botón
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
	// Nos permite editar la url del botón
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
	// Nos permite editar el tamaño de la imagen o baner
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
	// Muestra el lapicito cute y dice como es que cargará o refrescará la información
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
	
	// add_section crea la sección en el menú lateral de editar
	$wp_customize->add_section('cigu_carousel_section', array(
		'title'			=> __('Carrusel para actividades destacadas', 'cigu-theme'),	
		'description'	=> __('Puedes editar las imágenes, los textos, títulos, links, y etiqueta', 'cigu-theme'),
		'priority'		=> 26,
	));
	//Nos permite editar la visibilidad del carrusel
	 $wp_customize->add_setting('cigu_carousel_show', array(
        'default'           => true,
        'sanitize_callback' => 'rest_sanitize_boolean',
    ));
    $wp_customize->add_control('cigu_carousel_show', array(
        'label'   => __('Mostrar sección de Carrusel en el Inicio', 'cigu-theme'),
        'section' => 'cigu_carousel_section',
        'type'    => 'checkbox',
    ));
	// Nos permite editar si queremos editar el título
	$wp_customize->add_setting('cigu_carousel_section_title', array(
			'default'				=> 'Carrusel',
			'sanitize_callback'		=> 'sanitize_text_field',
	));
	$wp_customize->add_control('cigu_carousel_section_title', array(
			'label'		=> __('Titulo de la sección', 'cigu-theme'),
			'section'	=> 'cigu_carousel_section',
			'type'		=> 'text',
	));
	// Nos permite editar el ancho del carrucel 
	$wp_customize->add_setting('cigu_carousel_width', array(
        'default'           => 900,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('cigu_carousel_width', array(
        'label'       => __('Ancho máximo del Carrusel (px)', 'cigu-theme'),
        'description' => __('Por defecto: 900px (en pantallas móviles se adapta al 100%).', 'cigu-theme'),
        'section'     => 'cigu_carousel_section',
        'type'        => 'number',
        'input_attrs' => array('min' => 400, 'max' => 1400, 'step' => 10),
    ));
	// Nos permite editar largo del carrucel 
	$wp_customize->add_setting('cigu_carousel_height', array(
        'default'           => 320,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('cigu_carousel_height', array(
        'label'       => __('Altura de las imágenes (px)', 'cigu-theme'),
        'description' => __('Por defecto: 320px. Súbelo a 450 o 550 si subes carteles verticales.', 'cigu-theme'),
        'section'     => 'cigu_carousel_section',
        'type'        => 'number',
        'input_attrs' => array('min' => 180, 'max' => 800, 'step' => 10),
    ));
	// Ajuste de las imágenes al conetendeo
	$wp_customize->add_setting('cigu_carousel_fit', array(
        'default'           => 'cover',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('cigu_carousel_fit', array(
        'label'   => __('Ajuste de las imágenes (Object Fit)', 'cigu-theme'),
        'section' => 'cigu_carousel_section',
        'type'    => 'select',
        'choices' => array(
            'cover'   => 'Cover (Llenar todo el recuadro - Ideal para fotos)',
            'contain' => 'Contain (Mostrar imagen completa sin cortar - Ideal para carteles)',
            'fill'    => 'Fill (Estirar imagen al tamaño del recuadro)',
        ),
    ));
	// Cantidad de diapositivas permitidas
	$wp_customize->add_setting('cigu_carousel_count', array(
        'default'           => 3,
        'sanitize_callback' => 'absint',
    ));
    $wp_customize->add_control('cigu_carousel_count', array(
        'label'       => __('Cantidad de diapositivas (1 a 10)', 'cigu-theme'),
        'description' => __('Aumenta este número para agregar más imágenes al carrusel.', 'cigu-theme'),
        'section'     => 'cigu_carousel_section',
        'type'        => 'number',
        'input_attrs' => array('min' => 1, 'max' => 10, 'step' => 1),
    ));
	// Arreglo por defecto que muestra antes de editar la información
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
	// Iteración que nos permite ver el contenido del arreglo en el menú lateral y poder editar su info
	for ($i = 1; $i <= 10; $i++) {
        $def_img   = isset($slide_defaults[$i]) ? $slide_defaults[$i]['img'] : '';
        $def_tag   = isset($slide_defaults[$i]) ? $slide_defaults[$i]['tag'] : 'Actividad';
        $def_title = isset($slide_defaults[$i]) ? $slide_defaults[$i]['title'] : "Actividad Destacada $i";
        $def_desc  = isset($slide_defaults[$i]) ? $slide_defaults[$i]['desc'] : '';
        $def_url   = isset($slide_defaults[$i]) ? $slide_defaults[$i]['url'] : '#';
        // Función que oculta los controles de la diapositiva $i si la cantidad elegida es menor a $i
        $is_slide_active = function() use ($i) {
            return (int) get_theme_mod('cigu_carousel_count', 3) >= $i;
        };
        // Noas permite editar las Imagen
        $wp_customize->add_setting("cigu_slide_{$i}_img", array(
            'default'           => $def_img,
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "cigu_slide_{$i}_img", array(
            'label'           => sprintf(__('━━ Diapositiva %d: Imagen ━━', 'cigu-theme'), $i),
            'section'         => 'cigu_carousel_section',
            'active_callback' => $is_slide_active,
        )));
        // Permite editar the tag
        $wp_customize->add_setting("cigu_slide_{$i}_tag", array(
            'default'           => $def_tag,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("cigu_slide_{$i}_tag", array(
            'label'           => sprintf(__('Diapositiva %d: Etiqueta', 'cigu-theme'), $i),
            'section'         => 'cigu_carousel_section',
            'type'            => 'text',
            'active_callback' => $is_slide_active,
        ));
        // Nos permite editar el titulo
        $wp_customize->add_setting("cigu_slide_{$i}_title", array(
            'default'           => $def_title,
            'sanitize_callback' => 'sanitize_text_field',
        ));
        $wp_customize->add_control("cigu_slide_{$i}_title", array(
            'label'           => sprintf(__('Diapositiva %d: Título', 'cigu-theme'), $i),
            'section'         => 'cigu_carousel_section',
            'type'            => 'text',
            'active_callback' => $is_slide_active,
        ));
        // Nos permite editar la Descripción
        $wp_customize->add_setting("cigu_slide_{$i}_desc", array(
            'default'           => $def_desc,
            'sanitize_callback' => 'sanitize_textarea_field',
        ));
        $wp_customize->add_control("cigu_slide_{$i}_desc", array(
            'label'           => sprintf(__('Diapositiva %d: Descripción', 'cigu-theme'), $i),
            'section'         => 'cigu_carousel_section',
            'type'            => 'textarea',
            'active_callback' => $is_slide_active,
        ));
        // nos permite editar URL
        $wp_customize->add_setting("cigu_slide_{$i}_url", array(
            'default'           => $def_url,
            'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control("cigu_slide_{$i}_url", array(
            'label'           => sprintf(__('Diapositiva %d: Liga (URL al dar clic)', 'cigu-theme'), $i),
            'section'         => 'cigu_carousel_section',
            'type'            => 'url',
            'active_callback' => $is_slide_active,
        ));
    }
	//Muestra el lapicito cute para editar
	if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial('cigu_carousel_section_title', array(
            'selector' => '#noticias-title',
        ));
    }
	// =====================================================
	// Nuestas Áreas de trabajo
	// =====================================================
	// Agregamosla sección para poder editar
	$wp_customize->add_section('cigu_areas_section', array(
		'title'			=> __('Área de trabajo', 'cigu-theme'),
		'description'	=> __('Edita las tarjetas sobre las áreas', 'cigu-theme'),
		'priority'		=> 27,
	));
	//	Activamos si se quiere mostrar o no las cards
	$wp_customize->add_setting('cigu_areas_show', array(
		'default'				=> true,
		'sanitize_callback'		=> 'rest_sanitize_boolean',
	));
	$wp_customize->add_control('cigu_areas_show', array(
		'label'		=> 	__('Mostrar sección Áreas de trabajo', 'cigu-theme'),
		'section'	=> 	'cigu_areas_section',
		'type'		=> 'checkbox',
	));
	// Titulo principal del post o seccion
	$wp_customize->add_setting('cigu_area_section_title', array(
		'default'				=> 	'Nuestras Áreas de Trabajo',
		'sanitize_callback'		=>	'sanitize_text_field',
	));
	$wp_customize->add_control('cigu_area_section_title', array(
		'label'		=>	__('Titulo de la seccion', 'cigu-theme'),
		'section'	=>	'cigu_areas_section',
		'type'		=>	'text',
	));
	/** 
	 * @var array<int, array<string, string>> $areas_defaults Valores iniciales de las 3 tarjetas de áreas. 
	 * 
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
	// Iteración para registrar los controles de cada una de las 3 tarjetas
	for($i = 1; $i <= 3; $i++){
		$wp_customize->add_setting("cigu_area_{$i}_icon", array(
			'default'				=> $areas_defaults[$i]['icon'],
			'sanitize_callback'		=> 'sanitize_text_field'
		));
		$wp_customize->add_control(
			"cigu_area_{$i}_icon",
			array(
				'label'       => sprintf( __( '━━ Área %d: Ícono FontAwesome ━━', 'cigu-theme' ), $i ),
				'description' => __( 'Ejemplo: fa-balance-scale, fa-graduation-cap, fa-hands-helping', 'cigu-theme' ),
				'section'     => 'cigu_areas_section',
				'type'        => 'text',
			)
		);
		//	Editamos los titulos
		$wp_customize->add_setting("cigu_area_{$i}_title", array(
			'default'			=>	$areas_defaults[$i]['title'],
			'sanitize_callback' => 'sanitize_text_field',			
		));
		$wp_customize->add_control("cigu_area_{$i}_title", array(
			'label'		=> sprintf(__('Área %d Título', 'cigu-theme'), $i),
			'section'	=> 'cigu_areas_section',
			'type' 		=> 'text',
		));
		//Ediamos la descripcion
		$wp_customize->add_setting("cigu_area_{$i}_desc", array(
			'default'			=> $areas_defaults[$i]['desc'],
			'sanitize_callback'	=>	'sanitize_textarea_field',
		));
		$wp_customize->add_control("cigu_area_{$i}_desc", array(
			'label'		=> sprintf(__('Área Descripción %d:', 'cigu-theme'),$i),
			'section' 	=> 'cigu_areas_section',
			'type'		=> 'textarea',
		));
		// Editamos el text de enlace
		$wp_customize->add_setting("cigu_area_{$i}_link_text", array(
			'default'			=> $areas_defaults[$i]['link_text'],
			'sanitize_callback' => 'sanitize_text_field',
		));
		$wp_customize->add_control("cigu_area_{$i}_link_text", array(
			'label'			=> sprintf(__('texto del botón', 'cigu-theme'), $i),
			'section' 		=> 'cigu_areas_section',
			'type'			=> 'text',
		));
		// URL del Enlace
		$wp_customize->add_setting("cigu_area_{$i}_url", array(
			'default'				=> $areas_defaults[$i]['url'],
			'sanitize_callback' 	=> 'esc_url_raw',
		));
		$wp_customize->add_control("cigu_area_{$i}_url", array(
			'label' 		=> sprintf(__('Url de la card:', 'cigu-theme'), $i),
			'section' 		=> 'cigu_areas_section',
			'type'			=> 'url,'
		));
	}
	// Lapicito cute
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'cigu_areas_section_title',
			array(
				'selector' => '#areas-title',
			)
		);
	}

}
add_action( 'customize_register', 'cigu_customize_register' );

