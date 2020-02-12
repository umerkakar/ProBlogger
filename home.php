<?php
/**
 * The Homepage template file.
 * @package protheme
 */

get_header();

$container   = get_theme_mod( 'protheme_container_type' );
$sidebar_pos = get_theme_mod( 'protheme_sidebar_position' );
?>

<?php //Homepage Latest Stories Area ?>

<div class="container content-area-bg">
	<div class="main-story-section">
		<?php // MAIN STORIES ?>
		<div class="main-story-container">
		<?php
	global $post;
					$args = array(
				'posts_per_page' => 1,
				'post__in'  => get_option( 'sticky_posts' ),
				'ignore_sticky_posts' => 1
			);
			$query = new WP_Query( $args );
		if($query->found_posts > 0) {
		
				while($query->have_posts()) : $query->the_post();
				$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'thumbnails_posts_size') : '<div class="noThumb"></div>';
				$postthumb = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
			?>

			<a href="<?php echo get_permalink(); ?>">
				<div style="background-image: linear-gradient(120deg, rgba(130, 68, 148, 0.6), rgba(34, 148, 204, 0.698)), <?php if ($postthumb == true): echo 'url('. $postthumb .')'; endif; ?>" class="main-story">
					<span>Top Story</span>
					<div class="story-heading">
						<h1><?php echo get_the_title(); ?></h1>
					</div>
				</div>
			</a>
			<div class="story-heading home-bottom">
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
						<?php printf( _nx( '%1$s', '%1$s', get_comments_number(), 'comments title', 'protheme' ), number_format_i18n( get_comments_number() ) );?>					
						<i class="fa fa-commenting-o" aria-hidden="true"></i>
						</a>
					</p>
				</div>
			</div>
		</div>
		<?php endwhile;
			wp_reset_postdata();
				?>
		<?php 
		} else{
			echo '<p>No post found</p>';
		}
			?>

			
		<?php // SUB STORIES ?>
<?php // SUB STORIES ?>
		<div class="sub-stories">
		<span>Trending Now</span>
		<?php
	global $post;
		$catquery = new WP_Query( 'category_name=featured&posts_per_page=4');
		if($catquery->found_posts > 0) { ?>
			
			<?php
				while($catquery->have_posts()) : $catquery->the_post();
				$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'thumbnails_posts_size') : '<div class="noThumb"></div>';
				$postthumb = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
			?>

			<div style="<?php if ($postthumb == true): echo 'background-image:url('. $postthumb .')'; endif; ?>" class="sub-1">
				<div class="overlay">
					<a href="<?php echo get_permalink(); ?>">
					<h3><?php echo get_the_title(); ?></h3>
					<div class="comment-count"><?php printf( _nx( '%1$s', '%1$s', get_comments_number(), 'comments title', 'protheme' ), number_format_i18n( get_comments_number() ) );?>
					</div>
					</a>
				</div>
			</div>
			
			
		<?php endwhile;
			wp_reset_postdata();
				?>
		<?php 
		} else{
			echo '<p>No post found</p>';
		}
			?>
</div>
		
		
		
	</div>
</div>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero', 'none' ); ?>
<?php endif; ?>

<div class="wrapper" id="wrapper-index">

	<div class="<?php echo esc_html( $container ); ?> content-area-bg" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check and opens the primary div -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">
			
			<div class="heading">
				<h3>Latest News</h3>
			</div>
				<?php if ( have_posts() ) : ?>

					<?php /* Start the Loop */ ?>

					<?php while ( have_posts() ) : the_post(); ?>

						<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>

					<?php endwhile; ?>

				<?php else : ?>

					<?php get_template_part( 'loop-templates/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php protheme_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div><!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
