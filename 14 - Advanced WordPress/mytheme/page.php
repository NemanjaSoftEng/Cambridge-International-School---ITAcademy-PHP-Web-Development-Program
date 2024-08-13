<?php
/**
*@package mytheme theme
*/

?>


<?php get_header(); ?>
 
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
 
        get_template_part( 'template/content', 'page' );
 
    endwhile;
endif;
?>
</main>
 
<?php get_footer(); ?>
 