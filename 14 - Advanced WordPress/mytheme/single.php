<?php get_header(); ?>
 
<main>

<?php if ( is_active_sidebar( 'widget-sidebar' ) ) : ?>
    <div id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar( ' widget-sidebar ' ); ?>
    </div>
<?php endif; ?>

<?php
if ( have_posts() ) :
    /* Start the Loop */
    while ( have_posts() ) :
        the_post(); 
 
        get_template_part( 'template/content', get_post_type() );
 
        the_post_navigation();
 
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
 
    endwhile;
endif;
?>
</main>
 
<?php get_footer(); ?>