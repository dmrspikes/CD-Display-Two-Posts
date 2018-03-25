<?php
function cd_display_recent_posts(){
	$args = array(
		'numberposts' => 2,
		'offset' => 0,
		'category' => 0,
		'orderby' => 'post_date',
		'order' => 'DESC',
		'include' => '',
		'exclude' => '',
		'meta_key' => '',
		'meta_value' =>'',
		'post_type' => 'post',
		'post_status' => 'publish',
		'suppress_filters' => true
	);
	$recent_posts = wp_get_recent_posts( $args, OBJECT );
	ob_start();
	echo '<h2 class="cd_recent_post_header">Recent Posts</h2>';
	foreach($recent_posts as $recent){
		$str = wpautop( $recent->post_content );
		$str = substr( $str, 0 , 200 );
		$str = strip_tags( $str, '<a><strong><em>' );
		?>
			<div class="cd_recent_post">
				<?php if (has_post_thumbnail($recent->ID)) { ?>
					<a class="cd_recent_post_thumbnail" href="<?php echo get_permalink($recent->ID); ?>">
						<?php echo get_the_post_thumbnail($recent->ID, 'medium'); ?>
					</a>
				<?php } ?>
				<h5 class="post-title">
					<a class="cd_recent_post_title" href="<?php echo get_permalink($recent->ID); ?>">
						<?php echo $recent->post_title; ?>
					</a>
				</h5>
				<div class="cd_post_excerpt">
					<p>
						<?php echo $str . '...<br />';?> <a href="<?php echo get_permalink($recent->ID); ?>">Read More</a>
					</p>
				</div>
			</div>
		<?php
	}
	wp_enqueue_style('cd_two_posts_styles');
	
	wp_reset_query();
	return ob_get_clean();
}
add_shortcode('cd_display_recent_posts','cd_display_recent_posts');