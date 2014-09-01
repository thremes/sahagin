<?php

/**
 * Class Jella49_Later
 */
final class Jella49_Later
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
            $instance = new Jella49_Later();
        }

        return $instance;
    }
}
