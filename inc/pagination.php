<?php
/**
 * Pagination layout.
 *
 * @package protheme
 */

/**
 * Custom Pagination with numbers
 * Credits to http://www.wpbeginner.com/wp-themes/how-to-add-numeric-pagination-in-your-wordpress-theme/
 */

if ( ! function_exists( 'protheme_pagination' ) ) :
function protheme_pagination() {
	if ( is_singular() ) {
		return;
	}

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**    Add current page to the array */
	if ( $paged >= 1 ) {
		$links[] = $paged;
	}

	/**    Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav aria-label="Page navigation" class="bottom-pagination"><ul class="pagination">' . "\n";

	/**    Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active page-item"' : ' class="page-item"';

		/**    Previous Post Link */
		if ( get_previous_posts_link() ) {
			printf( '<li class="page-item" id="prev-link"><span class="page-link">%1$s</span></li> ' . "\n",
			get_previous_posts_link( '<span aria-hidden="true">PREV</span><span class="sr-only">Previous page</span>' ) );
		}
		
		printf( '<li %s><a class="page-link" href="%s">%s</a></li>' . "\n",
		$class, esc_url( get_pagenum_link( 1 ) ), '1' );
		
		if ( ! in_array( 2, $links ) ) {
			echo '<li class="page-item"><span class="page-link doted">...</span></li>';
		}
	}

	// Link to current page, plus 2 pages in either direction if necessary.
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active page-item"' : ' class="page-item"';
		printf( '<li %s><a href="%s" class="page-link">%s</a></li>' . "\n", $class,
			esc_url( get_pagenum_link( $link ) ), $link );
	}
	
	// Link to last page, plus ellipses if necessary.
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			echo '<li class="page-item"><span class="page-link">...</span></li>' . "\n";
		}

		$class = $paged == $max ? ' class="active "' : ' class="page-item"';
		printf( '<li %s><a class="page-link" href="%s" aria-label="Next"><span aria-hidden="true">%s</span><span class="sr-only"></span></a></li>' . "\n",
		$class . '', esc_url( get_pagenum_link( esc_html( $max ) ) ), esc_html( $max ) );
	}
	
	// Next Post Link.
	if ( get_next_posts_link() ) {
		printf( '<li class="page-item" id="next-link"><span class="page-link">%s</span></li>' . "\n",
			get_next_posts_link( '<span aria-hidden="true">NEXT</span><span class="sr-only">Next page</span>' ) );
	}

	echo '</ul></nav>' . "\n";
}

endif;
