<?php

/**
 * Class Jella49_Clip
 */
abstract class Jella49_Clip
{
    /**
     * Render/Clip the shortcode template
     *
     * @param       $name
     * @param array $model
     *
     * @return string
     */
    function render( $name, $model = array() )
    {
        ob_start();

        $located = $this->locate_template( $name );
        if ( $located ) {
            if ( is_array( $model ) ) extract( $model );
            include( $located );
        }

        return trim( ob_get_clean() );
    }

    /**
     * Render/Clip template and make the query available.
     *
     * @param          $name
     * @param WP_Query $the_query
     * @param array    $model
     *
     * @return string
     */
    function render_query( $name, WP_Query $the_query, $model = array() )
    {
        if ( is_array( $model ) ) {
            $model[ 'the_query' ] = $the_query;
        }

        return $this->render( $name, $model );
    }

    /**
     * Locate the template
     *
     * @param $name
     *
     * @return bool|string
     */
    abstract protected function locate_template( $name );

}

/**
 * Class Jella49_Clip_Shortcode
 */
final class Jella49_Clip_Shortcodes extends Jella49_Clip
{
    /**
     * Locate the template
     *
     * @param $name
     *
     * @return bool|string
     */
    protected function locate_template( $name )
    {
        $templates = array();
        if ( !empty( $name ) ) {
            $templates[ ] = "shortcodes/views/{$name}.php";
            $templates[ ] = "lib/shortcodes/views/{$name}.php";
        }

        $located = locate_template( $templates, FALSE );

        return '' != $located ? $located : FALSE;
    }

}