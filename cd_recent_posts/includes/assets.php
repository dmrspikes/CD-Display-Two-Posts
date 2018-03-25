<?php

add_action('wp_enqueue_scripts','cd_two_posts_assets');
If (function_exists('cd_display_recent_posts')){
	function cd_two_posts_assets() {
		wp_register_style('cd_two_posts_styles', plugins_url('../css/styles.css', __FILE__ ) );
	}
}