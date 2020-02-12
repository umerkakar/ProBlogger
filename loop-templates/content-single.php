<?php
/**
 * Single post partial template.
 *
 * @package protheme
 */

?>
<?php $postthumb = get_the_post_thumbnail_url( $post->ID, 'featured-thumb' ); ?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	
	<header class="entry-header">

		<div style="<?php if ($postthumb == true): echo 'background-image:url('. $postthumb .')'; endif; ?>" class="main-story">
			
			<div class="story-heading">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</div>
		</div>
		
		<div class="entry-meta">
			<div class="post-detail">
				<p>
				<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>
				</p>
				<p><?php printf( _x( '%s ago', '%s = human-readable time difference', 'protheme' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?></p>
			</div>
		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->
	
	<?php // advertising area head ?>
	<div class="<?php echo esc_html( $container ); ?> homepage-top-ad" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-12" id="single-featured-ad">
				<!-- attachment-bottom-area -->
					<?php if ( is_active_sidebar( 'single-featured-ad' ) ) : ?>
						<?php dynamic_sidebar( 'single-featured-ad' ); ?>
					<?php endif; ?>
			</div>
		</div>
	</div>
	<?php // Advertising area end ?>
	
	<div class="entry-content">
	
				<!-- IF SHARE BUTTON IS CLICKED SHOW THIS -->

				<div class="row social-share-buttons">
					<div class="col-12" style="text-align:center;">
						<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php print $current_url;?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="" /></a>
						<a target="_blank" href="https://twitter.com/home?status=<?php print $current_url;?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="" /></a>
						<a target="_blank" href="https://plus.google.com/share?url=<?php print $current_url;?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/googleplus.png" alt="" /></a>
						<a href="whatsapp://send?text=<?php print $current_url;?>" data-action="share/whatsapp/share" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/whatsapp.png" alt="" /></a>
						<a href="viber://forward?text=<?php print $current_url;?>" data-action="share/viber/share" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/viber.png" alt="" /></a>
						<a href="http://www.addtoany.com/add_to/line?linkurl=<?php print $current_url;?>" data-action="share/line/share" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/line.png" alt="" /></a>
						<a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php print $current_url;?>&media=<?php print $url_image;?>&description=<?php print $current_trimHTML_Content;?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/pinterest.png" alt="" /></a>
						<a target="_blank" href="http://www.reddit.com/submit?url" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/reddit.png" alt="" /></a>
						<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php print $current_url;?>&title=<?php print $current_title;?>&summary=<?php print $current_trimHTML_Content;?>&source=<?php print home_url();?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png" alt="" /></a>
						<a href="mailto:?Subject=<?php print $current_title;?>&Body=<?php printf( __('I saw this and thought of you! %s','mars'), $current_url );?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/email.png" alt="" /></a>
					</div>
				</div>	
				
		<?php the_content(); ?>

				<!-- IF SHARE BUTTON IS CLICKED SHOW THIS -->

				<div class="row social-share-buttons">
					<div class="col-12" style="text-align:center;">
						<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php print $current_url;?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/facebook.png" alt="" /></a>
						<a target="_blank" href="https://twitter.com/home?status=<?php print $current_url;?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/twitter.png" alt="" /></a>
						<a target="_blank" href="https://plus.google.com/share?url=<?php print $current_url;?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/googleplus.png" alt="" /></a>
						<a href="whatsapp://send?text=<?php print $current_url;?>" data-action="share/whatsapp/share" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/whatsapp.png" alt="" /></a>
						<a href="viber://forward?text=<?php print $current_url;?>" data-action="share/viber/share" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/viber.png" alt="" /></a>
						<a href="http://www.addtoany.com/add_to/line?linkurl=<?php print $current_url;?>" data-action="share/line/share" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/line.png" alt="" /></a>
						<a target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php print $current_url;?>&media=<?php print $url_image;?>&description=<?php print $current_trimHTML_Content;?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/pinterest.png" alt="" /></a>
						<a target="_blank" href="http://www.reddit.com/submit?url" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/reddit.png" alt="" /></a>
						<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php print $current_url;?>&title=<?php print $current_title;?>&summary=<?php print $current_trimHTML_Content;?>&source=<?php print home_url();?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/linkedin.png" alt="" /></a>
						<a href="mailto:?Subject=<?php print $current_title;?>&Body=<?php printf( __('I saw this and thought of you! %s','mars'), $current_url );?>" rel="nofollow"><img src="<?php echo get_template_directory_uri(); ?>/img/email.png" alt="" /></a>
					</div>
				</div>		


	<?php // advertising area head ?>
	<div class="<?php echo esc_html( $container ); ?> homepage-top-ad" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-12" id="after-content-ad">
				<!-- attachment-bottom-area -->
					<?php if ( is_active_sidebar( 'after-content-ad' ) ) : ?>
						<?php dynamic_sidebar( 'after-content-ad' ); ?>
					<?php endif; ?>
			</div>
		</div>
	</div>
	<?php // Advertising area end ?>

	
		<?php
		//wp_link_pages( array(
		//	'before' => '<div class="page-links">' . __( 'Pages:', 'protheme' ),
		//	'after'  => '</div>',
		//) );
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php // protheme_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
