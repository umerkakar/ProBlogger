<?php
/**
 * Post rendering content according to caller of get_template_part.
 *
 * @package protheme
 */

?>
<?php $postthumb = get_the_post_thumbnail_url( $post->ID, '' ); ?>
<article <?php post_class('single-story'); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">
	
		<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>">

			<div style="<?php if ($postthumb == true): echo 'background-image:url('. $postthumb .')'; endif; ?>" class="main-image"></div>
		</a>
		
		<div class="text-area">
			<div class="post-heading">	
				<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>' ); ?>
			</div>
			
			<?php if ( 'post' == get_post_type() ) : ?>
			<div class="post-detail">
				<div class="col-4 pd0">
					<p>
						<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
						<i class="fa fa-pencil-square-o" aria-hidden="true"></i><?php echo esc_html( get_the_author() ); ?></a>
					</p>
				</div>
				<div class="col-4 pd0">
				<p>
					<i class="fa fa-clock-o" aria-hidden="true"></i>
					<?php printf( _x( '%s ago', '%s = human-readable time difference', 'protheme' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
				</p>
				</div>
				<div class="col-4 pd0">
				<p class="right-text"> 
				<a href="<?php echo get_permalink(); ?>/#comments"> 
					<i class="fa fa-commenting-o" aria-hidden="true"></i>
					<?php printf( _nx( '%1$s', '%1$s', get_comments_number(), 'comments title', 'protheme' ), number_format_i18n( get_comments_number() ) );?>					
				</a>
				</p>
				</div>
			</div>
				<?php // <div class="entry-meta"> ?>
					<?php // protheme_posted_on(); ?>
				<?php // </div><!-- .entry-meta --> ?>

			<?php endif; ?>

		</div>
	</header><!-- .entry-header -->

</article><!-- #post-## -->
