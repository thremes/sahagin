<?php

//* Load main functionality
add_action( 'after_setup_theme', array( 'Sahagin_Main', 'get_instance' ) );

//* Load cleanup functionality
require_once( 'sahagin-cleanup.php' );
add_action( 'after_setup_theme', array( 'Sahagin_Cleanup', 'get_instance' ), 15 );

//* Load later functionality
require_once( 'sahagin-later.php' );
add_action( 'after_setup_theme', array( 'Sahagin_Later', 'get_instance' ), 15 );

//* Load assets functionality
require_once( 'assets/assets.php' );
add_action( 'after_setup_theme', array( 'Sahagin_Assets', 'get_instance' ) );

//* Load google-fonts helper
require_once( 'classes/google-fonts.php' );

//* Load shortcode/clip infrastructure
require_once( 'classes/clip.php' );
require_once( 'shortcodes/shortcodes.php' );
new Sahagin_Shortcodes( new Sahagin_Clip_Shortcodes() );

/**
 * Class Sahagin_Main
 */
final class Sahagin_Main
{
    /**
     * The Constructor
     */
    private function __construct()
    {
        //* Useful variables
        // @TODO $child_dir = trailingslashit( get_stylesheet_directory() );
        $child_dir_uri = trailingslashit( get_stylesheet_directory_uri() );

        //* Load text domain
        // @TODO load_child_theme_textdomain( 'sahagin', "{$child_dir}languages" );

        //* Add custom background
        add_theme_support( 'custom-background', array(
            'default-color' => 'fff',
            'default-image' => "{$child_dir_uri}lib/assets/images/backgrounds/linedpaper.png",
        ) );

        //* Add custom header
        add_theme_support( 'custom-header', array(
            'default-image'      => "{$child_dir_uri}lib/assets/images/headers/header-01.jpg",
            'default-text-color' => '212121',
        ) );

        //* Add a custom default icon for the "header_icon" option
        add_filter( 'theme_mod_header_icon', array( $this, 'header_icon' ) );

        //* Add a custom default color for the "menu" color option.
        add_filter( 'theme_mod_color_menu', array( $this, 'color_menu' ) );

        //* Add a custom default color for the "primary" color option
        add_filter( 'theme_mod_color_primary', array( $this, 'color_primary' ) );
    }

    /**
     * Get the Singleton instance
     */
    static function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Sahagin_Main();
        }

        return $instance;
    }

    /**
     * Header Icon
     *
     * @param $icon
     *
     * @return string
     */
    function header_icon( $icon )
    {
        return 'default' === $icon ? 'icon-heart-o' : $icon;
    }

    /**
     * Menu Color
     *
     * @param $hex
     *
     * @return string
     */
    function color_menu( $hex )
    {
        return $hex ? $hex : '8E6A75';
    }

    /**
     * Primary Color
     *
     * @param $hex
     *
     * @return string
     */
    function color_primary( $hex )
    {
        return $hex ? $hex : '8E6A75';
    }

}
