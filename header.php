<!DOCTYPE html>
<html <?php
/**
 * Plantilla Header
 * Documentación:
 * https://developer.wordpress.org/reference/functions/language_attributes/
 * https://developer-wordpress-org.translate.goog/reference/functions/bloginfo/?_x_tr_sl=en&_x_tr_tl=es&_x_tr_hl=es&_x_tr_pto=tc
 * https://developer.wordpress.org/reference/functions/wp_head/
 * https://developer.wordpress.org/reference/functions/body_class/
 * https://developer.wordpress.org/reference/functions/wp_body_open/
 * https://developer.wordpress.org/reference/functions/esc_url/
 */
 language_attributes(); 
 ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Coordinación de Igualdad de Género de la UNAM: políticas, formación, atención y recursos para una universidad igualitaria.">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <!-- Accesibilidad -->
    <a href="#main-content" class="skip-link">Saltar a contenido principal</a>
    <!-- Comineza el header -->
     <header>
        <div class="header-container">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="logo" style="text-decoration: none;">
                <img src="https://www.unam.mx/sites/default/files/images/unam.svg" alt="Escudo de la UNAM">
                <div class="logo-text">
                    <p class="logo-title">Coordinación de Igualdad de Género</p>
                    <p class="logo-subtitle">Universidad Nacional Autónoma de México</p>
                </div>
            </a>
            <button class="menu-toggle" aria-label="Abrir menú principal" aria-expanded="false" aria-controls="mainNav">
                <i class="fas fa-bars" aria-hidden="true"></i>
            </button>
            <nav class="main-nav" id="mainNav" aria-label="Menú principal">
                <ul class="nav-list">
                    <li class="has-dropdown">
                        <a href="#" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                            Conoce la CIGU <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown">
                            <li><a href="#">Nosotras</a></li>
                            <li><a href="#">Áreas</a></li>
                            <li><a href="#">Proyectos</a></li>
                            <li><a href="#">Programas</a></li>
                            <li><a href="#">Ejes</a></li>
                            <li><a href="#">Informes</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown">
                        <a href="#" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                            Cursos <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown">
                            <li><a href="#">Comunidad UNAM</a></li>
                            <li><a href="#">Docentes</a></li>
                            <li><a href="#">Público en General</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Actividades</a></li>
                    <li class="has-dropdown">
                        <a href="#" class="dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                            Recursos <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        </a>
                        <ul class="dropdown">
                            <li><a href="#">Publicaciones</a></li>
                            <li><a href="#">Violeta y Oro</a></li>
                            <li><a href="#">Descargables</a></li>
                            <li><a href="#">Estadísticas de género</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- Buscador conectado a WordPress -->
            <div class="search-wrapper" id="searchWrapper">
                <button class="search-toggle" id="searchToggle" aria-label="Abrir buscador" aria-expanded="false" aria-controls="searchForm">
                    <i class="fas fa-search" aria-hidden="true"></i>
                </button>
                <form class="search-form" id="searchForm" role="search" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                    <label for="searchInput" class="sr-only">Buscar en el sitio</label>
                    <input
                        type="search"
                        id="searchInput"
                        name="s"
                        value="<?php echo get_search_query(); ?>"
                        class="search-input"
                        placeholder="Buscar en la CIGU…"
                        autocomplete="off"
                        aria-label="Buscar en el sitio"
                    >
                    <button type="submit" class="search-submit" aria-label="Buscar">
                        <i class="fas fa-search" aria-hidden="true"></i>
                    </button>
                    <button type="button" class="search-close" id="searchClose" aria-label="Cerrar buscador">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>
    <!-- Cintilla de cuenta regresiva, podcast violeta y oro -->
    <aside class="podcast-strip" arial-label="Anuncio del Podcast semanal Violeta y Oro">
        <div class="podcast-strip-container">
            <i class="fas fa-podcast" aria-hidden="true"></i>
            <span class="podcast-strip-text">
                Próximo <strong>Violeta y Oro</strong>
                <span class="countdown" id="podcastCountdown" aria-live="polite" aria-atomic="true">
                <span class="countdown-unit" id="cd-days">0</span><span class="countdown-label">d</span>
                <span class="countdown-unit" id="cd-hours">0</span><span class="countdown-label">h</span>
                <span class="countdown-unit" id="cd-mins">0</span><span class="countdown-label">m</span>
                <span class="countdown-unit" id="cd-secs">0</span><span class="countdown-label">s</span>
            </span>
            <a href="#" class="podcast-strip-cta">Escuchar</a>
        </div>
    </aside>
