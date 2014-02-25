<?php
/*
Plugin Name: Relative local link URLs
Plugin URI: http://8am.ch
Description: Filters all URLs in the link editor in TinyMCE to their relative permalinks
Author: 8am GmbH
Version: 1.0
Author URI: http://8am.ch
*/

add_filter('wp_link_query', 'wp_link_query_relative');
function wp_link_query_relative($links_src) {
    foreach ($links_src as $link) {
		$permalink = parse_url( $link['permalink'] );
		$permalink = $permalink['path'];
		$links_filtered[] = array(
			'ID'=>$link['ID']
			,'title'=>$link['title']
			,'permalink'=>$permalink
			,'info'=>$link['info']
		);
    }
    return $links_filtered;
}

?>
