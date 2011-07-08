<?php get_header(); ?>

<div id="main" class="grid_8 alpha">
        <article <?php post_class(); ?>>
        
            <h2><?php _e( 'Error 404','foliage'); ?></h2>
            <p><?php _e( 'The page you requested could not be found. Try searching or going back to the ','foliage'); ?><a href="<?php home_url(); ?>"><?php _e( 'home page','foliage'); ?></a>.</p>
            <div class="clear"></div>
        
        </article> <!-- end post 1 -->
    
    </div> <!-- end main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
