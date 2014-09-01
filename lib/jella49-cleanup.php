<?php

/**
 * Class Jella49_Cleanup
 */
final class Jella49_Cleanup
{
    /**
     * The Constructor
     */
    private function __construct()
    {
        // TODO - Here goes any cleanup functionality of yours...
    }

    /**
     * Get the Singleton instance
     */
    static function get_instance()
    {
        static $instance;
        if ( !isset( $instance ) ) {
            $instance = new Jella49_Cleanup();
        }

        return $instance;
    }

}
