<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package protheme
 */

get_header();
?>
<div class="wrapper" id="404-wrapper">

	<div class="container content-area-bg" id="content">

		<div class="row">

			<div class="offset-lg-2 col-lg-8 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<section class="error-404 not-found">

						<header class="page-header">

							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.',
							'protheme' ); ?></h1>

						</header><!-- .page-header -->

						<div class="page-content">

							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?',
							'protheme' ); ?></p>

							<?php get_search_form(); ?>

				<h1 class="page-title"><?php esc_html_e( 'You may like to read these articles.',
					'protheme' ); ?></h1>
							
		<?php global $post;
		$catquery = new WP_Query( 'category_name=featured&posts_per_page=5');
		if($catquery->found_posts > 0) { ?>
			<ul>
			<?php
				while($catquery->have_posts()) : $catquery->the_post();
				$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'thumbnails_posts_size') : '<div class="noThumb"></div>';
				$postthumb = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
			?>
<?php

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'loop-templates/content', get_post_format() );
						?>
		<?php endwhile;
		echo '</ul>';
			wp_reset_postdata();
				?>
		<?php 
		} else{
			echo '<p>No post found</p>';
		}
			?>
						</div><!-- .page-content -->

					</section><!-- .error-404 -->

				</main><!-- #main -->

			</div><!-- #primary -->

		</div> <!-- .row -->

	</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
