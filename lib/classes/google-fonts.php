<?php

/**
 * Google Fonts Helper
 *
 */
final class Sahagin_Google_Fonts
{
    /**
     * Available/Active font-families property
     *
     * @var array
     */
    private $font_families = array();

    /**
     * Add supported/active fonts only.
     *
     * @param        $font_family
     * @param string $active
     */
    function add( $font_family, $active = 'on' )
    {
        if ( 'off' !== $active ) {
            $this->font_families[ ] = $font_family;
        }
    }

    /**
     * The helper method that generates the google font url.
     *
     * @return bool|string
     */
    function get_url()
    {
        if ( !empty( $this->font_families ) ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $this->font_families ) ),
                'subset' => urlencode( 'latin,latin-ext' ),
            ), '//fonts.googleapis.com/css' );
        }

        return isset( $fonts_url ) ? $fonts_url : FALSE;
    }

}