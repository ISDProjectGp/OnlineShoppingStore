<?php
/* Processes the ajax requests being put out in the admin area and the front-end
*  of the UPCP plugin */

// Updates the order of items in the catalogue after a user has dragged and dropped them
function Catalogue_Save_Order() {
	global $catalogue_items_table_name;
	global $wpdb;
	
	foreach ($_POST['list-item'] as $Key=>$ID) {
		$Result = $wpdb->query("UPDATE $catalogue_items_table_name SET Position='" . $Key . "' WHERE Catalogue_Item_ID=" . $ID);
	}
		
}
add_action('wp_ajax_catalogue_update_order', 'Catalogue_Save_Order');

function Video_Save_Order(){
	global $item_videos_table_name;
	global $wpdb;
	
	foreach ($_POST['video-item'] as $Key=>$ID) {
		$Result = $wpdb->query("UPDATE $item_videos_table_name SET Item_Video_Order='" . $Key . "' WHERE Item_Video_ID=" . $ID);
	}
}
add_action('wp_ajax_video_update_order','Video_Save_Order');

function Image_Save_Order(){
	global $item_images_table_name;
	global $wpdb;
	
	foreach ($_POST['list-item'] as $Key=>$ID) {
		$Result = $wpdb->query("UPDATE $item_images_table_name SET Item_Image_Order='" . $Key . "' WHERE Item_Image_ID=" . $ID);
	}
}
add_action('wp_ajax_image_update_order','Image_Save_Order');

function Tag_Group_Save_Order(){
	global $tag_groups_table_name;
	global $wpdb;
	
	foreach ($_POST['list-item'] as $Key=>$ID) {
		$Result = $wpdb->query("UPDATE $tag_groups_table_name SET Tag_Group_Order='" . $Key . "' WHERE Tag_Group_ID=" . $ID);
	}
}
add_action('wp_ajax_tag_group_update_order','Tag_Group_Save_Order');

function Category_Products_Save_Order(){
	global $items_table_name;
	global $wpdb;
	
	foreach ($_POST['category-product-item'] as $Key=>$ID) {
		$Result = $wpdb->query("UPDATE $items_table_name SET Item_Category_Product_Order='" . $Key . "' WHERE Item_ID=" . $ID);
	}
}
add_action('wp_ajax_category_products_update_order','Category_Products_Save_Order');

function Custom_Fields_Save_Order(){
	global $fields_table_name;
	global $wpdb;
	
	foreach ($_POST['field-item'] as $Key=>$ID) {
		$Result = $wpdb->query("UPDATE $fields_table_name SET Field_Sidebar_Order='" . $Key . "' WHERE Field_ID=" . $ID);
	}
}
add_action('wp_ajax_custom_fields_update_order','Custom_Fields_Save_Order');

function Catergories_Save_Order(){
	global $categories_table_name;
	global $wpdb;
	
	foreach ($_POST['category-item'] as $Key=>$ID) {
		$Result = $wpdb->query("UPDATE $categories_table_name SET Category_Sidebar_Order='" . $Key . "' WHERE Category_ID=" . $ID);
	}
}
add_action('wp_ajax_categories_update_order','Catergories_Save_Order');

function SubCatergories_Save_Order(){
	global $subcategories_table_name;
	global $wpdb;
	
	foreach ($_POST['subcategory-item'] as $Key=>$ID) {
		$Result = $wpdb->query("UPDATE $subcategories_table_name SET SubCategory_Sidebar_Order='" . $Key . "' WHERE SubCategory_ID=" . $ID);
	}
}
add_action('wp_ajax_subcategories_update_order','SubCatergories_Save_Order');

function Tags_Save_Order(){
	global $tags_table_name;
	global $wpdb;

	foreach ($_POST['tag-list-item'] as $Key=>$ID) {
		$Result = $wpdb->query("UPDATE $tags_table_name SET Tag_Sidebar_Order='" . $Key . "' WHERE Tag_ID=" . $ID);
	}
}
add_action('wp_ajax_tags_update_order','Tags_Save_Order');

