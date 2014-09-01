<?php

/**
 * Class Sahagin_Cleanup
 */
final class Sahagin_Cleanup
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
            $instance = new Sahagin_Cleanup();
        }

        return $instance;
    }

}
