<?php get_header(); ?>
 
<main>
<?php
if ( have_posts() ) : ?>
 
    <header class="page-header">
        <?php
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="archive-description">', '</div>' );
        ?>
    </header><!-- .page-header -->
 
    <?php
    /* Start the Loop */
    while ( have_posts() ) :
        the_post(); 
 
        get_template_part( 'template/content', get_post_type() );
 
    endwhile;
endif;
?>
</main>
 
<?php get_footer(); ?>