// Records the number of times a product has been viewed
function Record_Item_View() {
	global $items_table_name;
	$Path = ABSPATH . 'wp-load.php';
	include_once($Path);
	global $wpdb;

	$Item_ID = $_POST['Item_ID'];
	$Item = $wpdb->get_row($wpdb->prepare("SELECT Item_Views FROM $items_table_name WHERE Item_ID='%d'", $Item_ID));
	if ($Item->Item_Views == "") {$wpdb->query($wpdb->prepare("UPDATE $items_table_name SET Item_Views=1 WHERE Item_ID='%d'", $Item_ID));}
	else {$wpdb->query($wpdb->prepare("UPDATE $items_table_name SET Item_Views=Item_Views+1 WHERE Item_ID='%d'", $Item_ID));}
}
add_action('wp_ajax_record_view', 'Record_Item_View');
add_action( 'wp_ajax_nopriv_record_view', 'Record_Item_View' );

// Updates the catalogue results based on the text entered and search boxes selected
function UPCP_Filter_Catalogue() {
	$Path = ABSPATH . 'wp-load.php';
	include_once($Path);
	
	$id = $_POST['id'];
	$sidebar = $_POST['sidebar'];
	$start_layout = $_POST['start_layout'];
	$excluded_layouts = $_POST['excluded_layouts'];
	$current_page = $_POST['current_page'];
	$default_search_text = $_POST['default_search_text'];
	$ajax_url = $_POST['ajax_url'];
	$ajax_reload = $_POST['ajax_reload'];
	$request_count = $_POST['request_count'];
	
	if ($_POST['Prod_Name'] != $default_search_text) {$Prod_Name = $_POST['Prod_Name'];}
	else {$Prod_Name = "";}
	$Category = $_POST['Category'];
	$SubCategory = $_POST['SubCategory'];
	$Tags = $_POST['Tags'];
	$Custom_Fields = $_POST['Custom_Fields'];
	
	echo do_shortcode("[product-catalogue id='" . $id . "' only_inner='Yes' starting_layout='" . $start_layout . "' excluded_layouts='" . $exclude_layouts . "' current_page='" . $current_page . "' ajax_reload='" . $ajax_reload . "' ajax_url='" . $ajax_url . "' request_count='" . $request_count . "' category='" . $Category . "' subcategory='" . $SubCategory . "' tags='" . $Tags . "' custom_fields='" . $Custom_Fields . "' prod_name='" . $Prod_Name . "']");
}
add_action('wp_ajax_update_catalogue', 'UPCP_Filter_Catalogue');
add_action( 'wp_ajax_nopriv_update_catalogue', 'UPCP_Filter_Catalogue');

// Updates sub-categories drop-down box on the products pages, based on the product's category
function Get_UPCP_SubCategories() {
	global $subcategories_table_name;
	$Path = ABSPATH . 'wp-load.php';
	include_once($Path);
	global $wpdb;
	
	$SubCategories = $wpdb->get_results("SELECT SubCategory_ID, SubCategory_Name FROM $subcategories_table_name WHERE Category_ID=" . $_POST['CatID']);
	foreach ($SubCategories as $SubCategory) {$Response_Array[] = $SubCategory->SubCategory_ID; $Response_Array[] = $SubCategory->SubCategory_Name;}
	if (is_array($Response_Array)) {$Response = implode(",", $Response_Array);}
	else {$Response = "";}
	echo $Response;
}
add_action('wp_ajax_get_upcp_subcategories', 'Get_UPCP_SubCategories');

function Save_Serialized_Product_Page() {	
	if ($_POST['type'] == "mobile" and isset($_POST['serialized_product_page'])) {return update_option("UPCP_Product_Page_Serialized_Mobile", $_POST['serialized_product_page']);}
	elseif (isset($_POST['serialized_product_page'])) {return update_option("UPCP_Product_Page_Serialized", $_POST['serialized_product_page']);}
}
add_action('wp_ajax_save_serialized_product_page', 'Save_Serialized_Product_Page');
?>