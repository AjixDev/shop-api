<?php

if (!function_exists('shoptheme_setup')) :
    /**
     * Sets up theme defaults and registers support for various
     * WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme
     * hook, which runs before the init hook. The init hook is too late
     * for some features, such as indicating support post thumbnails.
     */
    function shoptheme_setup() {

        /**
         * Make theme available for translation.
         * Translations can be placed in the /languages/ directory.
         */
        load_theme_textdomain('shoptheme', get_template_directory() . '/languages');

        /**
         * Add default posts and comments RSS feed links to <head>.
         */
        add_theme_support('automatic-feed-links');

        /**
         * Enable support for post thumbnails and featured images.
         */
        add_theme_support('post-thumbnails');

        /**
         * Add support for two custom navigation menus.
         */
        register_nav_menus(array(
            'primary'   => __('Primary Menu', 'shoptheme'),
            'secondary' => __('Secondary Menu', 'shoptheme'),
        ));

        /**
         * Enable support for the following post formats:
         * aside, gallery, quote, image, and video
         */
        add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
    }
endif;
add_action('after_setup_theme', 'shoptheme_setup');

//Enqueue quasar
function enqueue_vue_and_quasar_scripts() {
    // Enqueue Vue.js
    wp_enqueue_script('vue', 'https://cdn.jsdelivr.net/npm/vue@3/dist/vue.global.prod.js', array(), null, true);

    // Enqueue Quasar
    wp_enqueue_script('quasar', 'https://cdn.jsdelivr.net/npm/quasar@2.12.4/dist/quasar.umd.prod.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_vue_and_quasar_scripts');

//Enqueue Scripts
function shop_theme_enqueue_script() {
    wp_enqueue_script('app.js', true);
    wp_enqueue_script('quasar-vue-component.js', true);
}
add_action('wp_enqueue_scripts', 'shop_theme_enqueue_script');

// Quasar Shortcode
function render_quasar_vue_shortcode() {
    ob_start();
    include_once('quasar-vue-shortcode.php'); // Include the template file
    return ob_get_clean();
}
add_shortcode('quasar_vue_shortcode', 'render_quasar_vue_shortcode');
