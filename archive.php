<?php get_header(); ?>

<div id="main" class="grid_8 alpha">
		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle"><?php _e( 'Archive for the','foliage' ); ?> &#8216;<?php single_cat_title(); ?>&#8217; <?php _e( 'Category','foliage' ); ?></h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle"><?php _e( 'Posts Tagged ','foliage' ); ?>&#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle"><?php _e( 'Archive for ','foliage' ); ?><?php the_time('F jS, Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle"><?php _e( 'Archive for ','foliage' ); ?><?php the_time('F, Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle"><?php _e( 'Archive for ','foliage' ); ?><?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle"><?php _e( 'Author Archive ','foliage' ); ?><?php the_author(); ?></h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle"><?php _e( 'Blog Archives','foliage' ); ?></h2>
 	  <?php } ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="box">
        <article <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail' ); ?>
			<?php if ( has_post_thumbnail() ) { ?><a href="<?php the_permalink(); ?>"><img src="<?php echo "$image[0]"; ?>" alt="" class="thumbnail alignleft" /></a><?php } ?>
            
            <?php the_content(__('Read more')); ?>
			<div class="clear"></div>
			<footer class="postmeta">
                <span class="btn alignleft">
                	In <?php the_category(', '); ?> by <?php the_author_posts_link(); ?> on <time datetime="<?php echo get_the_time('Y-m-d'); ?>" pubdate><?php echo get_the_time( get_option( 'date_format' ) ); ?></time>
				</span>
				<?php /* Edit Link */ edit_post_link(); ?>
            </footer> <!-- end post meta --> </div>
        
        </article> <!-- end post 1 -->
		<?php endwhile; endif; ?>
		<div class="navigation">
			<div class="nav-previous alignleft"><?php previous_posts_link( __( '<span class="meta-nav">&larr;</span> Newer Posts','foliage' ) ); ?></div>
			<div class="nav-next alignright"><?php next_posts_link( __( 'Older Posts <span class="meta-nav">&rarr;</span>','foliage' ) ); ?></div>
		</div>
    </div> <!-- end main -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>
