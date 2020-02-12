<?php
/**
 * The template for displaying the author pages.
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package protheme
 */

get_header();
$container   = get_theme_mod( 'protheme_container_type' );
$sidebar_pos = get_theme_mod( 'protheme_sidebar_position' );
?>


<div class="wrapper" id="author-wrapper">

	<div class="<?php echo esc_html( $container ); ?> content-area-bg" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php get_template_part( 'global-templates/left-sidebar-check', 'none' ); ?>

			<main class="site-main" id="main">

				<header class="page-header author-header">

					<?php
					$curauth = ( isset( $_GET['author_name'] ) ) ? get_user_by( 'slug',
						$author_name ) : get_userdata( intval( $author ) );
					?>

					<h1><?php echo esc_html( $curauth->nickname ); ?></h1>
				</header><!-- .page-header -->

				<ul>

					<!-- The Loop -->
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

					<!-- End Loop -->

				</ul>

			</main><!-- #main -->

			<!-- The pagination component -->
			<?php protheme_pagination(); ?>

		</div><!-- #primary -->

		<!-- Do the right sidebar check -->
		<?php if ( 'right' === $sidebar_pos || 'both' === $sidebar_pos ) : ?>

			<?php get_sidebar( 'right' ); ?>

		<?php endif; ?>

	</div> <!-- .row -->

</div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
