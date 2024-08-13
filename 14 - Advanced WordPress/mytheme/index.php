<?php
/**
*@package mytheme theme
*/

?>


<?php get_header(); ?>
 
    <?php get_header(); ?>
 
<main>
<?php
if ( have_posts() ) :
    /* Start the Loop */
    while ( have_posts() ) :
        the_post(); 
 
        get_template_part( 'template/content', get_post_type() );
 
    endwhile;
endif;
?>
</main>
 
<?php get_footer(); ?>
 