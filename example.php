<?php

/**
 * Plugin Name:       Ejemplo de Plugin
 * Plugin URI:        https://github.com/ivanmercedes/wp-plugin-starter
 * Description:       Plugin de ejemplo para iniciar a crear nuevos
 * Version:           1.0
 * Author:            Ivan Mercedes
 * Author URI:        https://ivanmercedes.com/
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

function prefix_script_example()
{
    wp_register_script('example-plugin', plugins_url('/dist/assets/js/index.js', __FILE__));
    wp_register_style( 'example-style', plugins_url('/dist/assets/css/index.css', __FILE__));

    wp_localize_script(
        'example-plugin',
        'ivm',
        array(
            'rest_url' => rest_url('ivm'),
            'home_url' => home_url()
        )
    );
}

add_action('wp_enqueue_scripts', 'prefix_script_example');

function prefix_add_example()
{
    wp_enqueue_script('example-plugin');
    wp_enqueue_style( 'example-style' );
    $response = '
        <div id="root"></div>
    ';
    return $response;
}


add_shortcode("react_form", "prefix_add_example");
