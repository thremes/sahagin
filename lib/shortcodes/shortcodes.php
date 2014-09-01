<?php

/**
 * Class Jella49_Shortcodes
 */
final class Jella49_Shortcodes
{
    /**
     * @var Jella49_Clip
     */
    private $clip;

    /**
     * The Constructor
     */
    function __construct( $clip )
    {
        $this->clip = $clip;
        add_shortcode( 'hello', array( $this, 'hello' ) );
        add_shortcode( 'sticky-posts', array( $this, 'sticky_posts' ) );
    }

    /**
     * Hello World
     *
     * @return mixed
     */
    function hello()
    {
        return $this->clip->render( 'hello', array( 'message' => 'World' ) );
    }

    /**
     * The sticky posts shortcodes
     *
     * @return string
     */
    function sticky_posts()
    {
        $sticky_posts = get_option( 'sticky_posts' );
        $the_query    = new WP_Query( array(
            'posts_per_page'      => 6,
            'post__in'            => $sticky_posts,
            'ignore_sticky_posts' => 1
        ) );

        return $this->clip->render_query( 'sticky-posts', $the_query,
            array(
                'sticky_posts' => $sticky_posts
            )
        );
    }

}
