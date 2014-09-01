<?php

/**
 * Class Jella49_Assets
 */
final class Jella49_Assets
{
    /**
     * @var Jella49_Google_Fonts
     */
    private $google_fonts;

    /**
     * The Constructor
     */
    private function __construct()
    {
        //* Init the google fonts helper
        $this->google_fonts = new Jella49_Google_Fonts();
        $this->add_google_fonts( $this->google_fonts );

        //* Enqueue and dequeue fonts/styles
        add_action( 'wp_enqueue_scripts', array( $this, 'fonts' ) );
        add_action( 'wp_enqueue_scripts', array( $this, 'styles' ) );

        //* Style Trump
        add_action( 'wp_enqueue_scripts', array( $this, 'style_trump' ), 99 );

        //* Register default background/headers
        $this->default_headers();
        add_filter( 'hybrid_default_backgrounds', array( $this, 'default_backgrounds' ), 11 );

        //* Add editor fonts/styles
        // @TODO add_editor_style( $this->google_fonts->get_url() );

        //* Add custom-header fonts/styles
        // @TODO add_action( 'admin_print_styles-appearance_page_custom-header', array( $this, 'fonts' ) );
    }

    /**
     * Get the Singleton instance
     */
    static function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Jella49_Assets();
        }

        return $instance;
    }

    /**
     * Enqueue Fonts
     */
    function fonts()
    {
        wp_dequeue_style( 'saga-fonts' );
        wp_enqueue_style( 'jella49-fonts', $this->google_fonts->get_url() );
    }

    /**
     * Enqueue Styles
     */
    function styles()
    {
        $this->enqueue_style( 'jella49-base', 'base.css', array( 'parent' ) );
    }

    /**
     * Style Trump
     */
    function style_trump()
    {
        wp_dequeue_style( 'style' );
        wp_enqueue_style( 'style' );
    }

    /**
     * Register Default Headers
     */
    function default_headers()
    {
        register_default_headers( array(
            'sample-01' => array(
                'url'           => '%2$s/lib/assets/images/headers/sample.png',
                'thumbnail_url' => '%2$s/lib/assets/images/headers/sample-thumb.png',
                'description'   => __( 'Sample One', 'jella49' )
            ),
            'sample-02' => array(
                'url'           => '%2$s/lib/assets/images/headers/sample.png',
                'thumbnail_url' => '%2$s/lib/assets/images/headers/sample-thumb.png',
                'description'   => __( 'Sample Two', 'jella49' )
            )
        ) );
    }

    /**
     * Register Default Backgrounds
     */
    function default_backgrounds( $backgrounds )
    {
        $_backgrounds = array(
            'sample-01' => array(
                'url'           => '%2$s/lib/assets/images/backgrounds/sample.png',
                'thumbnail_url' => '%2$s/lib/assets/images/backgrounds/sample-thumb.png',
            ),
            'sample-02' => array(
                'url'           => '%2$s/lib/assets/images/backgrounds/sample.png',
                'thumbnail_url' => '%2$s/lib/assets/images/backgrounds/sample-thumb.png',
            )
        );

        return array_merge( $backgrounds, $_backgrounds );
    }

    /**
     * Add fonts to Google Fonts Helper
     *
     * @param $google_fonts Jella49_Google_Fonts
     */
    private function add_google_fonts( $google_fonts )
    {
        $google_fonts->add(
            'Lato:300,400,700,900,300italic,400italic,700italic,900italic',
            /* Translators: If there are characters in your language that are not
             * supported by Lato, translate this to 'off'. Do not translate
             * into your own language.
             */
            _x( 'on', 'Lato font: on or off', 'jella49' )
        );
        $google_fonts->add(
            'Playfair Display:400,700,900,400italic,700italic,900italic',
            /* Translators: If there are characters in your language that are not
             * supported by Playfair Display, translate this to 'off'. Do not translate
             * into your own language.
             */
            _x( 'on', 'Playfair Display font: on or off', 'jella49' )
        );
    }

    /**
     * Enqueue Style
     *
     * @param        $handle
     * @param        $src
     * @param array  $deps
     * @param string $media
     */
    private function enqueue_style( $handle, $src, $deps = array(), $media = 'all' )
    {
        if ( file_exists( trailingslashit( get_stylesheet_directory() ) . "lib/assets/css/{$src}" ) ) {
            $src = trailingslashit( get_stylesheet_directory_uri() ) . "lib/assets/css/{$src}";
            wp_enqueue_style( $handle, $src, $deps, FALSE, $media );
        }
    }

}
