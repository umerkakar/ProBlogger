<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package protheme
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'protheme_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_html( $container ); ?> content-area-bg">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="col-md-6 site-info pull-left">
						<?php // Regular WordPress theme just add in the footer template ?>
							<?php if( get_theme_mod( 'footer_text_block') != "" ){ ?>
							<span class="sep">
								<?php echo get_theme_mod( 'footer_text_block'); ?>
							</span>
							<?php }else { 
							echo '<span class="site-title">Copyright by <a href=" '. esc_url( home_url( '/' ) ) .' " rel="home">'. esc_attr( get_bloginfo( 'name' ) ) .'</a></span>';
							} ?>
					</div><!-- .site-info -->
					
					<div class="col-md-6 pull-right">
						
						<!-- The Footer Menu goes here -->
						<?php wp_nav_menu(
							array(
								'theme_location'  => 'footer',
								//'container_class' => '',
								'container_id'    => 'footer',
								'menu_class'      => 'footer-menu alignright',
								//'fallback_cb'     => '',
								//'menu_id'         => '',
								//'walker'          => new WP_Bootstrap_Navwalker(),
							)
						); ?>
						
					</div>					
					
					

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

