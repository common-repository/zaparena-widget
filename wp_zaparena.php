<?php
/* 
Plugin Name: zaparena Plugin
Plugin URI: http://www.zaparena.com/
Version: v1.00
Author: Dominik
Description: <a href="http://www.zaparena.com">zaparena</a> widget
*/

function zaparena_admin() {  
    include('wp_zaparena_admin.php');  
}  

function zaparena_admin_actions() {
	add_options_page("zaparena", "zaparena", 1, "zaparena", "zaparena_admin");
}

function zaparena_plugin_actions( $links, $file ) {
 	if( $file == 'zaparena-widget/wp_zaparena.php' ) {
		$settings_link = '<a href="' . admin_url( 'options-general.php?page=zaparena' ) . '">' . __('Settings') . '</a>';
		array_unshift( $links, $settings_link ); // before other links
	}
	return $links;
}

function showzaparena ($content) {
	if(!is_feed() && !is_home()) {
		$widgetid = get_option('zaparena_widgetid');
		if($widgetid != "") {
		$content .= '<a name="zaparena" class="w-'.$widgetid.'"></a>
<script type="text/javascript">
(function() {
var he = document.createElement(\'script\'), hea = document.getElementsByTagName(\'script\')[0];
he.type = \'text/javascript\';
he.src = \'http://www.zaparena.com/w/wajs\';
hea.parentNode.insertBefore(he, hea);
})();
</script>';
}
	}
	return $content;
}

add_action('admin_menu', 'zaparena_admin_actions');	
add_filter('plugin_action_links', 'zaparena_plugin_actions', 10, 2);
add_filter('the_content', 'showzaparena');

?>