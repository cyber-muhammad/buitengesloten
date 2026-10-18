<?php
/**
 * Plugin Name: wp2shell guard
 * Description: Refuses the REST batch endpoint to visitors who cannot edit posts (CVE-2026-63030 / CVE-2026-60137 mitigation). Installed 2026-10-18 during incident response.
 */

add_filter(
	"rest_pre_dispatch",
	function ( $result, $server, $request ) {
		if ( preg_match( "#(^|/)batch(/|$)#i", trim( $request->get_route(), "/" ) ) && ! current_user_can( "edit_posts" ) ) {
			return new WP_Error( "rest_forbidden", "Forbidden.", array( "status" => 403 ) );
		}
		return $result;
	},
	PHP_INT_MAX, // last: ACF Pro's rest_pre_dispatch callback returns null and would discard an earlier result.
	3
);
