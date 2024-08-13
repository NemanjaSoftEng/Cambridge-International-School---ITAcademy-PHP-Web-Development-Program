<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
 
    <header class="entry-header">
        <?php
        if ( is_singular() ) :
            the_title( '<h1 class="entry-title">', '</h1>' );
        else :
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        endif;
 
        if ( 'post' === get_post_type() ) :
            ?>
            <div class="entry-meta">
                <span class="entry-meta-date"><?php the_date(); ?></span>
                <span class="entry-meta-author"><?php the_author(); ?></span>
            </div><!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->
 
     
    <a class="post-thumbnail" href="<?php the_permalink(); ?>">
        <?php the_post_thumbnail( 'post-thumbnail' ); ?>
    </a>
 
    <?php the_content(); ?>
 
</article>