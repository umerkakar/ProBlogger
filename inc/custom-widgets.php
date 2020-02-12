<?php
/**
 * Declaring Custom widgets
 *
 * @package pnews
 */

// Register New widget box for Featured Posts
class Featured_Posts extends WP_Widget{
function __construct() {
	parent::__construct(
		'featured_posts', // Base ID
		'Featured Posts', // Name
		array('description' => __( 'Display Featured Category Posts'))
	   );
}
function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['featuredpostslist'] = strip_tags($new_instance['featuredpostslist']);
	$instance['selectcat'] = strip_tags($new_instance['selectcat']);
	return $instance;
}

// Load content in widget
function form($instance) {
	if( $instance ) {
		$title = esc_attr($instance['title']);
		$featuredpostslist = esc_attr($instance['featuredpostslist']);
		$selectcat = esc_attr($instance['selectcat']);
	} else {
		$title = '';
		$featuredpostslist = '';
		$selectcat = '';
	}
	?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'featured_posts'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>

		<h2><?php _e( 'Select a Category:', 'protheme' ); ?></h2>
		<p>
			<select id="<?php echo $this->get_field_id('selectcat'); ?>" name="<?php echo $this->get_field_name('selectcat'); ?>">
			
				<?php
					$args = array(
					  'orderby' => 'name',
					  'hide_empty' => 0
					  );
					$categories = get_categories( $args );
					foreach ( $categories as $category ) {
						$cat_id = get_cat_ID ( $category->name );
						
						?>
						<option <?php echo $cat_id == $selectcat ? 'selected="selected"' : '';?>
						value="<?php echo $cat_id ?>"><?php echo $category->name; ?></option>
			<?php }
				?>
			</select>
		</p>
		<h2><?php _e( 'How much post to display:', 'protheme' ); ?></h2>
		<p>
		<label for="<?php echo $this->get_field_id('featuredpostslist'); ?>"><?php _e('Number of Listings:', 'featuredpostslist'); ?></label>
		<select id="<?php echo $this->get_field_id('featuredpostslist'); ?>" name="<?php echo $this->get_field_name('featuredpostslist'); ?>">
			<?php for($x=1;$x<=10;$x++): ?>
			<option <?php echo $x == $featuredpostslist ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
			<?php endfor;?>
		</select>
		</p>
		<?php
		$catname = get_cat_name( $selectcat );
		echo $catname
		?>
<?php
}

// display widget() Method

function widget($args, $instance) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);
	$featuredpostslist = $instance['featuredpostslist'];
	$selectcat = $instance['selectcat'];
	echo $before_widget;
	if ( $title ) {
		echo $before_title . $title . $after_title;
	}
	$this->featuredpostslisting($featuredpostslist, $selectcat);
	echo $after_widget;
}

// Pull our Featured Posts
function featuredpostslisting($featuredpostslist, $selectcat) { //html
?>


	<!-- Featured posts area -->			

		<?php
	global $post;
		$catquery = new WP_Query( 'category_name=' . get_cat_name( $selectcat ) .'&posts_per_page=' . $featuredpostslist );
		if($catquery->found_posts > 0) { ?>
			<ul>
			<?php
				while($catquery->have_posts()) : $catquery->the_post();
				$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'thumbnails_posts_size') : '<div class="noThumb"></div>';
				$postthumb = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
			?>
			<li>
				<div class="widget-first-post">
					<p>
						<a href="<?php echo get_permalink(); ?>" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
					</p>
				</div>
				<div style="<?php if ($postthumb == true): echo 'background-image:url('. $postthumb .')'; endif; ?>" class="latest-first-img"></div>
			</li>
		<?php endwhile;
		echo '</ul>';
			wp_reset_postdata();
				?>
		<?php 
		} else{
			echo '<p>No post found</p>';
		}
			?>
 
<?php
// End Featured posts
}

} //end class Popular_Posts_Widget
register_widget('Featured_Posts');



// Register New widget box for Recent Posts with thumbnail
class Thumbnails_Posts extends WP_Widget{
function __construct() {
	parent::__construct(
		'thumbnails_posts', // Base ID
		'Thumbnails Posts', // Name
		array('description' => __( 'Display Thumbnails Posts'))
	   );
}
function update($new_instance, $old_instance) {
	$instance = $old_instance;
	$instance['title'] = strip_tags($new_instance['title']);
	$instance['thumbnailzpostslist'] = strip_tags($new_instance['thumbnailzpostslist']);
	return $instance;
}

// Load content in widget
function form($instance) {
	if( $instance) {
		$title = esc_attr($instance['title']);
		$thumbnailzpostslist = esc_attr($instance['thumbnailzpostslist']);
	} else {
		$title = '';
		$thumbnailzpostslist = '';
	}
	?>
		<p>
		<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'thumbnails_posts'); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
		</p>
		<p>
		<label for="<?php echo $this->get_field_id('thumbnailzpostslist'); ?>"><?php _e('Number of Listings:', 'thumbnails_posts'); ?></label>
		<select id="<?php echo $this->get_field_id('thumbnailzpostslist'); ?>"  name="<?php echo $this->get_field_name('thumbnailzpostslist'); ?>">
			<?php for($x=1;$x<=10;$x++): ?>
			<option <?php echo $x == $thumbnailzpostslist ? 'selected="selected"' : '';?> value="<?php echo $x;?>"><?php echo $x; ?></option>
			<?php endfor;?>
		</select>
		</p>		
	<?php
	}

// widget() Method

function widget($args, $instance) {
	extract( $args );
	$title = apply_filters('widget_title', $instance['title']);
	$thumbnailzpostslist = $instance['thumbnailzpostslist'];
	echo $before_widget;
	if ( $title ) {
		echo $before_title . $title . $after_title;
	}
	$this->thumbnailzpostslist($thumbnailzpostslist);
	echo $after_widget;
}

// Pull our Thumbnails Posts
function thumbnailzpostslist($thumbnailzpostslist) { //html

// Recent Posts with thumbs
	global $post;
	$listings = new WP_Query();
	$listings->query('post_type=post&posts_per_page=' . $thumbnailzpostslist );
	if($listings->found_posts > 0) {
		echo '<ul>';
			while ($listings->have_posts()) {
				$listings->the_post();
				$image = (has_post_thumbnail($post->ID)) ? get_the_post_thumbnail($post->ID, 'thumbnails_posts_size') : '<div class="noThumb"></div>';
				$postthumb = get_the_post_thumbnail_url( $post->ID, 'thumbnail' );
				$image = $postthumb ? 'background-image:url('. $postthumb . ')' : '';
				$listItem = '<li>';
				$listItem .= '<div class="widget-first-post"><p><a href="' . get_permalink() . '">';
				$listItem .= get_the_title() . '</a></p></div>';
				$listItem .= '<div style="' . $image . ' " class="latest-first-img"></div></li>';
				echo $listItem;
			}
		echo '</ul>';
		wp_reset_postdata();
	}else{
		echo '<p style="padding:25px;">No Post found</p>';
	}?>
	
<?php
// End Thumbnails posts
}

} //end class Popular_Posts_Widget
register_widget('Thumbnails_Posts');