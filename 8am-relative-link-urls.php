<?php
/*
Plugin Name: 8am Relative Link URLs
Plugin URI: http://8am.ch
Description: Filters all URLs in the Link Editor in TinyMCE to their relative permalinks
Author: 8am GmbH
Version: 1.0
Author URI: http://8am.ch
*/

add_filter('wp_link_query', 'eightam_wp_link_query');
function eightam_wp_link_query($links_src) {
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