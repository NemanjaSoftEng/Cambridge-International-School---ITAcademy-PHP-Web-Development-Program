<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 
    <header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header><!-- .entry-header -->
 
<?php the_post_thumbnail(); ?>
       
<?php the_content(); ?>
 
</article>