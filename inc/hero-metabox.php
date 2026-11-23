<?php
/**
 * Campos editables para el Banner Principal al darle en "Editar página"
 * Documentación:
 * https://developer.wordpress.org/reference/functions/add_meta_box/
 * https://developer.wordpress.org/reference/functions/get_post_meta/
 * https://developer.wordpress.org/reference/functions/update_post_meta/
 * https://developer.wordpress.org/reference/functions/wp_nonce_field/
 * https://developer.wordpress.org/reference/functions/get_post_meta/
 */
if (!defined('ABSPATH')){
    exit;
}
function cigu_add_hero_metabox(){
    add_meta_box(
        'cigu_hero_settings',
        'Editar banner principal',
        'cigu_render_hero_metabox',
        'page',
        'normal',
        'high'

    );
}
add_action('add_meta_boxes', 'cigu_add_hero_metabox');

function cigu_render_hero_metabox($post){
    wp_nonce_field('cigu_save_hero_name', 'cigu_hero_nonce');
    
    $titulo      = get_post_meta($post->ID, '__cigu_hero_title', true);
    $description = get_post_meta($post->ID, '__cigu_hero_desc', true);
    $btn_texto   = get_post_meta($post->ID, '__cigu_hero_btn_text', true);
    $btn_url     = get_post_meta($post->ID, '__cigu_hero_btn_url', true);
    $tamano      = get_post_meta($post->ID, '__cigu_hero_size', true) ?: 'normal';
    $alineacion  = get_post_meta($post->ID, '__cigu_hero_aling', true) ?: 'center';
    ?>
    <style>
        .cigu-meta-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-top: 10px; }
        .cigu-meta-field { margin-bottom: 15px; }
        .cigu-meta-field label { display: block; font-weight: 600; margin-bottom: 5px; color: #312658; }
        .cigu-meta-field input[type="text"],
        .cigu-meta-field input[type="url"],
        .cigu-meta-field textarea,
        .cigu-meta-field select { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .cigu-meta-help { font-size: 12px; color: #666; margin-top: 4px; }
    </style>
<?php    
}