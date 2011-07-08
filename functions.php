<?php
require_once ( get_template_directory() . '/theme-options.php' );
function echo_layout_view() {
	global $echo_options;
	$settings = get_option( 'echo_options', $echo_options );
}

add_action( 'wp_head', 'echo_layout_view' );
if ( ! isset( $content_width ) ) $content_width = 580;
define( 'echo_version', '1.3' );
function echo_getinfo( $show = '' ) {
        $output = '';

		switch ( $show ) {
			case 'version' :
			$output = echo_version;
					break;
		}
		return $output;
}

add_action( 'after_setup_theme', 'echo_theme_setup' );

function echo_theme_setup() {
	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 */
	load_theme_textdomain( 'echo', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );
	
	add_theme_support( 'post-thumbnails' ); // post thumbnails
	register_nav_menu( 'main-menu', __('Main Menu','echo') ); // navigation menus
	add_theme_support( 'automatic-feed-links' ); // automatic feeds
	
	if ($options['backToTop'] == 1) {
		wp_enqueue_script('jquery');
	}
}

add_action( 'widgets_init', 'echo_sidebars' );

function echo_sidebars() {
	register_sidebar(array(
		'id' => 'right-sidebar',
		'name' => 'Right Sidebar',
		'before_widget' => '<aside class="widget">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => "</h3>\n"
	));
}

add_filter('comment_form_default_fields', 'echo_comments');

function echo_comments() {
	$req = get_option('require_name_email');
	$fields =  array(
'author' => '<p>' . '<label for="author">' . __( 'Name','echo' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
'<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder = "What should we call you?"' . ( $req ? ' required' : '' ) . '/></p>',

'email'  => '<p><label for="email">' . __( 'Email','echo' ) . '</label> ' . ( $req ? '<span>*</span>' : '' ) .
'<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' placeholder="How can we reach you?"' . ( $req ? ' required' : '' ) . ' /></p>',

'url'    => '<p><label for="url">' . __( 'Website','echo' ) . '</label>' .
'<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="Have you got a website?" /></p>'
);
	return $fields;
}

add_filter('comment_form_field_comment', 'echo_commentfield');

function echo_commentfield() {
	$commentArea = '<p><label for="comment">' . _x( 'Comment','noun','echo' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" required placeholder="What\'s on your mind?"></textarea></p>';
	return $commentArea;
}

function echo_list_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
     <div id="comment-<?php comment_ID(); ?>">
      <div class="comment-author vcard">
         <?php echo get_avatar($comment,$size='48',$default='<path_to_url>' ); ?>

         <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>','echo'), get_comment_author_link()) ?>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
         <em><?php _e( 'Your comment is awaiting moderation.','echo' ) ?></em>
         <br />
      <?php endif; ?>

      <div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time pubdate datetime="<?php comment_time( 'c' ); ?>"><?php printf( '%1$s at %2$s', get_comment_date(),  get_comment_time() ); ?></time></a><?php edit_comment_link(__('(Edit)','echo'),'  ','') ?><div class="authortag"><?php _x( 'Author','noun','echo' ); ?></div></div>
		
      <?php comment_text() ?>

      <div class="reply">
         <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
     </div>
<?php
}

add_filter( 'edit_post_link','echo_edit_post_link' );
function echo_edit_post_link() {
	$link = '<span class="alignright"><a class="post-edit-link more-link" href="'.get_edit_post_link().'">'.__( 'Edit This','echo' ).'</a></span>';
	return $link;
}

add_filter( 'wp_page_menu','echo_page_menu' );
function echo_page_menu($menu) {
	return preg_replace('/<ul>/', '<ul id="menu">', $menu, 1);
	return $menu;
}
?>
