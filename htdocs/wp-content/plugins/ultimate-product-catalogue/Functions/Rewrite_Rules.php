<?php
function UPCP_Rewrite_Rules() { 
	global $wp_rewrite;

	$frontpage_id = get_option('page_on_front');
		
    add_rewrite_tag('%single_product%','([^&]+)');
		//add_rewrite_tag('%product_id%','([^+]+)');
		//add_rewrite_rule("(.?.+?)/([^+]+)/([^&]+)/?$", "index.php?pagename=\$matches[1]&product_id=\$matches[2]&single_product=\$matches[3]", 'top');
		add_rewrite_rule("product/([^&]+)/?$", "index.php?page_id=". $frontpage_id . "&single_product=\$matches[1]", 'top');
		add_rewrite_rule("(.?.+?)/product/([^&]+)/?$", "index.php?pagename=\$matches[1]&single_product=\$matches[2]", 'top');
		flush_rewrite_rules();
}

function add_query_vars_filter( $vars ){
	$vars[] = "single_product";
	$vars[] = "product_id";
	return $vars;
}


?>