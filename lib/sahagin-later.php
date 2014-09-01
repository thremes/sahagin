<?php

/**
 * Class Sahagin_Later
 */
final class Sahagin_Later
{
    /**
     * The Constructor
     */
    function __construct()
    {
        // TODO - Here goes any later functionality of yours...
    }

    /**
     * Get the Singleton instance
     */
    static function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Sahagin_Later();
        }

        return $instance;
    }
}
