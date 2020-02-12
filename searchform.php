<?php
/**
 * The template for displaying search forms in Underscores.me
 *
 * @package protheme
 */

?>
<form method="get" id="searchform" class="navbar-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text"
			placeholder="<?php esc_attr_e( 'Search &hellip;', 'protheme' ); ?>">
	<div class="input-group-btn">
		<button class="btn" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
	</div>
	</div>
</form>
