<?php /** @var string $name */ ?>
<?php /** @var array $sticky_posts */ ?>
<?php /** @var WP_Query $the_query */ ?>

<?php if ( !empty( $sticky_posts ) && $the_query->have_posts() ) : ?>

    <div class="<?php echo $name; ?>">

        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

            <?php hybrid_get_content_template(); ?>

        <?php endwhile; ?>

        <?php wp_reset_postdata(); ?>

    </div>

<?php endif; ?>