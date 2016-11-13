<?php 
/* The function that creates the HTML on the front-end, based on the parameters
* supplied in the product-catalog shortcode */
function Insert_Product_Catalog($atts) {
	// Include the required global variables, and create a few new ones
	global $wpdb, $categories_table_name, $subcategories_table_name, $tags_table_name, $tagged_items_table_name, $tag_groups_table_name, $catalogues_table_name, $catalogue_items_table_name, $items_table_name, $fields_meta_table_name, $item_videos_table_name;
	global $ProductString, $ProdCats, $ProdSubCats, $ProdTags, $ProdCustomFields, $ProdCatString, $ProdSubCatString, $ProdTagString, $ProdCustomFieldsString, $Catalogue_ID, $Catalogue_Layout_Format, $Catalogue_Sidebar, $Full_Version, $TagGroupName;
	global $link_base;
	
	$ProductString = "";
	$Filter = get_option("UPCP_Filter_Type");
	$Color = get_option("UPCP_Color_Scheme");
	$Links = get_option("UPCP_Product_Links");
	$Detail_Image = get_option("UPCP_Details_Image");
	$Pretty_Links = get_option("UPCP_Pretty_Links");
	$Mobile_Style = get_option("UPCP_Mobile_SS");
	$Tag_Logic = get_option("UPCP_Tag_Logic");
	$Links = get_option("UPCP_Product_Links");
	$Pagination_Location = get_option("UPCP_Pagination_Location");
	$CaseInsensitiveSearch = get_option("UPCP_Case_Insensitive_Search");
	$Maintain_Filtering = get_option("UPCP_Maintain_Filtering");
	$Show_Category_Descriptions = get_option("UPCP_Show_Category_Descriptions");
	$Show_Catalogue_Information = get_option("UPCP_Show_Catalogue_Information");
	$Products_Per_Page = get_option("UPCP_Products_Per_Page");
	$ProductSearch = get_option("UPCP_Product_Search");
	$Inner_Filter = get_option("UPCP_Inner_Filter");

	$Pagination_Background = get_option("UPCP_Pagination_Background");		
	$Pagination_Border = get_option("UPCP_Pagination_Border");
	$Pagination_Shadow = get_option("UPCP_Pagination_Shadow");
	$Pagination_Gradient = get_option("UPCP_Pagination_Gradient");
	$Pagination_Font = get_option("UPCP_Pagination_Font");

	$Products_Pagination_Label = get_option("UPCP_Products_Pagination_Label");
	$Product_Name_Search_Label = get_option("UPCP_Product_Name_Search_Label");
	$Product_Search_Text_Label = get_option("UPCP_Product_Name_Text_Label");
	$No_Results_Found_Label = get_option("UPCP_No_Results_Found_Label");
	if ($Products_Pagination_Label != "") {$Products_Pagination_Text = $Products_Pagination_Label;}
	else {$Products_Pagination_Text = __(' products', 'UPCP');}
	if ($Product_Name_Search_Label != "") {$SearchLabel = $Product_Name_Search_Label;}
	else {
		if ($ProductSearch == "namedesc" or $ProductSearch == "namedesccust") {$SearchLabel = __("Product Search14", 'UPCP');}
		else {$SearchLabel = __("Product Name:", 'UPCP');}
	}
	if ($prod_name != "") {$Product_Name_Text = $prod_name;}
	elseif ($Product_Search_Text_Label != "") {$Product_Name_Text = $Product_Search_Text_Label;
	}
	else {
		if ($ProductSearch == "namedesc" or $ProductSearch == "namedesccust") {$Product_Name_Text = __("Search...", 'UPCP');}
		else {$Product_Name_Text = __("Name...", 'UPCP');}
	}
		
	// Get the attributes passed by the shortcode, and store them in new variables for processing
	extract( shortcode_atts( array(
				"id" => "1",
				"excluded_layouts" => "None",
				"starting_layout" => "",
				"products_per_page" => "",
				"current_page" => 1,
				"sidebar" => "Yes",
				"only_inner" => "No",
				"ajax_reload" => "No",
				"ajax_url" => "",
				"request_count" => 0,
				"category" => "",
				"subcategory" => "",
				"tags" => "",
				"custom_fields" => "",
				"prod_name" => "",
				"link_base" => ""),
			$atts
		)
	);
	
	if ($ajax_reload != "No"){$ajax_reload = ucfirst(strtolower($ajax_reload));}
		
	// Select the catalogue information from the database 
	$Catalogue = $wpdb->get_row("SELECT * FROM $catalogues_table_name WHERE Catalogue_ID=" . $id);
	$CatalogueItems = $wpdb->get_results("SELECT * FROM $catalogue_items_table_name WHERE Catalogue_ID=" . $id . " ORDER BY Position");
		
	// Add any additional CSS in-line
	if ($Catalogue->Catalogue_Custom_CSS != "") {
		$HeaderBar .= "<style type='text/css'>";
		$HeaderBar .= $Catalogue->Catalogue_Custom_CSS;
		$HeaderBar .= "</style>";
	}

	//Add styling options that have been set
	if ($Full_Version == "Yes") {$HeaderBar .= UPCP_Add_Modified_Styles();}

	if ($Detail_Image != "") {
		$HeaderBar .= "<style type='text/css'>";
		$HeaderBar .= ".upcp-thumb-details-link, .upcp-list-details-link, .upcp-detail-details-link {";
		$HeaderBar .= "background: url('" . $Detail_Image . "') no-repeat;";
		$HeaderBar .= "}";
		$HeaderBar .= "</style>";
	}

	$Top_JS .= "<script language='JavaScript' type='text/javascript'>";	
	if ($Maintain_Filtering == "Yes") {$Top_JS .= "var maintain_filtering = 'Yes';";}
	else {$Top_JS .= "var maintain_filtering = 'No';";}
	$Top_JS .= "</script>";

	$HeaderBar .= $Top_JS;

	if ($Links == "New") {$Target = "_blank";}
	else {$Target = "_self";}
	
	$HeaderBar .= "<form id='upcp-hidden-filtering-form' method='post' target='" . $Target . "'>";
	$HeaderBar .= "<input type='hidden' id='upcp-selected-categories' name='categories' value='" . $_POST['categories'] . "' />";
	$HeaderBar .= "<input type='hidden' id='upcp-selected-subcategories' name='subcategories' value='" . $_POST['subcategories'] . "' />";
	$HeaderBar .= "<input type='hidden' id='upcp-selected-tags' name='tags' value='" . $_POST['tags'] . "' />";
	$HeaderBar .= "<input type='hidden' id='upcp-selected-prod-name' name='prod_name' value='" . $_POST['prod_name'] . "' />";
	$HeaderBar .= "</form>";
		
	if (get_query_var('single_product') != "" or $_GET['SingleProduct'] != "") {
		$ProductString .= $HeaderBar;
		$ProductString .= SingleProductPage(); 
		return $ProductString;
	}
						
	$Catalogue_ID = $id;
	$Catalogue_Sidebar = $sidebar;
	$Starting_Layout = ucfirst($starting_layout);
	if ($excluded_layouts != "None") {$Excluded_Layouts = explode(",", $excluded_layouts);}
	else {$Excluded_Layouts = array();}
		
	if (isset($_GET['categories'])) {$category = explode(",", $_GET['categories']);}
	elseif (isset($_POST['categories']) and $_POST['categories'] != "") {$category = explode(",", $_POST['categories']);}
	elseif ($category == "") {$category = array();}
	else {$category = explode(",", $category);}	
	if (isset($_GET['sub-categories'])) {$subcategory = explode(",", $_GET['sub-categories']);}	
	elseif (isset($_POST['subcategories']) and $_POST['subcategories'] != "") {$subcategory = explode(",", $_POST['subcategories']);}
	elseif ($subcategory == "") {$subcategory = array();}
	else {$subcategory = explode(",", $subcategory);}	
	if (isset($_GET['tags'])) {$tags = explode(",", $_GET['tags']);}
	elseif (isset($_POST['tags']) and $_POST['tags'] != "") {$tags = explode(",", $_POST['tags']);}	
	elseif ($tags == "") {$tags = array();}
	else {$tags = explode(",", $tags);}	

	if (isset($_POST['prod_name']) and $_POST['prod_name'] != "") {$prod_name = $_POST['prod_name'];}

	//Pagination early work
	if ($products_per_page == "") {$products_per_page = $Products_Per_Page;}
	if ($category != "" or $subcategory != "" or $tags != "" or $prod_name != "") {$Filtered = "Yes";}
	else {$Filtered = "No";}
	
		
	$ProductString .= "<div class='upcp-Hide-Item' id='upcp-shortcode-atts'>";
	$ProductString .= "<div class='shortcode-attr' id='upcp-catalogue-id'>" . $id . "</div>";
	$ProductString .= "<div class='shortcode-attr' id='upcp-catalogue-sidebar'>" . $sidebar . "</div>";
	$ProductString .= "<div class='shortcode-attr' id='upcp-starting-layout'>" . $starting_layout . "</div>";
	$ProductString .= "<div class='shortcode-attr' id='upcp-current-layout'>" . $starting_layout . "</div>";
	$ProductString .= "<div class='shortcode-attr' id='upcp-exclude-layouts'>" . $excluded_layouts . "</div>";
	$ProductString .= "<div class='shortcode-attr' id='upcp-current-page'>" . $current_page . "</div>";
	$ProductString .= "<div class='shortcode-attr' id='upcp-default-search-text'>" . $Product_Name_Text . "</div>";
	if ($ajax_reload == "Yes") {$ProductString .= "<div class='shortcode-attr' id='upcp-base-url'>" . $ajax_url . "</div>";}
	else {
		$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
		//if ($uri_parts[0] != "/") {$ProductString .= "<div class='shortcode-attr' id='upcp-base-url'>" . $uri_parts[0] . "</div>";}
		if (strpos($uri_parts[1], "page_id") === false) {$ProductString .= "<div class='shortcode-attr' id='upcp-base-url'>" . $uri_parts[0] . "</div>";}
		else {$ProductString .= "<div class='shortcode-attr' id='upcp-base-url'>" . $uri_parts[0] . "?" . $uri_parts[1] . "</div>";}
		//else {$ProductString .= "<div class='shortcode-attr' id='upcp-base-url'>/?" . $uri_parts[1] . "</div>";}
	}
	$ProductString .= "</div>";
		
	if (sizeOf($Excluded_Layouts)>0) {for ($i=0; $i<sizeOf($Excluded_Layouts); $i++) {$ExcludedLayouts[$i] = ucfirst(trim($Excluded_Layouts[$i]));}}
	else {$ExcludedLayouts = array();}
		
	if ($Starting_Layout == "") {
		if (!in_array("Thumbnail", $Excluded_Layouts)) {$Starting_Layout = "Thumbnail";}
		elseif (!in_array("List", $Excluded_Layouts)) {$Starting_Layout = "List";}
		else {$Starting_Layout = "Detail";}
	}
				
	// Make sure that the layout is set
	if ($layout_format != "Thumbnail" and $layout_format != "List") {
		if ($Catalogue->Catalogue_Layout_Format != "") {$format = $Catalogue->Catalogue_Layout_Format;}
		else {$format = "Thumbnail";}
	}
	else {$format = $layout_format;}
		
	// Arrays to store what categories, sub-categories and tags are applied to the product in the catalogue
	$ProdCats = array();
	$ProdSubCats = array();
	$ProdTags = array();
	$ProdCustomFields = array();

	// If filtering for custom fields, build the field/value query string
	if ($custom_fields != "") {
		$Custom_Field_IDs = explode(",", $custom_fields);
		foreach ($Custom_Field_IDs as $Custom_Field_ID){
			$Field_ID = substr($Custom_Field_ID, 0, strpos($Custom_Field_ID, "="));
			$Field_Value = substr($Custom_Field_ID, strpos($Custom_Field_ID, "=")+1);
			$Selected_Custom_Fields[$Field_ID][] = html_entity_decode($Field_Value);
		}
		$Custom_Fields_Sql_String .= "(";
		foreach ($Selected_Custom_Fields as $Field_ID => $Selected_Custom_Field) {
			$Custom_Fields_Sql_String .= "(";
			$Custom_Fields_Sql_String .= "Field_ID='" . $Field_ID . "' AND (";
			foreach ($Selected_Custom_Field as $Value){
				$Custom_Fields_Sql_String .= "Meta_Value LIKE '" . $Value . "' OR Meta_Value LIKE '" . $Value . ",%' OR Meta_Value LIKE '%," . $Value . ",%' OR Meta_Value LIKE '%," . $Value . "' OR ";
			}
			$Custom_Fields_Sql_String = substr($Custom_Fields_Sql_String, 0, -4);
			$Custom_Fields_Sql_String .= "))";
			$Custom_Fields_Sql_String .= " OR ";
		}
		$Custom_Fields_Sql_String = substr($Custom_Fields_Sql_String, 0, -4);
		$Custom_Fields_Sql_String .= ")";
		$Custom_Field_Count = sizeOf($Selected_Custom_Fields);
	}
		
	$ProdThumbString .=  "<div id='prod-cat-" . $id . "' class='prod-cat thumb-display ";
	if ($Starting_Layout != "Thumbnail") {$ProdThumbString .= "hidden-field";}
	$ProdThumbString .= "'>\n";
	$ProdThumbString .= "%upcp_pagination_placeholder_top%";
		
	$ProdListString .=  "<div id='prod-cat-" . $id . "' class='prod-cat list-display ";
	if ($Starting_Layout != "List") {$ProdListString .= "hidden-field";}
	$ProdListString .= "'>\n";
	$ProdListString .= "%upcp_pagination_placeholder_top%";
		
	$ProdDetailString .=  "<div id='prod-cat-" . $id . "' class='prod-cat detail-display ";
	if ($Starting_Layout != "Detail") {$ProdDetailString .= "hidden-field";} 
	$ProdDetailString .= "'>\n";
	$ProdDetailString .= "%upcp_pagination_placeholder_top%";
		
	$Product_Count = 0;
	foreach ($CatalogueItems as $CatalogueItem) {
				
		// If the item is a product, then simply call the AddProduct function to add it to the code
		if ($CatalogueItem->Item_ID != "" and $CatalogueItem->Item_ID != 0) {
			$Product = $wpdb->get_row("SELECT * FROM $items_table_name WHERE Item_ID=" . $CatalogueItem->Item_ID);
			$ProdTagObj = $wpdb->get_results("SELECT Tag_ID FROM $tagged_items_table_name WHERE Item_ID=" . $CatalogueItem->Item_ID);
			if ($ajax_reload == "No") {
				$Prod_Custom_Fields = $wpdb->get_results("SELECT Field_ID, Meta_Value FROM $fields_meta_table_name WHERE Item_ID=" . $Product->Item_ID);
			}
						
			if ($Product->Item_Display_Status != "Hide") {
				if (sizeOf($category) == 0 or in_array($Product->Category_ID, $category)) {
					if (sizeOf($subcategory) == 0 or in_array($Product->SubCategory_ID, $subcategory)) {
						$ProdTag = ObjectToArray($ProdTagObj);
						$Tag_Check = CheckTags($tags, $ProdTag, $Tag_Logic);
						if ($Tag_Check == "Yes") {
							$Custom_Field_Check = Custom_Field_Check($Custom_Fields_Sql_String, $Custom_Field_Count, $Product->Item_ID);
							if ($Custom_Field_Check == "Yes") {
								$Name_Search_Match = SearchProductName($Product->Item_ID, $Product->Item_Name, $Product->Item_Description, $prod_name, $CaseInsensitiveSearch, $ProductSearch);
								if ($Name_Search_Match == "Yes") {
									$Pagination_Check = CheckPagination($Product_Count, $products_per_page, $current_page, $Filtered);
									if ($Pagination_Check == "OK") {
										$HeaderBar .= "<a id='hidden_FB_link-" . $Product->Item_ID . "' class='fancybox' href='#prod-cat-addt-details-" . $Product->Item_ID . "'></a>";
										if (!in_array("Thumbnail", $ExcludedLayouts)) {$ProdThumbString .= UPCP_AddProduct("Thumbnail", $Product->Item_ID, $Product, $ProdTagObj, $ajax_reload, $ajax_url);}
										if (!in_array("List", $ExcludedLayouts)) {$ProdListString .= UPCP_AddProduct("List", $Product->Item_ID, $Product, $ProdTagObj, $ajax_reload, $ajax_url);}
										if (!in_array("Detail", $ExcludedLayouts)) {$ProdDetailString .= UPCP_AddProduct("Detail", $Product->Item_ID, $Product, $ProdTagObj, $ajax_reload, $ajax_url);}
									}
									$Product_Count++;
								}
			}}}}}
			if ($ajax_reload == "No") {FilterCount($Product, $ProdTagObj, $Prod_Custom_Fields);}
			unset($NameSearchMatch);
		}
				
		// If the item is a category, then add the appropriate extra HTML and call the AddProduct function
		// for each individual product in the category
		if ($CatalogueItem->Category_ID != "" and $CatalogueItem->Category_ID != 0) {
			if (sizeOf($category) == 0 or in_array($CatalogueItem->Category_ID, $category)) {					
				$CatProdCount = 0;
				$Category = $wpdb->get_row("SELECT Category_Name, Category_Description FROM $categories_table_name WHERE Category_ID=" . $CatalogueItem->Category_ID);
						
				$ProdThumbString .= "<div id='prod-cat-category-" . $CatalogueItem->Category_ID . "' class='prod-cat-category upcp-thumb-category'>\n";
				$ProdListString .= "<div id='prod-cat-category-" . $CatalogueItem->Category_ID . "' class='prod-cat-category upcp-list-category'>\n";
				$ProdDetailString .= "<div id='prod-cat-category-" . $CatalogueItem->Category_ID . "' class='prod-cat-category upcp-detail-category'>\n";
						
				$ProdThumbString .= "%Category_Label%";
				$ProdListString .= "%Category_Label%";
				$ProdDetailString .= "%Category_Label%";
						
				$CatThumbHead = "<div id='prod-cat-category-label-" . $CatalogueItem->Category_ID . "' class='prod-cat-category-label upcp-thumb-category-label'><div class='prod-cat-category-name'>" . $Category->Category_Name . "</div>";
				if ($Show_Category_Descriptions == "Yes") {$CatThumbHead .= "<div class='prod-cat-category-description'>" . $Category->Category_Description . "</div></div>\n";}
				else {$CatThumbHead .= "</div>\n";}
				$CatListHead = "<div id='prod-cat-category-label-" . $CatalogueItem->Category_ID . "' class='prod-cat-category-label upcp-list-category-label'><div class='prod-cat-category-name'>" . $Category->Category_Name ."</div>";
				if ($Show_Category_Descriptions == "Yes") {$CatListHead .= "<div class='prod-cat-category-description'>" . $Category->Category_Description . "</div></div>\n";}
				else {$CatListHead .= "</div>\n";}
				$CatDetailHead = "<div id='prod-cat-category-label-" . $CatalogueItem->Category_ID . "' class='prod-cat-category-label upcp-detail-category-label'><div class='prod-cat-category-name'>" . $Category->Category_Name ."</div>";
				if ($Show_Category_Descriptions == "Yes") {$CatDetailHead .= "<div class='prod-cat-category-description'>" . $Category->Category_Description . "</div></div>\n";}
				else {$CatDetailHead .= "</div>\n";}
			}
					
			$Products = $wpdb->get_results("SELECT * FROM $items_table_name WHERE Category_ID=" . $CatalogueItem->Category_ID . " ORDER BY Item_Category_Product_Order");
					
			foreach ($Products as $Product) {
				$ProdTagObj = $wpdb->get_results("SELECT Tag_ID FROM $tagged_items_table_name WHERE Item_ID=" . $Product->Item_ID);
				if ($ajax_reload == "No") {
					$Prod_Custom_Fields = $wpdb->get_results("SELECT Field_ID, Meta_Value FROM $fields_meta_table_name WHERE Item_ID=" . $Product->Item_ID);
				}
							
				if ($Product->Item_Display_Status != "Hide") {
					if (sizeOf($category) == 0 or in_array($Product->Category_ID, $category)) {
						if (sizeOf($subcategory) == 0 or in_array($Product->SubCategory_ID, $subcategory)) {
							$ProdTag = ObjectToArray($ProdTagObj);
							$Tag_Check = CheckTags($tags, $ProdTag, $Tag_Logic);
							if ($Tag_Check == "Yes") {
								$Custom_Field_Check = Custom_Field_Check($Custom_Fields_Sql_String, $Custom_Field_Count, $Product->Item_ID);
								if ($Custom_Field_Check == "Yes") {
									$Name_Search_Match = SearchProductName($Product->Item_ID, $Product->Item_Name, $Product->Item_Description, $prod_name, $CaseInsensitiveSearch, $ProductSearch);
									if ($Name_Search_Match == "Yes") {
										$Pagination_Check = CheckPagination($Product_Count, $products_per_page, $current_page, $Filtered);
										if ($Pagination_Check == "OK") {
											$HeaderBar .= "<a id='hidden_FB_link-" . $Product->Item_ID . "' class='fancybox' href='#prod-cat-addt-details-" . $Product->Item_ID . "'></a>";
											if (!in_array("Thumbnail", $ExcludedLayouts)) {$ProdThumbString .= UPCP_AddProduct("Thumbnail", $Product->Item_ID, $Product, $ProdTagObj, $ajax_reload, $ajax_url);}
											if (!in_array("List", $ExcludedLayouts)) {$ProdListString .= UPCP_AddProduct("List", $Product->Item_ID, $Product, $ProdTagObj, $ajax_reload, $ajax_url);}
											if (!in_array("Detail", $ExcludedLayouts)) {$ProdDetailString .= UPCP_AddProduct("Detail", $Product->Item_ID, $Product, $ProdTagObj, $ajax_reload, $ajax_url);}
											$CatProdCount++;
										}
										$Product_Count++;
									}
				}}}}}
				if ($ajax_reload == "No") {FilterCount($Product, $ProdTagObj, $Prod_Custom_Fields);}
				unset($NameSearchMatch);
			}
				
			if (sizeOf($category) == 0 or in_array($CatalogueItem->Category_ID, $category)) {			
				if ($CatProdCount > 0) {
					$ProdThumbString =  str_replace("%Category_Label%", $CatThumbHead, $ProdThumbString);
					$ProdListString = str_replace("%Category_Label%", $CatListHead, $ProdListString);
					$ProdDetailString = str_replace("%Category_Label%", $CatDetailHead, $ProdDetailString);
				}
				else {
					$ProdThumbString = str_replace("%Category_Label%", "", $ProdThumbString);
					$ProdListString = str_replace("%Category_Label%", "", $ProdListString);
					$ProdDetailString = str_replace("%Category_Label%", "", $ProdDetailString);
				}
						
				$ProdThumbString .= "</div>";
				$ProdListString .= "</div>";
				$ProdDetailString .= "</div>";
			}
		}
				
		// If the item is a sub-category, then add the appropriate extra HTML and call the AddProduct function
		// for each individual product in the sub-category
		if ($CatalogueItem->SubCategory_ID != "" and $CatalogueItem->SubCategory_ID != 0) {
			if (sizeOf($subcategory) == 0 or in_array($CatalogueItem->SubCategory_ID, $subcategory)) {
				$Products = $wpdb->get_results("SELECT * FROM $items_table_name WHERE SubCategory_ID=" . $CatalogueItem->SubCategory_ID);
						
				foreach ($Products as $Product) {
					$ProdTagObj = $wpdb->get_results("SELECT Tag_ID FROM $tagged_items_table_name WHERE Item_ID=" . $CatalogueItem->Item_ID);
					if ($ajax_reload == "No") {
						$Prod_Custom_Fields = $wpdb->get_results("SELECT Field_ID, Meta_Value FROM $fields_meta_table_name WHERE Item_ID=" . $Product->Item_ID);
					}
								
					if ($Product->Item_Display_Status != "Hide") {
						if (sizeOf($category) == 0 or in_array($Product->Category_ID, $category)) {
							if (sizeOf($subcategory) == 0 or in_array($Product->SubCategory_ID, $subcategory)) {
								$ProdTag = ObjectToArray($ProdTagObj);
								$Tag_Check = CheckTags($tags, $ProdTag, $Tag_Logic);
								if ($Tag_Check == "Yes") {
									$Custom_Field_Check = Custom_Field_Check($Custom_Fields_Sql_String, $Custom_Field_Count, $Product->Item_ID);
									if ($Custom_Field_Check == "Yes") {
										$Name_Search_Match = SearchProductName($Product->Item_ID, $Product->Item_Name, $Product->Item_Description, $prod_name, $CaseInsensitiveSearch, $ProductSearch);
										if ($Name_Search_Match == "Yes") {
											$Pagination_Check = CheckPagination($Product_Count, $products_per_page, $current_page, $Filtered);
											if ($Pagination_Check == "OK") {
												$HeaderBar .= "<a id='hidden_FB_link-" . $Product->Item_ID . "' class='fancybox' href='#prod-cat-addt-details-" . $Product->Item_ID . "'></a>";
												if (!in_array("Thumbnail", $ExcludedLayouts)) {$ProdThumbString .= UPCP_AddProduct("Thumbnail", $Product->Item_ID, $Product, $ProdTagObj, $ajax_reload, $ajax_url);}
												if (!in_array("List", $ExcludedLayouts)) {$ProdListString .= UPCP_AddProduct("List", $Product->Item_ID, $Product, $ProdTagObj, $ajax_reload, $ajax_url);}
												if (!in_array("Detail", $ExcludedLayouts)) {$ProdDetailString .= UPCP_AddProduct("Detail", $Product->Item_ID, $Product, $ProdTagObj, $ajax_reload, $ajax_url);}
											}	
											$Product_Count++;
										}
					}}}}}
					if ($ajax_reload == "No") {FilterCount($Product, $ProdTagObj, $Prod_Custom_Fields);}
					unset($NameSearchMatch);
				}
		}}
				
		//if ($Pagination_Check == "Over") {break;}
	}

	if ($Product_Count == 0) {
		$ProdThumbString .= $No_Results_Found_Label;
		$ProdListString .= $No_Results_Found_Label;
		$ProdDetailString .= $No_Results_Found_Label;
	}
				
	$ProdThumbString .= "<div class='upcp-clear'></div>\n";
	$ProdListString .= "<div class='upcp-clear'></div>\n";
	$ProdDetailString .= "<div class='upcp-clear'></div>\n";
		
	if ($Pagination_Location == "Bottom" or $Pagination_Location == "Both") {
		$ProdThumbString .= "%upcp_pagination_placeholder_bottom%";
		$ProdListString .= "%upcp_pagination_placeholder_bottom%";
		$ProdDetailString .= "%upcp_pagination_placeholder_bottom%";
				
		/*$ProdThumbString .= "<div class='upcp-clear'></div>\n";
		$ProdListString .= "<div class='upcp-clear'></div>\n";
		$ProdDetailString .= "<div class='upcp-clear'></div>\n";*/
	}
		
	$ProdThumbString .= "</div>\n";
	$ProdListString .= "</div>\n";
	$ProdDetailString .= "</div>\n";
		
	if (in_array("Thumbnail", $ExcludedLayouts)) {unset($ProdThumbString);}
	if (in_array("List", $ExcludedLayouts)) {unset($ProdListString);}
	if (in_array("Detail", $ExcludedLayouts)) {unset($ProdDetailString);}
		
	//Deal with creating the page counter, if pagination is neccessary
	if ($Filtered == "Yes") {$Total_Products = $Product_Count;}
	else {$Total_Products = $Catalogue->Catalogue_Item_Count;}
		
	if ($Total_Products > $products_per_page) {
		$Num_Pages = ceil($Total_Products / $products_per_page);
				
		$PrevPage = max($current_page - 1, 1);
		$NextPage = min($current_page + 1, $Num_Pages);
				
		$PaginationString .= "<div class='catalogue-nav ";
		$PaginationString .= "upcp-cat-nav-bg-" . $Pagination_Background . " ";
		$PaginationString .= "upcp-cat-nav-border-" . $Pagination_Border . " ";
		$PaginationString .= "upcp-cat-nav-" . $Pagination_Shadow . " ";
		$PaginationString .= "upcp-cat-nav-" . $Pagination_Gradient . " ";
		$PaginationString .= "'>";
		$PaginationString .= "<span class='displaying-num'>" . $Total_Products . $Products_Pagination_Text . "</span>";
		$PaginationString .= "<span class='pagination-links'>";
		$PaginationString .= "<a class='first-page' title='Go to the first page' href='#' onclick='UPCP_DisplayPage(\"1\")'>&#171;</a>";
		$PaginationString .= "<a class='prev-page' title='Go to the previous page' href='#' onclick='UPCP_DisplayPage(\"" . $PrevPage . "\")'>&#8249;</a>";
		$PaginationString .= "<span class='paging-input'>" . $current_page . __(' of ', 'UPCP') . "<span class='total-pages'>" . $Num_Pages . "</span></span>";
		$PaginationString .= "<a class='next-page' title='Go to the next page' href='#' onclick='UPCP_DisplayPage(\"" . $NextPage . "\")'>&#8250;</a>";
		$PaginationString .= "<a class='last-page' title='Go to the last page' href='#' onclick='UPCP_DisplayPage(\"" . $Num_Pages . "\")'>&#187;</a>";
		$PaginationString .= "</span>";
		$PaginationString .= "</div>";
				
		if ($current_page == 1) {$PaginationString = str_replace("first-page", "first-page disabled", $PaginationString);}
		if ($current_page == 1) {$PaginationString = str_replace("prev-page", "prev-page disabled", $PaginationString);}
		if ($current_page == $Num_Pages) {$PaginationString = str_replace("next-page", "next-page disabled", $PaginationString);}
		if ($current_page == $Num_Pages) {$PaginationString = str_replace("last-page", "last-page disabled", $PaginationString);}
		/*if ($current_page != 1) {$PaginationString .= "<a href='#' onclick='UPCP_DisplayPage(\"1\")>" . __('First', 'UPCP') . "</a>";}
		if ($current_page != 1) {$PaginationString .= "<a href='#' onclick='UPCP_DisplayPage(\"" . $current_page - 1 . "\")>" . __('Previous', 'UPCP') . "</a>";}
				
		$PaginationString .= "<span class='paging-input'>" . $current_page . __(' of ', 'UPCP') . "<span class='total-pages'>" . $Num_Pages . "</span></span>";
				
		if ($current_page != $Num_Pages) {$PaginationString .= "<a href='#' onclick='UPCP_DisplayPage(\"" . $current_page + 1 . "\")>" . __('Next', 'UPCP') . "</a>";}
		if ($current_page != $Num_Pages) {$PaginationString .= "<a href='#' onclick='UPCP_DisplayPage(\"" . $Num_Pages . "\")>" . __('Last', 'UPCP') . "</a>";}*/
	}		
	if ($Pagination_Location == "Bottom") {
		$ProdThumbString = str_replace("%upcp_pagination_placeholder_top%", "", $ProdThumbString);
		$ProdListString = str_replace("%upcp_pagination_placeholder_top%", "", $ProdListString);
		$ProdDetailString = str_replace("%upcp_pagination_placeholder_top%", "", $ProdDetailString);
	}
	if ($Pagination_Location == "Top") {
		$ProdThumbString = str_replace("%upcp_pagination_placeholder_bottom%", "", $ProdThumbString);
		$ProdListString = str_replace("%upcp_pagination_placeholder_bottom%", "", $ProdListString);
		$ProdDetailString = str_replace("%upcp_pagination_placeholder_bottom%", "", $ProdDetailString);
	}
				
	$ProdThumbString = str_replace("%upcp_pagination_placeholder_top%", $PaginationString, $ProdThumbString);
	$ProdListString = str_replace("%upcp_pagination_placeholder_top%", $PaginationString, $ProdListString);
	$ProdDetailString = str_replace("%upcp_pagination_placeholder_top%", $PaginationString, $ProdDetailString);
	$ProdThumbString = str_replace("%upcp_pagination_placeholder_bottom%", $PaginationString, $ProdThumbString);
	$ProdListString = str_replace("%upcp_pagination_placeholder_bottom%", $PaginationString, $ProdListString);
	$ProdDetailString = str_replace("%upcp_pagination_placeholder_bottom%", $PaginationString, $ProdDetailString);
		
	// Create string from the arrays, should use the implode function instead
	foreach ($ProdCats as $key=>$value) {$ProdCatString .= $key . ",";}
	$ProdCatString = trim($ProdCatString, " ,");
	foreach ($ProdSubCats as $key=>$value) {$ProdSubCatString .= $key . ",";}
	$ProdSubCatString = trim($ProdSubCatString, " ,");
	foreach ($ProdTags as $key=>$value) {$ProdTagString .= $key . ",";}
	$ProdTagString = trim($ProdTagString, " ,");
	foreach ($ProdCustomFields as $key=>$value) {$ProdCustomFieldsString .= $key . ",";}
	$ProdCustomFieldsString = trim($ProdCustomFieldsString, " ,");
		
	// If the sidebar is requested, add it
	if (($sidebar == "Yes" or $sidebar == "yes" or $sidebar == "YES") and $only_inner != "Yes") {
		$SidebarString = BuildSidebar($category, $subcategory, $tags, $prod_name);
	}
		
	if ($Mobile_Style == "Yes") {
		$MobileMenuString .= "<div id='prod-cat-mobile-menu' class='upcp-mobile-menu'>\n";
		$MobileMenuString .= "<div id='prod-cat-mobile-search'>\n";
		if ($Tag_Logic == "OR") {$MobileMenuString .= "<input type='text' id='upcp-mobile-search' class='jquery-prod-name-text mobile-search' name='Mobile_Search' value='" . __('Product Name', 'UPCP') . "...' onfocus='FieldFocus(this);' onblur='FieldBlur(this);' onkeyup='UPCP_Filer_Results_OR();'>\n";}
		else {$MobileMenuString .= "<input type='text' id='upcp-mobile-search' class='jquery-prod-name-text mobile-search' name='Mobile_Search' value='" . __('Product Name', 'UPCP') . "...' onfocus='FieldFocus(this);' onblur='FieldBlur(this);'  onkeyup='UPCP_Filer_Results();'>\n";}
		$MobileMenuString .= "</div>";
		$MobileMenuString .= "</div>";
	}
	
	if ($Show_Catalogue_Information != "None") {
		$HeaderBar .= "<div class='prod-cat-information'>";
		if ($Show_Catalogue_Information == "NameDescription" or $Show_Catalogue_Information == "Name") {
			$HeaderBar .= "<div class='prod-cat-information-name'><h3>";
			$HeaderBar .= $Catalogue->Catalogue_Name;
			$HeaderBar .= "</h3></div>";
		}
		if ($Show_Catalogue_Information == "NameDescription" or $Show_Catalogue_Information == "Description") {
			$HeaderBar .= "<div class='prod-cat-information-description'>";
			$HeaderBar .= $Catalogue->Catalogue_Description;
			$HeaderBar .= "</div>";
		}
		$HeaderBar .= "</div>";
	}

	$HeaderBar .= "<div class='prod-cat-header-div " . $Color . "-prod-cat-header-div'>";
	$HeaderBar .= "<div class='prod-cat-header-padding'></div>";
	$HeaderBar .= "<div id='starting-layout' class='hidden-field'>" . $Starting_Layout . "</div>";
	if (!in_array("Thumbnail", $ExcludedLayouts)) {
		$HeaderBar .= "<a href='#' onclick='ToggleView(\"Thumbnail\");return false;' title='Thumbnail'><div class='upcp-thumb-toggle-icon " . $Color . "-thumb-icon'></div></a>";
	}
	if (!in_array("List", $ExcludedLayouts)) {
		$HeaderBar .= "<a href='#' onclick='ToggleView(\"List\"); return false;' title='List'><div class='upcp-list-toggle-icon " . $Color . "-list-icon'></div></a>";
	}
	if (!in_array("Detail", $ExcludedLayouts)) {
		$HeaderBar .= "<a href='#' onclick='ToggleView(\"Detail\"); return false;' title='Detail'><div class='upcp-details-toggle-icon " . $Color . "-details-icon'></div></a>";
	}
	$HeaderBar .= "<div class='upcp-clear'></div>";
	$HeaderBar .= "</div>";
	
	$Bottom_JS .= "<script language='JavaScript' type='text/javascript'>";	
	if (isset($_GET['Product_ID'])) {$Bottom_JS .= "jQuery(window).load(OpenProduct('" . $_GET['Product_ID'] . "'));";}
	$Bottom_JS .= "</script>";
		
	if ($only_inner != "Yes") {$InnerString .= "<div class='prod-cat-inner'>";}
	$InnerString .= $ProdThumbString . "<div class='upcp-clear'></div>" . $ProdListString . "<div class='upcp-clear'></div>" . $ProdDetailString . "<div class='upcp-clear'></div>";
	if ($only_inner != "Yes") {$InnerString .= "</div>";}
	if (function_exists("mb_convert_encoding")) {$InnerString = mb_convert_encoding($InnerString, 'UTF-8');}
	else {$InnerString = htmlspecialchars_decode(utf8_decode(htmlentities($InnerString, ENT_COMPAT, 'utf-8', false)));}

	if ($only_inner == "Yes") {
		if ($Inner_Filter == "Yes") {$InnerString = apply_filters('the_content', $InnerString);}
		$ReturnArray['request_count'] = $request_count;
		$ReturnArray['message'] = $InnerString;
		
		$PHP_Version = UPCP_Return_PHP_Version();
		if ($PHP_Version > 50300) {return json_encode($ReturnArray, JSON_UNESCAPED_UNICODE);}
		else {return json_encode($ReturnArray);}
	}
		
	$ProductString .= "<div class='prod-cat-container'>";
	$ProductString .= $HeaderBar;
	$ProductString .= $MobileMenuString;
	$ProductString .= $SidebarString;
	$ProductString .= $InnerString;
	$ProductString .= $Bottom_JS;
	$ProductString .= "<div class='upcp-clear'></div></div>";
	
	return $ProductString;
}
add_shortcode("product-catalogue", "Insert_Product_Catalog");
add_shortcode("product-catalog", "Insert_Product_Catalog");

function Insert_Minimal_Products($atts) {
	global $wpdb, $items_table_name, $catalogue_items_table_name;

	// Get the attributes passed by the shortcode, and store them in new variables for processing
	extract( shortcode_atts( array(
				"catalogue_url" => "",
				"product_ids" => "",
				"catalogue_id" => "",
				"category_id" => "",
				"subcategory_id" => "",
				"product_count" => 3,
				"products_wide" => 3),
			$atts
		)
	);

	// If there's a product select, return that product
	if ((get_query_var('single_product') != "" or $_GET['SingleProduct'] != "") and $catalogue_url == "") {
		return do_shortcode("[product-catalogue]");
	}

	$ProductString .= "<div class='upcp-minimal-catalogue upcp-minimal-width-" . $products_wide . "'>";
	if ($product_ids != "") {
		$Product_Array = explode(",", $product_ids);
		foreach ($Product_Array as $Product) {$Products_String .= $Product . ",";}
		$Products_String = substr($Products_String, 0, -1);
		$Products = $wpdb->get_results("SELECT * FROM $items_table_name WHERE Item_ID IN (" . $Products_String . ")");
	}
	elseif ($catalogue_id != "") {
		$Item_IDs = "'999999',";
		$Category_IDs = "'999999',";
		$SubCategory_IDs = "'999999',";
		$Catalogue_Items = $wpdb->get_results("SELECT * FROM $catalogue_items_table_name WHERE Catalogue_ID='" . $catalogue_id . "'");
		foreach ($Catalogue_Items as $Catalogue_Item) {
			if ($Catalogue_Item->Item_ID != 0) {$Item_IDs .= "'" . $Catalogue_Item->Item_ID . "',";}
			elseif ($Catalogue_Item->Category_ID != 0) {$Category_IDs .= "'" . $Catalogue_Item->Category_ID . "',";}
			elseif ($Catalogue_Item->SubCategory_ID != 0) {$SubCategory_IDs = "'" . $Catalogue_Item->SubCategory_ID . "',";}
		}
		$Item_IDs = substr($Item_IDs, 0, -1);
		$Category_IDs = substr($Category_IDs, 0, -1);
		$SubCategory_IDs = substr($SubCategory_IDs, 0, -1);
		$Products = $wpdb->get_results("SELECT * FROM $items_table_name WHERE Item_ID IN (" . $Item_IDs . ") OR Category_ID IN (" . $Category_IDs . ") OR SubCategory_ID IN (" . $SubCategory_IDs . ") ORDER BY rand() LIMIT " . $product_count);
	}
	elseif ($category_id != "") {
		$Products = $wpdb->get_results("SELECT * FROM $items_table_name WHERE  Category_ID='" . $category_id . "' ORDER BY rand() LIMIT " . $product_count);
	}
	elseif ($subcategory_id != "") {
		$Products = $wpdb->get_results("SELECT * FROM $items_table_name WHERE  SubCategory_ID='" . $subcategory_id . "' ORDER BY rand() LIMIT " . $product_count);
	}
	else {
		$Products = $wpdb->get_results("SELECT * FROM $items_table_name WHERE Item_Date_Created!='0000-00-00 00:00:00' ORDER BY Item_Date_Created ASC LIMIT " . $product_count);
	}
	foreach ($Products as $Product) {
		$ProductString .= "<div class='upcp-insert-product upcp-minimal-product-listing'>";
		$ProductString .= Build_Minimal_Product_Listing($Product, $catalogue_url);
		$ProductString .= "</div>";
	}
	
	$ProductString .= "</div>";

	return $ProductString;
}
add_shortcode("insert-products", "Insert_Minimal_Products");

/* Function to add the HTML for an individual product to the catalog */
function UPCP_AddProduct($format, $Item_ID, $Product, $Tags, $AjaxReload = "No", $AjaxURL = "") {
	// Add the required global variables
	global $wpdb, $categories_table_name, $subcategories_table_name, $tags_table_name, $tagged_items_table_name, $catalogues_table_name, $catalogue_items_table_name, $items_table_name, $item_images_table_name, $item_videos_table_name;
	global $ProdCats, $ProdSubCats, $ProdTags, $ProdCustomFields, $link_base;

	$ReadMore = get_option("UPCP_Read_More");
	$Links = get_option("UPCP_Product_Links");
	$Pretty_Links = get_option("UPCP_Pretty_Links");
	$Detail_Desc_Chars = get_option("UPCP_Desc_Chars");
	$CF_Conversion = get_option("UPCP_CF_Conversion");
	$Thumbnail_Support = get_option("UPCP_Thumbnail_Support");

	$Details_Label = get_option("UPCP_Details_Label");
	if ($Details_Label != "") {$Details_Text = $Details_Label;}
	else {$Details_Text = __("Details", 'UPCP');}
	if (get_option("UPCP_Read_More_Label") != "") {$Read_More_Label = get_option("UPCP_Read_More_Label");}
	else {$Read_More_Label = __("Read More", 'UPCP');}

	if ($Links == "New") {$NewWindow = true;}
	else {$NewWindow = false;}
		
	if ($CF_Conversion != "No") {$Description = ConvertCustomFields($Product->Item_Description, $Item_ID);}
	else {$Description = $Product->Item_Description;}
	$Description = apply_filters('upcp_description_filter', str_replace("[upcp-price]", $Product->Item_Price, $Description), array("Item_ID" => $Product->Item_ID));
		
	//Select the product info, tags and images for the product
	$Item_Images = $wpdb->get_results("SELECT Item_Image_URL, Item_Image_ID FROM $item_images_table_name WHERE Item_ID=" . $Item_ID . " ORDER BY Item_Image_Order");
	$TagsString = "";
		
	if ($Product->Item_Photo_URL != "" and strlen($Product->Item_Photo_URL) > 7 and substr($Product->Item_Photo_URL, 0, 7) != "http://" and substr($Product->Item_Photo_URL, 0, 8) != "https://") {
		$PhotoCode = $Product->Item_Photo_URL;
		$PhotoCode = do_shortcode($PhotoCode);
	}
	elseif ($Product->Item_Photo_URL != "" and strlen($Product->Item_Photo_URL) > 7) {
		$PhotoURL = htmlspecialchars($Product->Item_Photo_URL, ENT_QUOTES);
		if ($Thumbnail_Support == "Yes") {
			$Post_ID = UPCP_getIDfromGUID($PhotoURL);
			if ($Post_ID != "") {$PhotoURL = substr($PhotoURL, 0, -4) . "-300x300" . substr($PhotoURL, strlen($PhotoURL) - 4);}
		}
		$PhotoCode = "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-thumb-" . $Product->Item_ID . "' class='prod-cat-thumb-image upcp-thumb-image'>";
	}
	else {
		$PhotoURL = plugins_url('ultimate-product-catalogue/images/No-Photo-Available.png');
		$PhotoCode = "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-thumb-" . $Product->Item_ID . "' class='prod-cat-thumb-image upcp-thumb-image'>";
	}
		
	//Create the tag string for filtering
	foreach ($Tags as $Tag) {$TagsString .= $Tag->Tag_ID . ", ";}
	$TagsString = trim($TagsString, " ,");
		
	// Check whether the FancyBox for WordPress plugin is activated
	$plugin = "fancybox-for-wordpress/fancybox.php";
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$FancyBox_Installed = is_plugin_active($plugin);
		
	$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
	$FB_Perm_URL = $uri_parts[0] . "?" . $uri_parts[1];
	if ($uri_parts[1] == "") {$FB_Perm_URL .= "Product_ID=" . $Product->Item_ID;}
	else {$FB_Perm_URL .= "&Product_ID=" . $Product->Item_ID;}
		
	if ($AjaxReload == "Yes") {$Base = $AjaxURL;}
	else {$Base = $uri_parts[0];}
		
	if (trim($Product->Item_Link) != "") {$ItemLink = $Product->Item_Link;}
	elseif ($FancyBox_Installed) {$ItemLink = "#prod-cat-addt-details-" . $Product->Item_ID; $FancyBoxClass = true;}
	elseif ($link_base != "") {$ItemLink = $link_base . "?" . $uri_parts[1] . "&SingleProduct=" . $Product->Item_ID;}
	elseif ($Pretty_Links == "Yes") {$ItemLink = $Base . "product/" . $Product->Item_Slug . "/?" . $uri_parts[1];}
	else {$ItemLink = $Base . "?" . $uri_parts[1] . "&SingleProduct=" . $Product->Item_ID;}

	//Create the listing for the thumbnail layout display
	if ($format == "Thumbnail") {				
		$ProductString .= "<div id='prod-cat-item-" . $Product->Item_ID . "' class='prod-cat-item upcp-thumb-item'>\n";
		$ProductString .= "<div id='prod-cat-thumb-div-" . $Product->Item_ID . "' class='prod-cat-thumb-image-div upcp-thumb-image-div'>";
		$ProductString .= "<a class='upcp-catalogue-link ";
		if ($FancyBoxClass and !$NewWindow) {$ProductString .= "fancybox";}
		$ProductString .= "' ";
		if ($NewWindow) {$ProductString .= "target='_blank'";}
		$ProductString .= " href='" . $ItemLink . "' onclick='RecordView(" . $Product->Item_ID . ");'>";
		$ProductString .= apply_filters('upcp_image_div', $PhotoCode, array('Item_ID' => $Product->Item_ID, 'Image_URL' => $Product->Item_Photo_URL, 'Layout' => $format));
		$ProductString .= "</a>";	
		$ProductString .= "</div>\n";
		$ProductString .= "<div id='prod-cat-title-" . $Product->Item_ID . "' class='prod-cat-title upcp-thumb-title'>";
		$ProductString .= "<a class='upcp-catalogue-link ";
		if ($FancyBoxClass and !$NewWindow) {$ProductString .= "fancybox";}
		$ProductString .= " no-underline'";
		if ($NewWindow) {$ProductString .= "target='_blank'";}
		$ProductString .= " href='" . $ItemLink . "' onclick='RecordView(" . $Product->Item_ID . ");'>" . apply_filters('upcp_title_div', $Product->Item_Name, array('Item_ID' => $Product->Item_ID, 'Item_Title' => $Product->Item_Name, 'Layout' => $format)) . "</a>";
		$ProductString .= AddCustomFields($Product->Item_ID, "thumbs");
		$ProductString .= "</div>\n";
		$ProductString .= apply_filters('upcp_price_div', "<div id='prod-cat-price-" . $Product->Item_ID . "' class='prod-cat-price upcp-thumb-price'>" . $Product->Item_Price . "</div>", array('Item_ID' => $Product->Item_ID, 'Item_Price' => $Product->Item_Price, 'Layout' => $format)) . "\n";
		$ProductString .= "<a class='upcp-catalogue-link ";
		if ($FancyBoxClass and !$NewWindow) {$ProductString .= "fancybox";}
		$ProductString .= "' ";
		if ($NewWindow) {$ProductString .= "target='_blank'";}
		$ProductString .= " href='" . $ItemLink . "' onclick='RecordView(" . $Product->Item_ID . ");'>";
		$ProductString .= apply_filters('upcp_details_link_div', "<div id='prod-cat-details-link-" . $Product->Item_ID . "' class='prod-cat-details-link upcp-thumb-details-link'>" . $Details_Text . "</div>", array('Item_ID' => $Product->Item_ID, 'Layout' => $format)) ."\n";
		$ProductString .= "</a>";
	}
	//Create the listing for the list layout display
	if ($format == "List") {				
		$ProductString .= "<div id='prod-cat-item-" . $Product->Item_ID . "' class='prod-cat-item upcp-list-item'>\n";
		$ProductString .= apply_filters('upcp_title_div', "<div id='prod-cat-title-" . $Product->Item_ID . "' class='prod-cat-title upcp-list-title' onclick='ToggleItem(" . $Product->Item_ID . ");'>" . $Product->Item_Name . "</div>", array('Item_ID' => $Product->Item_ID, 'Item_Title' => $Product->Item_Name, 'Layout' => $format)) . "\n";
		$ProductString .= "<div id='prod-cat-price-" . $Product->Item_ID . "' class='prod-cat-price upcp-list-price' onclick='ToggleItem(" . $Product->Item_ID . ");'>" . $Product->Item_Price . "</div>\n";
		$ProductString .= "<div id='prod-cat-details-" . $Product->Item_ID . "' class='prod-cat-details upcp-list-details hidden-field'>\n";
		$ProductString .= "<div id='prod-cat-thumb-div-" . $Product->Item_ID . "' class='prod-cat-thumb-image-div upcp-list-image-div'>";
		$ProductString .= "<a class='upcp-catalogue-link ";
		if ($FancyBoxClass and !$NewWindow) {$ProductString .= "fancybox";}
		$ProductString .= "' ";
		if ($NewWindow) {$ProductString .= "target='_blank'";}
		$ProductString .= " href='" . $ItemLink . "' onclick='RecordView(" . $Product->Item_ID . ");'>";
		$ProductString .= apply_filters('upcp_image_div', $PhotoCode, array('Item_ID' => $Product->Item_ID, 'Image_URL' => $Product->Item_Photo_URL, 'Layout' => $format));
		$ProductString .= "</a>";
		$ProductString .= "</div>\n";
		$ProductString .= "<div id='prod-cat-desc-" . $Product->Item_ID . "' class='prod-cat-desc upcp-list-desc'>" . $Description . "</div>\n";
		$ProductString .= AddCustomFields($Product->Item_ID, "list");
		$ProductString .= "<a class='upcp-catalogue-link ";
		if ($FancyBoxClass and !$NewWindow) {$ProductString .= "fancybox";}
		$ProductString .= "' ";
		if ($NewWindow) {$ProductString .= "target='_blank'";}
		$ProductString .= " href='" . $ItemLink . "' onclick='RecordView(" . $Product->Item_ID . ");'>";
		$ProductString .= apply_filters('upcp_details_link_div', "<div id='prod-cat-details-link-" . $Product->Item_ID . "' class='prod-cat-details-link upcp-list-details-link'>" . __("Images", 'UPCP') . "</div>", array('Item_ID' => $Product->Item_ID, 'Layout' => $format)) . "\n";
		$ProductString .= "</a>";
		$ProductString .= "</div>";
	}
	//Create the listing for the detail layout display
	if ($format == "Detail") {				
		$ProductString .= "<div id='prod-cat-item-" . $Product->Item_ID . "' class='prod-cat-item upcp-detail-item'>\n";
		$ProductString .= "<div id='prod-cat-detail-div-" . $Product->Item_ID . "' class='prod-cat-thumb-image-div upcp-detail-image-div'>";
		$ProductString .= "<a class='upcp-catalogue-link ";
		if ($FancyBoxClass and !$NewWindow) {$ProductString .= "fancybox";}
		$ProductString .= "' ";
		if ($NewWindow) {$ProductString .= "target='_blank'";}
		$ProductString .= " href='" . $ItemLink . "' onclick='RecordView(" . $Product->Item_ID . ");'>";
		$ProductString .= apply_filters('upcp_image_div', $PhotoCode, array('Item_ID' => $Product->Item_ID, 'Image_URL' => $Product->Item_Photo_URL, 'Layout' => $format));
		$ProductString .= "</a>";	
		$ProductString .= "</div>\n";
		$ProductString .= "<div id='prod-cat-mid-div-" . $Product->Item_ID . "' class='prod-cat-mid-detail-div upcp-mid-detail-div'>";
		$ProductString .= "<a class='upcp-catalogue-link ";
		if ($FancyBoxClass and !$NewWindow) {$ProductString .= "fancybox";}
		$ProductString .= "' ";
		if ($NewWindow) {$ProductString .= "target='_blank'";}
		$ProductString .= " href='" . $ItemLink . "' onclick='RecordView(" . $Product->Item_ID . ");'>";
		$ProductString .= apply_filters('upcp_title_div', "<div id='prod-cat-title-" . $Product->Item_ID . "' class='prod-cat-title upcp-detail-title'>" . $Product->Item_Name . "</div>", array('Item_ID' => $Product->Item_ID, 'Item_Title' => $Product->Item_Name, 'Layout' => $format)) . "\n";
		$ProductString .= "</a>";
		if ($ReadMore == "Yes") {$ProductString .= "<div id='prod-cat-desc-" . $Product->Item_ID . "' class='prod-cat-desc upcp-detail-desc'>" . strip_tags(substr($Description, 0, $Detail_Desc_Chars));}
		else {$ProductString .= "<div id='prod-cat-desc-" . $Product->Item_ID . "' class='prod-cat-desc upcp-detail-desc'>" . strip_tags($Description);}
		if ($ReadMore == "Yes") {
			if (strlen($Description) > $Detail_Desc_Chars) {
				$ProductString .= "... <a class='upcp-catalogue-link ";
				if ($FancyBoxClass and !$NewWindow) {$ProductString .= "fancybox";}
				$ProductString .= "' ";
				if ($NewWindow) {$ProductString .= "target='_blank'";}
				$ProductString .= " href='" . $ItemLink . "' onclick='RecordView(" . $Product->Item_ID . ");'>" . $Read_More_Label . "</a>";
			}
		}
		$ProductString .= AddCustomFields($Product->Item_ID, "details");
		$ProductString .= "</div>\n";
		$ProductString .= "</div>";
		$ProductString .= "<div id='prod-cat-end-div-" . $Product->Item_ID . "' class='prod-cat-end-detail-div upcp-end-detail-div'>";
		$ProductString .= apply_filters('upcp_price_div', "<div id='prod-cat-price-" . $Product->Item_ID . "' class='prod-cat-price upcp-detail-price'>" . $Product->Item_Price . "</div>", array('Item_ID' => $Product->Item_ID, 'Item_Price' => $Product->Item_Price, 'Layout' => $format)) . "\n";
		$ProductString .= "<a class='upcp-catalogue-link ";
		if ($FancyBoxClass and !$NewWindow) {$ProductString .= "fancybox";}
		$ProductString .= "' ";
		if ($NewWindow) {$ProductString .= "target='_blank'";}
		$ProductString .= " href='" . $ItemLink . "' onclick='RecordView(" . $Product->Item_ID . ");'>";
		$ProductString .= apply_filters('upcp_details_link_div', "<div id='prod-cat-details-link-" . $Product->Item_ID . "' class='prod-cat-details-link upcp-detail-details-link'>" . $Details_Text . "</div>", array('Item_ID' => $Product->Item_ID, 'Layout' => $format)) . "\n";
		$ProductString .= "</a>";
		$ProductString .= "</div>";
	}
		
	if ($FancyBox_Installed) {
		$ProductString .= "<div style='display:none;' id='upcp-fb-" . $Product->Item_ID . "'>";
		$ProductString .= "<div id='prod-cat-addt-details-" . $Product->Item_ID . "' class='prod-cat-addt-details'>";
		$ProductString .= "<div id='prod-cat-addt-details-thumbs-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-thumbs-div'>";
		$ProductString .= "<img src='" . $PhotoURL . "' id='prod-cat-addt-details-thumb-P". $Product->Item_ID . "' class='prod-cat-addt-details-thumb' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"0\");'>";
		foreach ($Item_Images as $Image) {$ProductString .= "<img src='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) . "' id='prod-cat-addt-details-thumb-". $Image->Item_Image_ID . "' class='prod-cat-addt-details-thumb' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"" . $Image->Item_Image_ID . "\");'>";}
		$ProductString .= "</div>";
		$ProductString .= "<div id='prod-cat-addt-details-right-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-right-div'>";
		$ProductString .= "<h2 class='prod-cat-addt-details-title'><a class='no-underline' href='http://" . $_SERVER['HTTP_HOST'] . $FB_Perm_URL . "'>" . $Product->Item_Name . "<img class='upcp-product-url-icon' src='" . get_bloginfo('wpurl') . "/wp-content/plugins/ultimate-product-catalogue/images/insert_link.png' /></a></h2>";
		$ProductString .= "<div id='prod-cat-addt-details-main-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-main-div'>";
		$ProductString .= "<a class='upcp-no-pointer' onclick='return false'>";
		$ProductString .= "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-addt-details-main-" . $Product->Item_ID . "' class='prod-cat-addt-details-main'>";
		$ProductString .= "</a>";
		$ProductString .= "</div>";
		$ProductString .= "<div class='upcp-clear'></div>";
		$ProductString .= "<div id='prod-cat-addt-details-desc-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-desc-div'>";
		$ProductString .= $Description; 
		$ProductString .= AddCustomFields($Product->Item_ID, "details");
		$ProductString .= "</div>";
		$ProductString .= "</div></div></div>";
		//$ProductString .= "</div>";
	}
		
	// Add hidden fields with the category, sub-category and tag ID's for each product		
	$ProductString .= "<div id='prod-cat-category-jquery-" . $Product->Item_ID . "' class='prod-cat-category-jquery jquery-hidden'> " . $Product->Category_ID . ",</div>\n";
	$ProductString .= "<div id='prod-cat-subcategory-jquery-" . $Product->Item_ID . "' class='prod-cat-subcategory-jquery jquery-hidden'> " . $Product->SubCategory_ID . ",</div>\n";
	$ProductString .= "<div id='prod-cat-tag-jquery-" . $Product->Item_ID . "' class='prod-cat-tag-jquery jquery-hidden'> " . $TagsString . ",</div>\n";
	$ProductString .= "<div id='prod-cat-title-jquery-" . $Product->Item_ID . "' class='prod-cat-title-jquery jquery-hidden'> " . $Product->Item_Name . ",</div>\n";
	$ProductString .= "<div class='upcp-clear'></div>\n";
	$ProductString .= "</div>\n";
				
	return $ProductString;
}

function SingleProductPage() {
	global $wpdb, $items_table_name, $item_images_table_name, $fields_table_name, $fields_meta_table_name, $tagged_items_table_name, $tags_table_name, $tag_groups_table_name, $item_videos_table_name;
	global $link_base;
		
	$Pretty_Links = get_option("UPCP_Pretty_Links");
	$Filter_Title = get_option("UPCP_Filter_Title");
	$Extra_Elements_String = get_option("UPCP_Extra_Elements");
	$Extra_Elements = explode(",", $Extra_Elements_String);
	$Single_Page_Price = get_option("UPCP_Single_Page_Price");
	$Custom_Product_Page = get_option("UPCP_Custom_Product_Page");
	$Lightbox = get_option("UPCP_Lightbox");
	$Product_Inquiry_Form = get_option("UPCP_Product_Inquiry_Form");
	$Product_Reviews = get_option("UPCP_Product_Reviews");
	$Related_Type = get_option("UPCP_Related_Products");
	$Next_Previous = get_option("UPCP_Next_Previous");
	$Product_Page_Serialized = get_option("UPCP_Product_Page_Serialized");
	$Mobile_Product_Page_Serialized = get_option("UPCP_Product_Page_Serialized_Mobile");
	$PP_Grid_Width = get_option("UPCP_PP_Grid_Width");
	$PP_Grid_Height = get_option("UPCP_PP_Grid_Height");
	$Top_Bottom_Padding = get_option("UPCP_Top_Bottom_Padding");
	$Left_Right_Padding = get_option("UPCP_Left_Right_Padding");
	$CF_Conversion = get_option("UPCP_CF_Conversion");
	$Tabs_Array = get_option("UPCP_Tabs_Array");
	$Custom_Fields_Blank = get_option("UPCP_Custom_Fields_Blank");
	
	$TagGroupName = "";
	$Back_To_Catalogue_Label = get_option("UPCP_Back_To_Catalogue_Label");
	if ($Back_To_Catalogue_Label != "") {$Back_To_Catalogue_Text = $Back_To_Catalogue_Label;}
	else {$Back_To_Catalogue_Text = __("Back to Catalogue", 'UPCP');}
		
	if ($Pretty_Links == "Yes") {$Product = $wpdb->get_row($wpdb->prepare("SELECT * FROM $items_table_name WHERE Item_Slug=%s", trim(get_query_var('single_product'), "/? ")));}
	else {$Product = $wpdb->get_row($wpdb->prepare("SELECT * FROM $items_table_name WHERE Item_ID='%d'", $_GET['SingleProduct']));}
	$Item_Images = $wpdb->get_results("SELECT Item_Image_URL, Item_Image_ID FROM $item_images_table_name WHERE Item_ID=" . $Product->Item_ID . " ORDER BY Item_Image_Order");
	$Item_Videos = $wpdb->get_results("SELECT * FROM $item_videos_table_name WHERE Item_ID='" . $Product->Item_ID . "' ORDER BY Item_Video_Order ASC");

	$Links = get_option("UPCP_Product_Links");
	if ($CF_Conversion != "No") {$Description = ConvertCustomFields($Product->Item_Description, $Product->Item_ID);}
	else {$Description = $Product->Item_Description;}
	$Description = apply_filters('upcp_product_page_description', str_replace("[upcp-price]", $Product->Item_Price, do_shortcode($Description)), array('Item_ID' => $Product->Item_ID));
		
	//Edit the title if that option has been selected
	if ($Filter_Title == "Yes") {
		add_action( 'init', 'UPCP_Filter_Title', 20, $Product->Item_Name);
	}
		
	//Create the tag string for filtering
	$Tags = $wpdb->get_results("SELECT Tag_ID FROM $tagged_items_table_name WHERE Item_ID=" . $Product->Item_ID);
	if (is_array($Tags)) {
		foreach ($Tags as $Tag) {
			$TagInfo = $wpdb->get_row("SELECT Tag_Name FROM $tags_table_name WHERE Tag_ID=" . $Tag->Tag_ID);
			$TagsString .= $TagInfo->Tag_Name . ", ";
		}
	}
	$TagsString = trim($TagsString, " ,");
		
	if ($Product->Item_Photo_URL != "" and strlen($Product->Item_Photo_URL) > 7 and substr($Product->Item_Photo_URL, 0, 7) != "http://" and substr($Product->Item_Photo_URL, 0, 8) != "https://") {
		$PhotoCode = $Product->Item_Photo_URL;
		$PhotoCode = do_shortcode($PhotoCode);
	}
	elseif ($Product->Item_Photo_URL != "" and strlen($Product->Item_Photo_URL) > 7) {
		$PhotoURL = htmlspecialchars($Product->Item_Photo_URL, ENT_QUOTES);
		$PhotoCode .= "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-addt-details-main-" . $Product->Item_ID . "' class='prod-cat-addt-details-main'>";
		$PhotoCodeMobile .= "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-addt-details-main-mobile-" . $Product->Item_ID . "' class='prod-cat-addt-details-main'>";
	}
	else {
		$PhotoURL = plugins_url('ultimate-product-catalogue/images/No-Photo-Available.png');
		$PhotoCode .= "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-addt-details-main-" . $Product->Item_ID . "' class='prod-cat-addt-details-main'>";
		$PhotoCodeMobile .= "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-addt-details-main-mobile-" . $Product->Item_ID . "' class='prod-cat-addt-details-main'>";
	}

	if ($Lightbox == "Main") {$Disable_Featherlight = "upcp-disable-featherlight";}
	else {$Disable_Featherlight = "";}
		
	$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
	$SP_Perm_URL = $uri_parts[0] . "?" . $uri_parts[1];
	$Return_URL = $uri_parts[0];
	if ($link_base != "") {$Return_URL = $link_base;}
	elseif ($Pretty_Links == "Yes") {$Return_URL = substr($uri_parts[0], 0, strrpos($uri_parts[0], "/", -2)-8) . "/?" . $uri_parts[1];}
	elseif (strpos($uri_parts[1],  "page_id") !== false) {$Return_URL .= "?" . substr($uri_parts[1], 0, strpos($uri_parts[1], "&"));}

	if ($uri_parts[1] == "") {$SP_Perm_URL .= "Product_ID=" . $Product->Item_ID;}
	else {$SP_Perm_URL .= "&Product_ID=" . $Product->Item_ID;}
	$SP_Perm_URL_With_HTTP = "http://" . $_SERVER['HTTP_HOST'] . $SP_Perm_URL;

	$TagGroupNames = $wpdb->get_results("SELECT * FROM $tag_groups_table_name ORDER BY Tag_Group_Order ASC");
	$ProductVideos = $wpdb->get_results($wpdb->prepare("SELECT * FROM $item_videos_table_name WHERE Item_ID='%d' ORDER BY Item_Video_Order ASC", $Product->Item_ID));
			
	$upload_dir = wp_upload_dir();
	
	// Regular product page 
	if ($Custom_Product_Page == "No") {
		$ProductString .= "<div class='upcp-standard-product-page'>";
				
		$ProductString .= "<div class='prod-cat-back-link'>";
		$ProductString .= "<a class='upcp-catalogue-link' href='" . $Return_URL . "'>&#171; " . $Back_To_Catalogue_Text . "</a>";
		$ProductString .= "</div>";
		

		$ProductString .= "<div id='prod-cat-addt-details-" . $Product->Item_ID . "' class='prod-cat-addt-details'>";
		$ProductString .= "<h2 class='prod-cat-addt-details-title'><a class='no-underline' href='http://" . $_SERVER['HTTP_HOST'] . $SP_Perm_URL . "'>" . apply_filters('upcp_product_page_title', $Product->Item_Name, array('Item_ID' => $Product->Item_ID, 'Item_Title' => $Product->Item_Name)) . "<img class='upcp-product-url-icon' src='" . get_bloginfo('wpurl') . "/wp-content/plugins/ultimate-product-catalogue/images/insert_link.png' /></a></h2>";
		if ($Single_Page_Price == "Yes") {$ProductString .= "<h3 class='prod-cat-addt-details-price'>" . $Product->Item_Price . "</h3>";}
		
		$ProductString .= "<div id='prod-cat-addt-details-main-images-" . $Product->Item_ID . "' class='prod-cat-addt-details-main-image-div'>";
			$ProductString .= "<div id='prod-cat-addt-details-thumbs-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-thumbs-div'>";
			if (isset($PhotoURL)) {$ProductString .= "<a class='upcp-featherlight' href='" . $PhotoURL ."'><img src='" . $PhotoURL . "' id='prod-cat-addt-details-thumb-P". $Product->Item_ID . "' class='prod-cat-addt-details-thumb " . $Disable_Featherlight . "' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"0\");'></a>";}
			foreach ($Item_Images as $Image) {$ProductString .= "<a class='upcp-thumb-anchor upcp-featherlight' href='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) ."'><img src='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) . "' id='prod-cat-addt-details-thumb-". $Image->Item_Image_ID . "' class='prod-cat-addt-details-thumb " . $Disable_Featherlight . "' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"" . $Image->Item_Image_ID . "\");'></a>";}
			$ProductString .= "</div>";
			$ProductString .= "<div id='prod-cat-addt-details-main-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-main-div'>";
			$ProductString .= $PhotoCode;
			$ProductString .= "</div>";
		$ProductString .= "</div>";

		$ProductString .= "<div class='upcp-clear'></div>";
		

		$ProductString .= "<div id='prod-cat-addt-details-desc-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-desc-div'>";
		$ProductString .= UPCP_Add_Product_Page_Social_Media($Product, $SP_Perm_URL_With_HTTP);
		$ProductString .= $Description;
		
		if (is_array($Extra_Elements) and $Extra_Elements[0] != "Blank") {
		if (in_array("Category", $Extra_Elements)) {$ProductString .= "<div class='prod-category-container upcp-product-side-container'>\n<div class='upcp-side-title'>" . __('Category', 'UPCP') . ": </div>" . $Product->Category_Name . "</div>";}
			if (in_array("SubCategory", $Extra_Elements)) {$ProductString .= "<div class='prod-category-container upcp-product-side-container'>\n<div class='upcp-side-title'>" . __('Sub-Category', 'UPCP') . ": </div>" . $Product->SubCategory_Name . "</div>";}
			if (in_array("Tags", $Extra_Elements)) {$ProductString .= "<div class='prod-tag-container upcp-product-side-container'>\n<div class='upcp-side-title'>Tags:</div>" . $TagsString . "</div>";}
			if (in_array("CustomFields", $Extra_Elements)) {
				$ProductString .= "<div class='prod-cf-container upcp-product-side-container'>";
				$CustomFields = $wpdb->get_results("SELECT Field_ID, Meta_Value FROM $fields_meta_table_name WHERE Item_ID='" . $Product->Item_ID . "' ORDER BY Field_Sidebar_Order");
				foreach ($CustomFields as $CustomField) {
					$Field = $wpdb->get_row("SELECT Field_Name, Field_Type FROM $fields_table_name WHERE Field_ID='" . $CustomField->Field_ID . "'");
					if ($Field->Field_Type == "checkbox") {$ProductString .= "<div class='upcp-side-title'>" . $Field->Field_Name . ":</div>" . str_replace(",", ", ", $CustomField->Meta_Value) . "<br>";}
					else {$ProductString .= "<div class='upcp-side-title'>" . $Field->Field_Name . ":</div>" . $CustomField->Meta_Value . "<br>";}
				}
				$ProductString .= "</div>";
			}
		}
		$ProductString .= "</div>\n";

		$ProductString .= "<div class='upcp-clear'></div>\n";
		$ProductString .= "</div>\n";

		if (is_array($Extra_Elements) and $Extra_Elements[0] != "Blank") {
			// Display selected elements on the side of the page
			$ProductString .= "<div class='prod-details-right default-pp-related'>";
			
		if ($Related_Type == "Manual" or $Related_Type == "Auto") {$ProductString .= UPCP_Get_Related_Products($Product, $Related_Type);}
		if ($Next_Previous == "Manual" or $Next_Previous == "Auto") {$ProductString .= Get_Next_Previous($Product, $Next_Previous);}
		
		$ProductString .= "</div>\n";

			if (in_array("Videos", $Extra_Elements)) {
				$ProductString .= "<div class='prod-videos-container upcp-product-side-container'>";
				foreach ($Item_Videos as $Video) {
					$video_info = 'http://gdata.youtube.com/feeds/api/videos/' . $Video->Item_Video_URL;
		
					if($video_info != ""){
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $video_info);
						curl_setopt($ch, CURLOPT_HEADER, 0);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						
						$response = curl_exec($ch);
						curl_close($ch);
						
						if ($response and $response != "No longer available") {
							$xml   = new SimpleXMLElement($response);
							$ItemVideoDescription = (string) $xml->title;
						} else {
							$ItemVideoDescription = "No title available for this video";
						}
					} else{
						$ItemVideoDescription = $ItemVideoThumb;
					}
					$ProductString .= "<div class='upcp-side-title upcp-product-video'>" . $ItemVideoDescription . "</div>";
					$ProductString .= "<iframe width='300' height='225' src='http://www.youtube.com/embed/" . $Video->Item_Video_URL . "?rel=0&fs=1' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
				}
				$ProductString .= "</div>";
			}
			$ProductString .= "</div>";
		}
		if ($Product_Inquiry_Form == "Yes" ) {
			$ProductString .= "<div class='upcp-clear'></div>";
			$ProductString .= Add_Product_Inquiry_Form($Product);
		}
				
		$ProductString .= "</div>\n";
				
		$ProductString .= "<div class='upcp-standard-product-page-mobile'>";
				
		$ProductString .= "<div class='prod-cat-back-link'>";
		$ProductString .= "<a class='upcp-catalogue-link' href='" . $Return_URL . "'>&#171; " . $Back_To_Catalogue_Text . "</a>";
		$ProductString .= "</div>";
				
		$ProductString .= "<h2 class='prod-cat-addt-details-title'><a class='no-underline' href='" . $SP_Perm_URL_With_HTTP . "'>" . apply_filters('upcp_product_page_title', $Product->Item_Name, array('Item_ID' => $Product->Item_ID, 'Item_Title' => $Product->Item_Name)) . "<img class='upcp-product-url-icon' src='" . get_bloginfo('wpurl') . "/wp-content/plugins/ultimate-product-catalogue/images/insert_link.png' /></a></h2>";
		if ($Single_Page_Price == "Yes") {apply_filters('upcp_product_page_price', $ProductString .= "<h3 class='prod-cat-addt-details-price'>" . $Product->Item_Price . "</h3>", array('Item_ID' => $Product->Item_ID, 'Item_Price' => $Product->Item_Price));}
		$ProductString .= $PhotoCodeMobile;
		$ProductString .= "<div class='upcp-clear'></div>";
		
		$ProductString .= "<div id='prod-cat-addt-details-desc-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-desc-div'>";
		$ProductString .= $Description . "</div>";
		$ProductString .= "<div class='upcp-clear'></div>\n";

		$ProductString .= "<div id='prod-cat-addt-details-" . $Product->Item_ID . "' class='prod-cat-addt-details'>";
		$ProductString .= "<div id='prod-cat-addt-details-thumbs-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-thumbs-div'>";
		if (isset($PhotoURL)) {$ProductString .= "<img src='" . $PhotoURL . "' id='prod-cat-addt-details-thumb-P". $Product->Item_ID . "' class='prod-cat-addt-details-thumb' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"0\");'>";}
		foreach ($Item_Images as $Image) {$ProductString .= "<img src='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) . "' id='prod-cat-addt-details-thumb-". $Image->Item_Image_ID . "' class='prod-cat-addt-details-thumb' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"" . $Image->Item_Image_ID . "\");'>";}
		$ProductString .= "<div class='upcp-clear'></div>";
		$ProductString .= "</div>";


		$ProductString .= "</div>\n";
				
		$ProductString .= "</div>\n";
	}
	elseif ($Custom_Product_Page == "Tabbed") {
	
		if (get_option("UPCP_Product_Details_Label") != "") {$Product_Details_Label = get_option("UPCP_Product_Details_Label");}
		else {$Product_Details_Label = __("<span class='upcp-tab-break'>Product</span> <span class='upcp-tab-break'>Details</span>", 'UPCP');}
		if (get_option("UPCP_Additional_Info_Label") != "") {$Additional_Info_Label = get_option("UPCP_Additional_Info_Label");}
		else {$Additional_Info_Label = __("<span class='upcp-tab-break'>Additional</span> <span class='upcp-tab-break'>Information </span>", 'UPCP');}
		if (get_option("UPCP_Contact_Us_Label") != "") {$Contact_Us_Label = get_option("UPCP_Contact_Us_Label");}
		else {$Contact_Us_Label = __("<span class='upcp-tab-break'>Contact</span> <span class='upcp-tab-break'>Us</span>", 'UPCP');}


		$ProductString .= "<div class='upcp-tabbed-product-page'>";

		$ProductString .= "<div class='prod-cat-back-link'>";
		$ProductString .= "<a class='upcp-catalogue-link' href='" . $Return_URL . "'>&#171; " . $Back_To_Catalogue_Text . "</a>";
		$ProductString .= "</div>";

		$ProductString .= "<div class='upcp-tabbed-images-container'>";
		$ProductString .= "<div id='upcp-tabbed-main-image-div-" . $Product->Item_ID . "' class='upcp-tabbed-main-image-div'>";
		$ProductString .= "<div class='upcp-tabbed-main-image-inner'>";
		$ProductString .= "<div class='upcp-tabbed-image-container'>";
		$ProductString .= "<a href='" . $PhotoURL . "' class='upcp-featherlight prod-cat-addt-details-link-a'> ";
		$ProductString .= "  $PhotoCode " ;
		$ProductString .= "</a>";
		$ProductString .= "</div>";
		if (sizeOf($Item_Videos) > 0) {
			$ProductString .= "<div class='upcp-tabbed-video-container upcp-Hide-Item'>";
			$ProductString .= "<a href='#' class='upcp-featherlight prod-cat-addt-details-link-a'> ";
			$ProductString .= "<iframe width='420' height='315' class='upcp-main-video' src='http://www.youtube.com/embed/" . $Item_Videos[0]->Item_Video_URL . "' frameborder='0' allowfullscreen></iframe>";
			$ProductString .= "</a>";
			$ProductString .= "</div>";
		}
		$ProductString .= "</div>";
		$ProductString .= "</div>";

		$ProductString .= "<div class='upcp-clear'></div>";
	  	/*Slider container*/
		$ProductString .= "<div id='upcp-tabbed-image-thumbs-div-" . $Product->Item_ID . "' class='upcp-tabbed-image-thumbs-div'>";
	  	/*Back button*/
	  	$ProductString .= "<div class='upcp-tabbed-button-left-div upcp-tabbed-button-div'> ";
	  	$ProductString .= "<button class='upcp-tabbed-button-left'><</button>";
	  	$ProductString .= "</div>"; 
	  	/*Images*/
	  	$ProductString .= "<div class='upcp-scroll-content'> ";
	  	$ProductString .= "<ul class='upcp-scroll-list'>";
	  	
		if (isset($PhotoURL)) {$ProductString .= "<li class='upcp-tabbed-addt-img-thumbs'><a class='upcp-thumb-anchor upcp-featherlight' href='" . $PhotoURL ."'><img src='" . $PhotoURL . "' id='prod-cat-addt-details-thumb-P". $Product->Item_ID . "' class='upcp-tabbed-addt-details-thumb " . $Disable_Featherlight . "' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"0\");'></a></li>";}
		foreach ($Item_Images as $Image) {$ProductString .= "<li class='upcp-tabbed-addt-img-thumbs'><a class='upcp-thumb-anchor upcp-featherlight' href='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) . "'><img src='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) . "' id='prod-cat-addt-details-thumb-". $Image->Item_Image_ID . "' class='upcp-tabbed-addt-details-thumb " . $Disable_Featherlight . "' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"" . $Image->Item_Image_ID . "\");' ></a></li>";}
		foreach ($Item_Videos as $Video) {$ProductString .= "<li class='upcp-tabbed-addt-img-thumbs'><a class='upcp-thumb-anchor upcp-featherlight upcp-thumb-video' href='http://img.youtube.com/vi/" . $Video->Item_Video_URL . "/default.jpg' data-videoid='" . $Video->Item_Video_URL . "'><img src='http://img.youtube.com/vi/" . $Video->Item_Video_URL . "/default.jpg' id='prod-cat-addt-details-thumb-". $Image->Item_Image_ID . "' class='upcp-tabbed-addt-details-thumb " . $Disable_Featherlight . "'></a></li>";}
		//foreach ($Item_Videos as $Video) {$ProductString .= "<iframe width='300' height='225' src='http://www.youtube.com/embed/" . $Video->Item_Video_URL . "?rel=0&fs=1' webkitallowfullscreen mozallowfullscreen allowfullscreen onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"" . $Video->Video_ID . "\");'></iframe>";}
		
	  	/*Next button*/
	  	$ProductString .= "</ul>";
	  	$ProductString .= "</div>";
	  	$ProductString .= "<div class='upcp-tabbed-button-right-div upcp-tabbed-button-div'> ";
	  	$ProductString .= "<button class='upcp-tabbed-button-right'>></button>";
		$ProductString .= "</div>";
		$ProductString .= "</div>";
		$ProductString .= "</div>";

		$ProductString .= "<div class='upcp-tabbed-main-product-container'>";

		$ProductString .= "<div class='upcp-tabbed-main-product-details'>";
		$ProductString .= "<h2 class='upcp-tabbed-product-name'><a class='no-underline' href='" . $SP_Perm_URL_With_HTTP . "'>" . apply_filters('upcp_product_page_title', $Product->Item_Name, array('Item_ID' => $Product->Item_ID, 'Item_Title' => $Product->Item_Name)) . "</a></h2>";
		if ($Single_Page_Price == "Yes") {$ProductString .= apply_filters('upcp_product_page_price', "<h3 class='upcp-tabbed-product-price'>" . $Product->Item_Price . "</h3>", array('Item_ID' => $Product->Item_ID, 'Item_Price' => $Product->Item_Price));}

		$ProductString .= UPCP_Add_Product_Page_Social_Media($Product, $SP_Perm_URL_With_HTTP);
		$ProductString .= "</div>";

		$ProductString .= "<div id='upcp-tabbed-tabs-holder-" . $Product->Item_ID . "' class='upcp-tabbed-tabs-holder'>";

		$ProductString .= "<div class='upcp-tabbed-tabs-menu'>";
		$ProductString .= "<ul id='upcp-tabs'>";
		$ProductString .= "<li class='upcp-tabbed-layout-tab upcp-tabbed-description-menu' id='upcp-tabbed-tab'><a data-class='upcp-tabbed-description' class='upcp-tab-slide'>" . $Product_Details_Label . " </a></li>";
		$ProductString .= "<li class='upcp-tabbed-layout-tab upcp-tabbed-addtl-info-menu upcp-tab-layout-tab-unclicked ' id='upcp-tabbed-tab'><a data-class='upcp-tabbed-addtl-info' class='upcp-tab-slide'>" . $Additional_Info_Label . " </a></li>";
		if ($Product_Inquiry_Form == "Yes" ) {$ProductString .= "<li class='upcp-tabbed-layout-tab upcp-tabbed-contact-form-menu upcp-tab-layout-tab-unclicked' id='upcp-tabbed-tab'><a data-class='upcp-tabbed-contact-form' class='upcp-tab-slide'>" . $Contact_Us_Label . "</a></li>";}
		if ($Product_Reviews == "Yes" ) {$ProductString .= "<li class='upcp-tabbed-layout-tab upcp-tabbed-reviews-menu upcp-tab-layout-tab-unclicked' id='upcp-tabbed-tab'><a data-class='upcp-tabbed-reviews' class='upcp-tab-slide'> <span class='upcp-tab-break'>Customer</span> <span class='upcp-tab-break'>Reviews</span></a></li>";}
		if (is_array($Tabs_Array) and sizeof($Tabs_Array) > 0) {
			foreach ($Tabs_Array as $key => $Tab_Item ) {
				$ProductString .= "<li class='upcp-tabbed-layout-tab upcp-tabbed-" . $key . "-menu' id='upcp-tabbed-tab'><a data-class='upcp-tabbed-" . $key . "' class='upcp-tab-slide'>" . ConvertCustomFields($Tab_Item['Name'], $Product->Item_ID, $Product->Item_Name) . " </a></li>";
			}
		}
		$ProductString .= "</ul>";
		$ProductString .= "</div>";

		$ProductString .= "<div id='upcp-tabbed-description-" . $Product->Item_ID . "' class='upcp-tabbed-description upcp-tabbed-tab'>";
		$ProductString .= "<div id='upcp-tabbed-content'>";
		$ProductString .= $Description;
		$ProductString .= "</div>";
		$ProductString .= "</div>";

		$ProductString .= "<div id='upcp-tabbed-addtl-info-" . $Product->Item_ID . "' class='upcp-tabbed-addtl-info upcp-tabbed-tab upcp-Hide-Item'>";
			$ProductString .= "<div class='upcp-tabbed-details'>";
			$ProductString .= "<div id='upcp-tabbed-content'>";
			if (in_array("Category", $Extra_Elements)) {$ProductString .= "<div class='upcp-tabbed-category-container'>\n<div class='upcp-tab-title'>" . __('Category', 'UPCP') . ": </div>" . $Product->Category_Name . "</div>";}
			if (in_array("SubCategory", $Extra_Elements)) {$ProductString .= "<div class='upcp-tabbed-subcategory-container'>\n<div class='upcp-tab-title'>" . __('Sub-Category', 'UPCP') . ": </div>" . $Product->SubCategory_Name . "</div>";}
			if (in_array("Tags", $Extra_Elements)) {$ProductString .= "<div class='upcp-tabbed-tag-container'>\n<div class='upcp-tab-title'>Tags:</div>" . $TagsString . "</div>";}
			if (in_array("CustomFields", $Extra_Elements)) {
				$ProductString .= "<div class='upcp-tabbed-cf-container'>";
				$Fields = $wpdb->get_results("SELECT Field_Name, Field_ID, Field_Type FROM $fields_table_name WHERE Field_Display_Tabbed='Yes' ORDER BY Field_Sidebar_Order");
				foreach ($Fields as $Field) {
					$Value = $wpdb->get_row("SELECT Meta_Value FROM $fields_meta_table_name WHERE Item_ID='" . $Product->Item_ID . "'and Field_ID='" . $Field->Field_ID ."'");
					if ($Custom_Fields_Blank != "Yes" or $Value->Meta_Value != "") {
						if ($Field->Field_Type == "file") {
							$ProductString .= "<div class='upcp-tab-title'>" . $Field->Field_Name . ":</div>";
							$ProductString .= "<a href='" . $upload_dir['baseurl'] . "/upcp-product-file-uploads/" .$Value->Meta_Value . "' download>" . $Value->Meta_Value . "</a><br>";
						}
						elseif ($Field->Field_Type == "checkbox") {$ProductString .= "<div class='upcp-tab-title'>" . $Field->Field_Name . ":</div>" . str_replace(",", ", ", $Value->Meta_Value) . "<br>";}
						else {$ProductString .= "<div class='upcp-tab-title'>" . $Field->Field_Name . ":</div>" . $Value->Meta_Value . "<br>";}
					}
				}
				$ProductString .= "</div>";
			}
		$ProductString .= "</div>";
		$ProductString .= "</div>";
		$ProductString .= "</div>";

		if ($Product_Inquiry_Form == "Yes" ) {
			$ProductString .= "<div id='upcp-tabbed-contact-form-" . $Product->Item_ID . "' class='upcp-tabbed-contact-form upcp-tabbed-tab upcp-Hide-Item'>";
			$ProductString .= "<div id='upcp-tabbed-content'>";
			$ProductString .= Add_Product_Inquiry_Form($Product);
			$ProductString .= "</div>";
			$ProductString .= "</div>";
		}

		if ($Product_Reviews == "Yes" ) {
			$ProductString .= "<div id='upcp-tabbed-reviews-" . $Product->Item_ID . "' class='upcp-tabbed-reviews upcp-tabbed-tab upcp-Hide-Item'>";
			$ProductString .= "<div id='upcp-tabbed-content'>";
			$ProductString .= UPCP_Add_Product_Reviews($Product);
			$ProductString .= "</div>";
			$ProductString .= "</div>";
		}
		if (is_array($Tabs_Array) and sizeof($Tabs_Array) > 0) {
			foreach ($Tabs_Array as $key => $Tab_Item ) {
				$ProductString .= "<div id='upcp-tabbed-" . $key . "-" . $Product->Item_ID . "' class='upcp-tabbed-" . $key . " upcp-tabbed-tab upcp-Hide-Item'>";
				$ProductString .= "<div id='upcp-tabbed-content'>";
				$ProductString .= do_shortcode(ConvertCustomFields($Tab_Item['Content'], $Product->Item_ID, $Product->Item_Name));
				$ProductString .= "</div>";
				$ProductString .= "</div>";
			}
		}
		$ProductString .= "</div>";
		$ProductString .= "</div>";
		$ProductString .= "</div>";

		$ProductString .= "<div id='upcp-tabbed-similar-products-div-" . $Product->Item_ID . "' class='upcp-tabbed-similar-products-div'>";
		if ($Related_Type == "Manual" or $Related_Type == "Auto") {$ProductString .= UPCP_Get_Related_Products($Product, $Related_Type);}
		if ($Next_Previous == "Manual" or $Next_Previous == "Auto") {$ProductString .= Get_Next_Previous($Product, $Next_Previous);}

		$ProductString .= "</div>";
				
	}
	else {
		if ($Custom_Product_Page == "Large" or $Mobile_Product_Page_Serialized != "") {$ProductString .= "<div class='upcp-custom-large-product-page'>";}
				
		echo "<script language='JavaScript' type='text/javascript'>";
		echo "var pp_grid_width = " . $PP_Grid_Width . ";";
		echo "var pp_grid_height = " . $PP_Grid_Height . ";";
		echo "var pp_top_bottom_padding = " . $Top_Bottom_Padding . ";";
		echo "var pp_left_right_padding = " . $Left_Right_Padding . ";";
		echo "</script>";
				
		$Gridster = json_decode(stripslashes($Product_Page_Serialized));
		$ProductString .= "<div class='upcp-gridster-loading upcp-Hide-Item'>";
		$ProductString .= "<div class='gridster'>";
		$ProductString .= "<ul>";
		$ProductString .= BuildGridster($Gridster, $Product, $Item_Images, $Description, $PhotoURL, $SP_Perm_URL, $Return_URL, $TagsString);
		$ProductString .= "</ul>";
		$ProductString .= "</div>";
		$ProductString .= "</div>";
		
		if ($Custom_Product_Page == "Large") {
			$ProductString .= "</div>";
						
			$ProductString .= "<div class='upcp-standard-product-page-mobile'>";
				
			$ProductString .= "<div class='prod-cat-back-link'>";
			$ProductString .= "<a class='upcp-catalogue-link' href='" . $Return_URL . "'>&#171; " . $Back_To_Catalogue_Text . "</a>";
			$ProductString .= "</div>";
				
			$ProductString .= "<h2 class='prod-cat-addt-details-title'><a class='no-underline' href='http://" . $_SERVER['HTTP_HOST'] . $SP_Perm_URL . "'>" . apply_filters('upcp_product_page_title', $Product->Item_Name, array('Item_ID' => $Product->Item_ID, 'Item_Title' => $Product->Item_Name)) . "<img class='upcp-product-url-icon' src='" . get_bloginfo('wpurl') . "/wp-content/plugins/ultimate-product-catalogue/images/insert_link.png' /></a></h2>";
			if ($Single_Page_Price == "Yes") {$ProductString .= apply_filters('upcp_product_page_price', "<h3 class='prod-cat-addt-details-price'>" . $Product->Item_Price . "</h3>", array('Item_ID' => $Product->Item_ID, 'Item_Price' => $Product->Item_Price));}
			$ProductString .= $PhotoCodeMobile;
			$ProductString .= "<div class='upcp-clear'></div>";
		
			$ProductString .= "<div id='prod-cat-addt-details-" . $Product->Item_ID . "' class='prod-cat-addt-details'>";
			$ProductString .= "<div id='prod-cat-addt-details-thumbs-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-thumbs-div'>";
			if (isset($PhotoURL)) {$ProductString .= "<a href='" . $PhotoURL . "' class='upcp-featherlight prod-cat-addt-details-link-a'><img src='" . $PhotoURL . "' id='prod-cat-addt-details-thumb-P1-". $Product->Item_ID . "' class='prod-cat-addt-details-thumb " . $Disable_Featherlight . "' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"0\");'></a>";}
			foreach ($Item_Images as $Image) {$ProductString .= "<a href='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) . "' class='upcp-featherlight prod-cat-addt-details-link-a'><img src='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) . "' id='prod-cat-addt-details-thumb-". $Image->Item_Image_ID . "' class='prod-cat-addt-details-thumb " . $Disable_Featherlight . "' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"" . $Image->Item_Image_ID . "\");'></a>";}
			$ProductString .= "<div class='upcp-clear'></div>";
			$ProductString .= "</div>";

			$ProductString .= "<div id='prod-cat-addt-details-desc-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-desc-div'>";
			$ProductString .= $Description . "</div>";
			$ProductString .= "<div class='upcp-clear'></div>\n";
			if ($Related_Type == "Manual" or $Related_Type == "Auto") {$ProductString .= UPCP_Get_Related_Products($Product, $Related_Type);}
			if ($Next_Previous == "Manual" or $Next_Previous == "Auto") {$ProductString .= Get_Next_Previous($Product, $Next_Previous);}
			$ProductString .= "</div>\n";
				
			$ProductString .= "</div>\n";
		}
		elseif ($Mobile_Product_Page_Serialized != "") {
			$ProductString .= "</div>";
						
			$ProductString .= "<div class='upcp-standard-product-page-mobile'>";
						
			$Gridster = json_decode(stripslashes($Mobile_Product_Page_Serialized));
			$ProductString .= "<div class='upcp-gridster-loading upcp-Hide-Item'>";
			$ProductString .= "<div class='gridster-mobile'>";
			$ProductString .= "<ul>";
			$ProductString .= BuildGridster($Gridster, $Product, $Item_Images, $Description, $PhotoURL, $SP_Perm_URL, $Return_URL, $TagsString);
			$ProductString .= "</ul>";
			$ProductString .= "</div>";
			$ProductString .= "</div>";
						
			$ProductString .= "</div>\n";
		}
	}
		
	return $ProductString;
}

function BuildSidebar($category, $subcategory, $tags, $prod_name) {
	global $wpdb, $Full_Version, $ProdCats, $ProdSubCats, $ProdTags, $ProdCustomFields, $ProdCatString, $ProdSubCatString, $ProdTagString, $ProdCustomFieldsString;
	global $categories_table_name, $subcategories_table_name, $tags_table_name, $fields_table_name;
		
	$Color = get_option("UPCP_Color_Scheme");
	$Tag_Logic = get_option("UPCP_Tag_Logic");
	$ProductSearch = get_option("UPCP_Product_Search");
	$Product_Sort = get_option("UPCP_Product_Sort");
	$Sidebar_Order = get_option("UPCP_Sidebar_Order");
	$Custom_Fields_Show_Hide = get_option("UPCP_Custom_Fields_Show_Hide");

	$Sidebar_Title_Collapse = get_option("UPCP_Sidebar_Title_Collapse");
	$Sidebar_Subcat_Collapse = get_option("UPCP_Sidebar_Subcat_Collapse");
	$Sidebar_Title_Hover = get_option("UPCP_Sidebar_Title_Hover");
	$Sidebar_Checkbox_Style = get_option("UPCP_Sidebar_Checkbox_Style");

	$Categories_Label = get_option("UPCP_Categories_Label");
	$SubCategories_Label = get_option("UPCP_SubCategories_Label");
	$Tags_Label = get_option("UPCP_Tags_Label");
	$Sort_By_Label = get_option("UPCP_Sort_By_Label");
	$Price_Ascending_Label = get_option("UPCP_Price_Ascending_Label");
	$Price_Descending_Label = get_option("UPCP_Price_Descending_Label");
	$Name_Ascending_Label = get_option("UPCP_Name_Ascending_Label");
	$Name_Descending_Label = get_option("UPCP_Name_Descending_Label");
	$Product_Name_Search_Label = get_option("UPCP_Product_Name_Search_Label");
	$Product_Search_Text_Label = get_option("UPCP_Product_Name_Text_Label");

	if ($Categories_Label != "") {$Categories_Text = $Categories_Label;}
	else {$Categories_Text = __("Categories:", 'UPCP');}
	if ($SubCategories_Label != "") {$SubCategories_Text = $SubCategories_Label;}
	else {$SubCategories_Text = __("Sub-Categories:", 'UPCP');}
	if ($Tags_Label != "") {$Tags_Text = $Tags_Label;}
	else {$Tags_Text = __("Tags:", 'UPCP');}
	if ($Sort_By_Label != "") {$Sort_Text = $Sort_By_Label;}
	else {$Sort_Text = __('Sort By:', 'UPCP');}
	if ($Price_Ascending_Label != "") {$Price_Ascending_Text = $Price_Ascending_Label;}
	else {$Price_Ascending_Text = __('Price (Ascending)', 'UPCP');}
	if ($Price_Descending_Label != "") {$Price_Descending_Text = $Price_Descending_Label;}
	else {$Price_Descending_Text = __('Price (Descending)', 'UPCP');}
	if ($Name_Ascending_Label != "") {$Name_Ascending_Text = $Name_Ascending_Label;}
	else {$Name_Ascending_Text = __('Name (Ascending)', 'UPCP');}
	if ($Name_Descending_Label != "") {$Name_Descending_Text = $Name_Descending_Label;}
	else {$Name_Descending_Text = __('Name (Descending)', 'UPCP');}
	if ($Product_Name_Search_Label != "") {$SearchLabel = $Product_Name_Search_Label;}
	else {
		if ($ProductSearch == "namedesc" or $ProductSearch == "namedesccust") {$SearchLabel = __("Product Search:", 'UPCP');}
		else {$SearchLabel = __("Product Name:", 'UPCP');}
	}
	if ($prod_name != "") {$Product_Name_Text = $prod_name;}
	elseif ($Product_Search_Text_Label != "") {$Product_Name_Text = $Product_Search_Text_Label;
	}
	else {
		if ($ProductSearch == "namedesc" or $ProductSearch == "namedesccust") {$Product_Name_Text = __("Search...", 'UPCP');}
		else {$Product_Name_Text = __("Name...", 'UPCP');}
	}
	
	// Get the categories, sub-categories and tags that apply to the products in the catalog
	if ($ProdCatString != "") {$Categories = $wpdb->get_results("SELECT Category_ID, Category_Name FROM $categories_table_name WHERE Category_ID IN (" . $ProdCatString . ") ORDER BY Category_Sidebar_Order");}
	if ($ProdSubCatString != "") {$SubCategories = $wpdb->get_results("SELECT SubCategory_ID, SubCategory_Name, Category_ID FROM $subcategories_table_name WHERE SubCategory_ID IN (" . $ProdSubCatString . ") ORDER BY SubCategory_Sidebar_Order");}
	if ($ProdTagString != "") {$Tags = $wpdb->get_results("SELECT Tag_ID, Tag_Name FROM $tags_table_name WHERE Tag_ID IN (" . $ProdTagString . ") ORDER BY Tag_Sidebar_Order");}
	else {$Tags = array();}
	if ($ProdCustomFieldsString != "") {$Custom_Fields = $wpdb->get_results("SELECT Field_ID, Field_Name FROM $fields_table_name WHERE Field_ID IN (" . $ProdCustomFieldsString . ") AND Field_Searchable='Yes' ORDER BY Field_Sidebar_Order");}
	else {$Custom_Fields = array();}

	$SidebarString .= "<div id='prod-cat-sidebar-" . $id . "' class='prod-cat-sidebar'>\n";
	//$SidebarString .= "<form action='#' name='Product_Catalog_Sidebar_Form'>\n";
	$SidebarString .= "<form onsubmit='return false;' name='Product_Catalog_Sidebar_Form'>\n";
				
	//Create the 'Sort By' select box
	if ($Full_Version == "Yes" and $Product_Sort != "None") {
		$SortString .= "<div id='prod-cat-sort-by' class='prod-cat-sort-by'>";
		$SortString .= $Sort_Text . "<br>";
		$SortString .= "<div class='styled-select styled-input'>";
		$SortString .= "<select name='upcp-sort-by' id='upcp-sort-by' onchange='UPCP_Sort_By();'>";
		$SortString .= "<option value=''></option>";
		if ($Product_Sort == "Price" or $Product_Sort == "Price_Name") {
			$SortString .= "<option value='price_asc'>" . $Price_Ascending_Text . "</option>";
			$SortString .= "<option value='price_desc'>" . $Price_Descending_Text . "</option>";
		}
		if ($Product_Sort == "Name" or $Product_Sort == "Price_Name") {
			$SortString .= "<option value='name_asc'>" . $Name_Ascending_Text . "</option>";
			$SortString .= "<option value='name_desc'>" . $Name_Descending_Text . "</option>";
		}
		$SortString .= "</select>";
		$SortString .= "</div>";
		$SortString .= "</div>";
	}
	$SidebarString .= apply_filters('upcp_sidebar_sort_div', $SortString);
				
	// Create the text search box
	$SearchString .= "<div id='prod-cat-text-search' class='prod-cat-text-search'>\n";
	$SearchString .= $SearchLabel . "<br /><div class='styled-input'>";
	if ($Filter  == "Javascript" and $Tag_Logic == "OR") {$SearchString .= "<input type='text' id='upcp-name-search' class='jquery-prod-name-text' name='Text_Search' value='" . $Product_Name_Text . "' onfocus='FieldFocus(this);' onblur='FieldBlur(this);' onkeyup='UPCP_Filer_Results_OR();'>\n";}
	elseif ($Filter  == "Javascript") {$SearchString .= "<input type='text' id='upcp-name-search' class='jquery-prod-name-text' name='Text_Search' value='" . $Product_Name_Text . "' onfocus='FieldFocus(this);' onblur='FieldBlur(this);' onkeyup='UPCP_Filer_Results();'>\n";}
	else {$SearchString .= "<input type='text' id='upcp-name-search' class='jquery-prod-name-text' name='Text_Search' value='" . $Product_Name_Text . "' onfocus='FieldFocus(this);' onblur='FieldBlur(this);' onkeyup='UPCP_DisplayPage(\"1\");'>\n";}
	$SearchString .= "</div></div>\n";
	$SidebarString .= apply_filters('upcp_sidebar_search_div', $SearchString);
				
	// Create the categories checkboxes
	if (sizeof($Categories) > 0) {
		$CategoriesString .= "<div id='prod-cat-sidebar-category-div-" . $id . "' class='prod-cat-sidebar-category-div'>\n";
		$CategoriesString .= "<div id='prod-cat-sidebar-category-title-" . $id . "' class='prod-cat-sidebar-cat-title prod-cat-sidebar-category-title prod-cat-sidebar-hover-"  . $Sidebar_Title_Hover . "' data-title='1'";
		if ($Sidebar_Title_Collapse == "yes") {$CategoriesString .= " onclick='UPCP_Show_Hide_Sidebar(this);'";}
		$CategoriesString .= "><h3>" . $Categories_Text . "</h3></div>\n";
		$CategoriesString .= "<div class='prod-cat-sidebar-content prod-cat-sidebar-category-content ";
		if (($Sidebar_Order == "Hierarchical") and ($Sidebar_Subcat_Collapse == "yes")) {
								$CategoriesString .= "prod-cat-subcat-collapsible";
							}
		$CategoriesString .= "' data-title='1'>\n";	
		foreach ($Categories as $Category) {
			if ($Sidebar_Order == "Hierarchical") {
				$SubCategory_Count = 0;
				foreach ($SubCategories as $SubCategory) {
					if ($SubCategory->Category_ID == $Category->Category_ID) {
						$SubCategory_Count++;
					}
				}
			}

			$CategoriesString .= "<div id='prod-cat-sidebar-category-item-" . $Category->Category_ID . "' class='prod-cat-sidebar-category prod-sidebar-checkbox-" . $Sidebar_Checkbox_Style . " checkbox-color-" . "$Color";
			if (in_array($Category->Category_ID, $category)) {$CategoriesString .= " highlight" . $Color;}
			$CategoriesString .= "'>\n";
			if ($Filter  == "Javascript" and $Tag_Logic == "OR") {$CategoriesString .= "<input type='checkbox' class='jquery-prod-cat-value' name='Category" . $Category->Category_ID . "' value='" . $Category->Category_ID . "' onclick='UPCP_Filer_Results_OR(); UPCPHighlight(this, \"" . $Color . "\");'>" . $Category->Category_Name . " (" . $ProdCats[$Category->Category_ID] . ")\n";}
			elseif ($Filter  == "Javascript") {$CategoriesString .= "<input type='checkbox' class='jquery-prod-cat-value' name='Category" . $Category->Category_ID . "' value='" . $Category->Category_ID . "' onclick='UPCP_Filer_Results(); UPCPHighlight(this, \"" . $Color . "\");'>" . $Category->Category_Name . " (" . $ProdCats[$Category->Category_ID] . ")\n";}
			else {
				$CategoriesString .= "<input type='checkbox' name='Category" . $Category->Category_ID . "' value='" . $Category->Category_ID . "' onclick='UPCP_DisplayPage(\"1\"); UPCPHighlight(this, \"" . $Color . "\");' id='cat-". $Category->Category_ID ."' class='jquery-prod-cat-value'";
				if (in_array($Category->Category_ID, $category)) {$CategoriesString .= "checked=checked";}
				$CategoriesString .= "><label class='upcp-label' for='cat-". $Category->Category_ID ."'> <span>" . $Category->Category_Name . " (" . $ProdCats[$Category->Category_ID] . ")</span>" ;
				$CategoriesString .= "</label>\n";
							if (($Sidebar_Order == "Hierarchical") and ($Sidebar_Subcat_Collapse == "yes") and $SubCategory_Count > 0) {
								$CategoriesString .= "<span class='cat-collapsible' onclick='UPCP_Show_Hide_Subcat(" . $Category->Category_ID . ")' id='cat-collapsible-" . $Category->Category_ID . "'>+</span>";
							}
			}
			$CategoriesString .= "</div>\n";
							
			if ($Sidebar_Order == "Hierarchical" and $SubCategory_Count > 0) {
				if ($Sidebar_Subcat_Collapse == "yes") {			
							$CategoriesString .= "<div id='subcat-collapsible-" . $Category->Category_ID . "' class='subcat-collapsible' style='display:none'>";
							}
				foreach ($SubCategories as $SubCategory) {
					if ($SubCategory->Category_ID == $Category->Category_ID) {
						$CategoriesString .= "<div id='prod-cat-sidebar-subcategory-item-" . $SubCategory->SubCategory_ID . "' class='prod-cat-sidebar-subcategory upcp-margin-left-6 upcp-margin-top-minus-2 prod-sidebar-checkbox-" . $Sidebar_Checkbox_Style . " checkbox-color-" . "$Color";
						if (in_array($SubCategory->SubCategory_ID, $subcategory)) {$CategoriesString .= " highlight" . $Color;}
						$CategoriesString .= "'>\n";
						if ($Filter  == "Javascript" and $Tag_Logic == "OR") {$CategoriesString .= "<input type='checkbox' class='jquery-prod-sub-cat-value' name='SubCategory[]' value='" . $SubCategory->SubCategory_ID . "'  onclick='UPCP_Filer_Results_OR(); UPCPHighlight(this, \"" . $Color . "\");'> " . $SubCategory->SubCategory_Name . " (" . $ProdSubCats[$SubCategory->SubCategory_ID] . ")\n";}
						elseif ($Filter  == "Javascript") {$CategoriesString .= "<input type='checkbox' class='jquery-prod-sub-cat-value' name='SubCategory[]' value='" . $SubCategory->SubCategory_ID . "'  onclick='UPCP_Filer_Results(); UPCPHighlight(this, \"" . $Color . "\");'> " . $SubCategory->SubCategory_Name . " (" . $ProdSubCats[$SubCategory->SubCategory_ID] . ")\n";}
						else {
							$CategoriesString .= "<input type='checkbox' name='SubCategory[]' value='" . $SubCategory->SubCategory_ID . "'  onclick='UPCP_DisplayPage(\"1\"); UPCPHighlight(this, \"" . $Color . "\");' id='sub-" . $SubCategory->SubCategory_ID . "' class='jquery-prod-sub-cat-value'";
							if (in_array($SubCategory->SubCategory_ID, $subcategory)) {$CategoriesString .= "checked=checked";}
							$CategoriesString .= "><label class='upcp-label' for='sub-". $SubCategory->SubCategory_ID ."'><span> " . $SubCategory->SubCategory_Name . " (" . $ProdSubCats[$SubCategory->SubCategory_ID] . ")</span></label>\n";
						}
						$CategoriesString .= "</div>\n";
					}
				}
				if ($Sidebar_Subcat_Collapse == "yes") {			
							$CategoriesString .= "</div>";
							}
			}
		}
		$CategoriesString .= "</div>\n</div>\n";
	}
	$SidebarString .= apply_filters('upcp_sidebar_categories_div', $CategoriesString);
				
	// Create the sub-categories checkboxes
	if (sizeof($SubCategories) > 0 and $Sidebar_Order != "Hierarchical") {
		$SubCategoriesString .= "<div id='prod-cat-sidebar-subcategory-div-" . $id . "' class='prod-cat-sidebar-subcategory-div'>\n";
		$SubCategoriesString .= "<div id='prod-cat-sidebar-subcategory-title-" . $id . "' class='prod-cat-sidebar-cat-title prod-cat-sidebar-subcategory-title prod-cat-sidebar-hover-"  . $Sidebar_Title_Hover . "' data-title='2'";
		if ($Sidebar_Title_Collapse == "yes") {$SubCategoriesString .= "onclick='UPCP_Show_Hide_Sidebar(this);'";}
		$SubCategoriesString .= "><h3>" . $SubCategories_Text . "</h3></div>\n";
		$SubCategoriesString .= "<div class='prod-cat-sidebar-content prod-cat-sidebar-subcategory-content' data-title='2'>\n";
		foreach ($SubCategories as $SubCategory) {
			$SubCategoriesString .= "<div id='prod-cat-sidebar-subcategory-item-" . $SubCategory->SubCategory_ID . "' class='prod-cat-sidebar-subcategory prod-sidebar-checkbox-" . $Sidebar_Checkbox_Style . " checkbox-color-" . "$Color";
			if (in_array($SubCategory->SubCategory_ID, $subcategory)) {$SubCategoriesString .= " highlight" . $Color;}
			$SubCategoriesString .= "'>\n";
			if ($Filter  == "Javascript" and $Tag_Logic == "OR") {$SubCategoriesString .= "<input type='checkbox' class='jquery-prod-sub-cat-value' name='SubCategory[]' value='" . $SubCategory->SubCategory_ID . "'  onclick='UPCP_Filer_Results_OR(); UPCPHighlight(this, \"" . $Color . "\");'> " . $SubCategory->SubCategory_Name . " (" . $ProdSubCats[$SubCategory->SubCategory_ID] . ")\n";}
			elseif ($Filter  == "Javascript") {$SubCategoriesString .= "<input type='checkbox' class='jquery-prod-sub-cat-value' name='SubCategory[]' value='" . $SubCategory->SubCategory_ID . "'  onclick='UPCP_Filer_Results(); UPCPHighlight(this, \"" . $Color . "\");'> " . $SubCategory->SubCategory_Name . " (" . $ProdSubCats[$SubCategory->SubCategory_ID] . ")\n";}
			else {
				$SubCategoriesString .= "<input type='checkbox' name='SubCategory[]' value='" . $SubCategory->SubCategory_ID . "'  onclick='UPCP_DisplayPage(\"1\"); UPCPHighlight(this, \"" . $Color . "\");' id='sub-" . $SubCategory->SubCategory_ID . "' class='jquery-prod-sub-cat-value'";
				if (in_array($SubCategory->SubCategory_ID, $subcategory)) {$SubCategoriesString .= "checked=checked";}
				$SubCategoriesString .= "><label class='upcp-label' for='sub-". $SubCategory->SubCategory_ID ."'><span> " . $SubCategory->SubCategory_Name . " (" . $ProdSubCats[$SubCategory->SubCategory_ID] . ") </span></label>\n";
			}
			$SubCategoriesString .= "</div>\n";
		}
		$SubCategoriesString .= "</div>\n</div>\n";
	}
	$SidebarString .= apply_filters('upcp_sidebar_subcategories_div', $SubCategoriesString);
				
	// Create the tags checkboxes
	if (sizeof($Tags) > 0) {
		$TagsString .= "<div id='prod-cat-sidebar-tag-div-" . $id . "' class='prod-cat-sidebar-tag-div'>\n";
		$TagsString .= "<div id='prod-cat-sidebar-tag-title-" . $id . "' class='prod-cat-sidebar-cat-title prod-cat-sidebar-tag-title prod-cat-sidebar-hover-"  . $Sidebar_Title_Hover . "' data-title='3'";
		if ($Sidebar_Title_Collapse == "yes") {$TagsString .= "onclick='UPCP_Show_Hide_Sidebar(this);'";}
		$TagsString .= "><h3>" . $Tags_Text . "</h3></div>\n";
		$TagsString .= "<div class='prod-cat-sidebar-content prod-cat-sidebar-content-tag' data-title='3'>\n";	
		foreach ($Tags as $Tag) {
			$TagsString .= "<div id='prod-cat-sidebar-tag-item-" . $Tag->Tag_ID . "' class='prod-cat-sidebar-tag prod-sidebar-checkbox-" . $Sidebar_Checkbox_Style . " checkbox-color-" . "$Color";
			if (in_array($Tag->Tag_ID, $tags)) {$TagsString .= " highlight" . $Color;}
			$TagsString .= "'>\n";
			if ($Filter  == "Javascript" and $Tag_Logic == "OR") {$TagsString .= "<input type='checkbox' class='jquery-prod-tag-value' name='Tag[]' value='" . $Tag->Tag_ID . "'  onclick='UPCP_Filer_Results_OR(); UPCPHighlight(this, \"" . $Color . "\");'>" . $Tag->Tag_Name . "\n";}
			elseif ($Filter  == "Javascript") {$TagsString .= "<input type='checkbox' class='jquery-prod-tag-value' name='Tag[]' value='" . $Tag->Tag_ID . "'  onclick='UPCP_Filer_Results(); UPCPHighlight(this, \"" . $Color . "\");'> " . $Tag->Tag_Name . "\n";}
			else {
				$TagsString .= "<input type='checkbox' name='Tag[]' value='" . $Tag->Tag_ID . "'  onclick='UPCP_DisplayPage(\"1\"); UPCPHighlight(this, \"" . $Color . "\");' id='tag-" . $Tag->Tag_ID . "' class='jquery-prod-tag-value'";
				if (in_array($Tag->Tag_ID, $tags)) {$TagsString .= "checked=checked";}
				$TagsString .= "><label class='upcp-label' for='tag-". $Tag->Tag_ID ."'><span> " . $Tag->Tag_Name . "</span></label>\n";
			}
			$TagsString .= "</div>";
		}
		$TagsString .= "</div>\n</div>\n";
	}
	$SidebarString .= apply_filters('upcp_sidebar_tags_div', $TagsString);

	if (sizeOf($Custom_Fields) > 0) {
		$CustomFieldsString .= "<div id='prod-cat-sidebar-cf-div-" . $id . "' class='prod-cat-sidebar-cf-div'>\n";
		$CustomFieldsString .= "<div class='prod-cat-sidebar-cf' data-title='4'>\n";
		foreach ($Custom_Fields as $Custom_Field) {
			if (is_array($ProdCustomFields[$Custom_Field->Field_ID])) {
				$CustomFieldsString .= "<div id='prod-cat-sidebar-cf-" . $Custom_Field->Field_ID . "' class='prod-cat-sidebar-cf' data-cfid='" . $Custom_Field->Field_ID . "'>\n";
				$CustomFieldsString .= "<div class='prod-cat-sidebar-cat-title prod-cat-sidebar-cf-title prod-cat-sidebar-hover-"  . $Sidebar_Title_Hover . "' data-cfid='" . $Custom_Field->Field_ID . "'";
				if ($Sidebar_Title_Collapse == "yes") {$CustomFieldsString .= "onclick='UPCP_Show_Hide_CF(this);'";}
				$CustomFieldsString .= "'><h3>" . $Custom_Field->Field_Name . ":</h3></div>";
				$CustomFieldsString .= "<div id='prod-cat-sidebar-cf-options-" . $id . "' class='prod-cat-sidebar-content prod-cat-sidebar-cf-content upcp-cf-" . $Custom_Fields_Show_Hide . "' data-cfid='" . $Custom_Field->Field_ID . "'>";
				ksort($ProdCustomFields[$Custom_Field->Field_ID]);
				foreach ($ProdCustomFields[$Custom_Field->Field_ID]  as $Meta_Value => $Count) {
					$CustomFieldsString .= "<div class='prod-cat-sidebar-cf-value-div prod-sidebar-checkbox-" . $Sidebar_Checkbox_Style . " checkbox-color-" . $Color . "'>";
					$CustomFieldsString .= "<input type='checkbox' name='Custom_Field[]' value='" . $Meta_Value . "'  onclick='UPCP_DisplayPage(\"1\"); UPCPHighlight(this, \"" . $Color . "\");' id='cf-" . $Custom_Field->Field_ID . "-" . $Meta_Value . "' class='jquery-prod-cf-value' /> ";
					$CustomFieldsString .= "<label class='upcp-label' for='cf-" . $Custom_Field->Field_ID . "-" . $Meta_Value . "'><span>" . $Meta_Value . " (" . $Count . ")</span></label>";
					$CustomFieldsString .= "</div>";
				}
				$CustomFieldsString .= "</div>";
				$CustomFieldsString .= "</div>\n";
			}
		}
		$CustomFieldsString .= "</div>\n</div>\n";
	}
	$SidebarString .= apply_filters('upcp_sidebar_custom_fields_div', $CustomFieldsString);
				
	$SidebarString .= "</form>\n</div>\n";
		
	return $SidebarString;
}

function BuildGridster($Gridster, $Product, $Item_Images, $Description, $PhotoURL, $SP_Perm_URL, $Return_URL, $TagsString) {
	global $wpdb, $fields_meta_table_name, $fields_table_name;

	$Back_To_Catalogue_Label = get_option("UPCP_Back_To_Catalogue_Label");
	if ($Back_To_Catalogue_Label != "") {$Back_To_Catalogue_Text = $Back_To_Catalogue_Label;}
	else {$Back_To_Catalogue_Text = __("Back to Catalogue", 'UPCP');}
		
	if (is_array($Gridster)) {
		foreach ($Gridster as $Element) {
			switch ($Element->element_class) {
				case "additional_images":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-addt-images-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= "<div id='prod-cat-addt-details-thumbs-div-" . $Product->Item_ID . "' class='prod-cat-addt-details-thumbs-div'>";
					$ProductString .= "<a href='" . $PhotoURL . "' class='upcp-featherlight'><img src='" . $PhotoURL . "' id='prod-cat-addt-details-thumb-P". $Product->Item_ID . "' class='prod-cat-addt-details-thumb " . $Disable_Featherlight . "' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"0\");'></a>";
					foreach ($Item_Images as $Image) {$ProductString .= "<a href='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) . "' class='upcp-featherlight'><img src='" . htmlspecialchars($Image->Item_Image_URL, ENT_QUOTES) . "' id='prod-cat-addt-details-thumb-". $Image->Item_Image_ID . "' class='prod-cat-addt-details-thumb " . $Disable_Featherlight . "' onclick='ZoomImage(\"" . $Product->Item_ID . "\", \"" . $Image->Item_Image_ID . "\");'></a>";}
					$ProductString .= "</div>";
					break;
				case "back":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-back-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= "<a class='upcp-catalogue-link' href='" . $Return_URL . "'>&#171; " . $Back_To_Catalogue_Text . "</a>";
					break;
				case "blank":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-blank-div gs-w' style='display: list-item; position:absolute;'>";
					break;
				case "category":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-cat-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= $Product->Category_Name;
					break;
				case "category_label":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-cat-label-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= __("Category:", 'UPCP') . " ";
					break;
				case "description":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-description-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= $Description;
					break;
				case "main_image":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-main-image-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= "<a href='" . $PhotoURL . "' class='upcp-featherlight prod-cat-addt-details-link-a'>";
					$ProductString .= "<img src='" . $PhotoURL . "' alt='" . $Product->Item_Name . " Image' id='prod-cat-addt-details-main-" . $Product->Item_ID . "' class='prod-cat-addt-details-main' />";
					$ProductString .= "</a>";
					break;
				case "next_previous":
					$Next_Previous_Type = get_option("UPCP_Next_Previous");
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-prod-name-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= Get_Next_Previous($Product, $Next_Previous_Type);
				case "price":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-price-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= apply_filters('upcp_product_page_price', "<h3 class='prod-cat-addt-details-price'>" . $Product->Item_Price . "</h3>", array('Item_ID' => $Product->Item_ID, 'Item_Price' => $Product->Item_Price));
					break;
				case "price_label":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-price-label-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= "Price: ";
					break;
				case "product_link":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-prod-link-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= "<a class='no-underline' href='http://" . $_SERVER['HTTP_HOST'] . $SP_Perm_URL . "'><img class='upcp-product-url-icon' src='" . get_bloginfo('wpurl') . "/wp-content/plugins/ultimate-product-catalogue/images/insert_link.png' /></a>";
					break;
				case "product_name":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-prod-name-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= "<h2 class='prod-cat-addt-details-title upcp-cpp-title'><a class='no-underline' href='http://" . $_SERVER['HTTP_HOST'] . $SP_Perm_URL . "'>" . apply_filters('upcp_product_page_title', $Product->Item_Name, array('Item_ID' => $Product->Item_ID, 'Item_Title' => $Product->Item_Name)) . "</a></h2>";
					break;
				case "related_products":
					$Related_Type = get_option("UPCP_Related_Products");
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-prod-name-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= UPCP_Get_Related_Products($Product, $Related_Type);
					break;
				case "subcategory":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-sub-cat-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= $Product->SubCategory_Name;
					break;
				case "subcategory_label":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-sub-cat-label-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= __("Sub-Category:", 'UPCP') . " ";
					break;
				case "tags":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-tags-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= $TagsString;
					break;
				case "tags_label":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-tags-label-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= __("Tags:", 'UPCP') . " ";
					break;
				case "text":
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-tags-label-div gs-w' style='display: list-item; position:absolute;'>";
					$ProductString .= do_shortcode($Element->element_id);
					break;
				case "custom_field":
					$Field = $wpdb->get_row("SELECT Field_Type FROM $fields_table_name WHERE Field_ID='" . $Element->element_id ."'");
					$Field_Value = $wpdb->get_row("SELECT Meta_Value FROM $fields_meta_table_name WHERE Field_ID='" . $Element->element_id ."' AND Item_ID='" . $Product->Item_ID . "'");
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-custom-field-div gs-w prod-page-custom-field-" . $Field2->Field_Name . "' style='display: list-item; position:absolute;'>";
					if ($Field->Field_Type == "file") {
						$upload_dir = wp_upload_dir();
						$ProductString .= "<a href='" . $upload_dir['baseurl'] . "/upcp-product-file-uploads/" . $Field_Value->Meta_Value . "' download>" . $Field_Value->Meta_Value . "</a>";
					}
					else {$ProductString .= $Field_Value->Meta_Value;}
					break;
				case "custom_label":
					$Field = $wpdb->get_row("SELECT Field_Name FROM $fields_table_name WHERE Field_ID='" . $Element->element_id ."'");
					$ProductString .= "<li data-col='" . $Element->col . "' data-row='" . $Element->row . "' data-sizex='" . $Element->size_x . "' data-sizey='" . $Element->size_y . "' class='prod-page-div prod-page-front-end prod-page-custom-field-label-div gs-w prod-page-custom-field-label-" . $Field->Field_Name . "' style='display: list-item; position:absolute;'>";
					$ProductString .= $Field->Field_Name . ": ";
					break;
			}
			$MaxCol = max($MaxCol, $Element->col);
			$ProductString .= "</li>";								
		}
	}
		
	return $ProductString;
}

function UPCP_Add_Product_Page_Social_Media($Product, $Product_Permalink) {
	$Socialmedia_String = get_option("UPCP_Social_Media");
    $Socialmedia = explode(",", $Socialmedia_String);

	if ($Socialmedia[0] != "Blank" and $Socialmedia[0] != "") {
		$ReturnString .= "<div class='upcp-social-links'>";
		$ReturnString .= "<ul class='rrssb-buttons'>";
	}
	if(in_array("Facebook", $Socialmedia)) {$ReturnString .= UPCP_Add_Social_Media_Buttons("Facebook", $Product_Permalink, $Product->Item_Name);}
	if(in_array("Google", $Socialmedia)) {$ReturnString .= UPCP_Add_Social_Media_Buttons("Google", $Product_Permalink, $Product->Item_Name);}
	if(in_array("Twitter", $Socialmedia)) {$ReturnString .= UPCP_Add_Social_Media_Buttons("Twitter", $Product_Permalink, $Product->Item_Name);}
	if(in_array("Linkedin", $Socialmedia)) {$ReturnString .= UPCP_Add_Social_Media_Buttons("Linkedin", $Product_Permalink, $Product->Item_Name);}
	if(in_array("Pinterest", $Socialmedia)) {$ReturnString .= UPCP_Add_Social_Media_Buttons("Pinterest", $Product_Permalink, $Product->Item_Name);}
	if(in_array("Email", $Socialmedia)) {$ReturnString .= UPCP_Add_Social_Media_Buttons("Email", $Product_Permalink, $Product->Item_Name);}
	if ($Socialmedia[0] != "Blank" and $Socialmedia[0] != "") {
		$ReturnString .= "</ul>";
		$ReturnString .= "</div>";
	}

	return $ReturnString;
}


function Get_Next_Previous($Product, $Next_Previous_Type = "Manual") {
	global $wpdb, $items_table_name;

	$Next_Product_Label = get_option("UPCP_Next_Product_Label");
	if ($Next_Product_Label != "") {$Next_Product_Text = $Next_Product_Label;}
	else {$Next_Product_Text = __("Next Product:", 'UPCP');}
	$Previous_Product_Label = get_option("UPCP_Previous_Product_Label");
	if ($Previous_Product_Label != "") {$Previous_Product_Text = $Previous_Product_Label;}
	else {$Previous_Product_Text = __("Previous Product:", 'UPCP');}

	if ($Next_Previous_Type == "Manual") {
		$Next_Product_ID = substr($Product->Item_Next_Previous, 0, strpos($Product->Item_Next_Previous, ","));
		$Previous_Product_ID = substr($Product->Item_Next_Previous, strpos($Product->Item_Next_Previous, ",")+1);
	}
	elseif ($Next_Previous_Type == "Auto") {
		$Next_Product_ID = $wpdb->get_var("SELECT Item_ID FROM $items_table_name WHERE Item_ID>'" . $Product->Item_ID . "' ORDER BY Item_ID ASC LIMIT 1");
		$Previous_Product_ID = $wpdb->get_var("SELECT Item_ID FROM $items_table_name WHERE Item_ID<'" . $Product->Item_ID . "' ORDER BY Item_ID DESC LIMIT 1");
	}

	$Next_Product = $wpdb->get_row("SELECT * FROM $items_table_name WHERE Item_ID='" . $Next_Product_ID ."'");
	$Previous_Product = $wpdb->get_row("SELECT * FROM $items_table_name WHERE Item_ID='" . $Previous_Product_ID ."'");

	$ProductString .= "<div class='upcp-next-previous-products'>";
	$ProductString .= "<div class='upcp-next-product upcp-minimal-product-listing'>";
	$ProductString .= "<div class='upcp-next-product-title'>" . $Next_Product_Text . "</div>";
	$ProductString .= Build_Minimal_Product_Listing($Next_Product);
	$ProductString .= "<div class='upcp-clear'></div>";
	$ProductString .= "</div>";
	$ProductString .= "<div class='upcp-previous-product upcp-minimal-product-listing'>";
	$ProductString .= "<div class='upcp-previous-product-title'>" . $Previous_Product_Text . "</div>";
	$ProductString .= Build_Minimal_Product_Listing($Previous_Product);
	$ProductString .= "<div class='upcp-clear'></div>";
	$ProductString .= "</div>";
	$ProductString .= "<div class='upcp-clear'></div>";
	$ProductString .= "</div>";

	return apply_filters('upcp_next_previous_div', $ProductString, array('Item_ID' => $Product->Item_ID));
}

function UPCP_Get_Related_Products($Product, $Related_Type = "Auto") {
	global $wpdb, $items_table_name;

	if (get_option("UPCP_Related_Products_Label") != "") {$Related_Products_Label = get_option("UPCP_Related_Products_Label");}
	else {$Related_Products_Label = __("Related Products:", 'UPCP');}

	if ($Related_Type == "Manual") {
		$Related_Products_IDs = explode(",", $Product->Item_Related_Products);
		foreach ($Related_Products_IDs as $Related_Product_ID) {$ID_String .= "'" . $Related_Product_ID . "',";}
		$ID_String = substr($ID_String, 0, -1);
		$Related_Products = $wpdb->get_results("SELECT * FROM $items_table_name WHERE Item_ID IN (" . $ID_String . ")");
	}

	elseif ($Related_Type == "Auto") {
		$Ordered_Sub_Cat_Products = array();
		$Ordered_Cat_Products = array();

		$Sub_Category_Products = $wpdb->get_results("SELECT * FROM $items_table_name WHERE SubCategory_ID='" . $Product->SubCategory_ID . "' AND Item_ID!='" . $Product->Item_ID . "'", ARRAY_A);
		if ($wpdb->num_rows < 5) {
			$Category_Products = $wpdb->get_results("SELECT * FROM $items_table_name WHERE Category_ID='" . $Product->Category_ID . "' AND SubCategory_ID!='" . $Product->SubCategory_ID . "' AND Item_ID!='" . $Product->Item_ID . "'", ARRAY_A);
		}

		$Ordered_Sub_Cat_Products = Order_Products($Selected_Product, $Sub_Category_Products);
		if (isset($Category_Products)) {$Ordered_Cat_Products = Order_Products($Selected_Product, $Category_Products);}

		$Related_Products = $Ordered_Sub_Cat_Products + $Ordered_Cat_Products;
		$Related_Products = array_splice($Related_Products, 0, 5);
	}

	$ProductString .= "<div class='upcp-related-products'>";
	$ProductString .= "<div class='upcp-related-products-title'>" . $Related_Products_Label . "</div>";
	$ProductString .= "<div class='upcp-clear'></div>";
	foreach ($Related_Products as $Related_Product) {
		$ProductString .= "<div class='upcp-related-product upcp-minimal-product-listing'>";
		$ProductString .= Build_Minimal_Product_Listing($Related_Product);
		$ProductString .= "<div class='upcp-clear'></div>";
		$ProductString .= "</div>";
	}
	$ProductString .= "</div>";
	$ProductString .= "<div class='upcp-clear'></div>";

	return apply_filters('upcp_related_product_div', $ProductString, array('Item_ID' => $Product->Item_ID));
}

function Add_Product_Inquiry_Form($Product) {
	if (get_option("UPCP_Product_Inquiry_Form_Title_Label") != "") {$Product_Inquiry_Form_Title_Label = get_option("UPCP_Product_Inquiry_Form_Title_Label");}
	else {$Product_Inquiry_Form_Title_Label = __("Product Inquiry Form", "UPCP");}

	$plugin = "contact-form-7/wp-contact-form-7.php";
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$CF_7_Installed = is_plugin_active($plugin);

	if ($CF_7_Installed) {
		$UPCP_Contact_Form = get_page_by_path('upcp-product-inquiry-form', OBJECT, 'wpcf7_contact_form');

		$ProductString .= "<div class='upcp-contact-form-7-product-form'>";
		$ProductString .= "<h4>" . $Product_Inquiry_Form_Title_Label . "</h4>";
		$ProductString .= str_replace('%PRODUCT_NAME%', $Product->Item_Name, do_shortcode('[contact-form-7 id="' . $UPCP_Contact_Form->ID . '" title="' . $UPCP_Contact_Form->post_title . '"]'));
		$ProductString .= "</div>";
	}

	return $ProductString;
}

function UPCP_Add_Product_Reviews($Product) {
	$ReturnString = do_shortcode("[ultimate-reviews product_name='" . $Product->Item_Name . "']");
	$ReturnString .= "<div class='ewd-urp-woocommerce-tab-divider'></div>";
	$ReturnString .= "<h2>" . __("Leave a review", 'EWD_URP') . "</h2>";
	$ReturnString .= "<style>.ewd-urp-form-header {display:none;}</style>";
	$ReturnString .= do_shortcode("[submit-review product_name='" . $Product->Item_Name . "']");
	return $ReturnString;
}

function Order_Products($Product, $Related_Products_Array) {
	global $wpdb, $tagged_items_table_name;

	$Product_Tags = $wpdb->get_results("SELECT Tag_ID FROM $tagged_items_table_name WHERE Item_ID='" . $Product['Item_ID'] . "'", ARRAY_A);

	foreach ($Related_Products_Array as $Related_Product) {
		$Related_Product_Tags = $wpdb->get_results("SELECT Tag_ID FROM $tagged_items_table_name WHERE Item_ID='" . $Related_Product['Item_ID'] . "'", ARRAY_A);
		$Intersect = array_intersect($Product_Tags, $Related_Product_Tags);
		$Related_Product['Score'] = sizeOf($Intersect);
		unset($Related_Product_Tags);
	}

	usort($Related_Products_Array, 'Score_Sort');

	return $Related_Products_Array;
}

function Score_Sort($a, $b) {
	return $a['Score'] == $b['Score'] ? 0 : ($a['Score'] > $b['Score']) ? 1 : -1;
}

function Build_Minimal_Product_Listing($Product, $Catalogue_URL = "") {
	global $wpdb, $items_table_name;

	$Pretty_Links = get_option("UPCP_Pretty_Links");

	if (is_array($Product)) {$Product = $wpdb->get_row("SELECT * FROM $items_table_name WHERE Item_ID='" . $Product['Item_ID'] . "'");}

	if ($Product->Item_ID == "") {return;}

	$uri_parts = explode('?', $_SERVER['REQUEST_URI'], 2);
	if ($Catalogue_URL == "") {
		$Base = $uri_parts[0];
		if ($Pretty_Links == "Yes") {$Base = substr($Base, 0, strpos($Base, "/product/")+1);}
	}
	else {$Base = $Catalogue_URL;}
	if (trim($Product->Item_Link) != "") {$ItemLink = $Product->Item_Link;}
	elseif ($Pretty_Links == "Yes") {$ItemLink = $Base . "product/" . $Product->Item_Slug . "/?" . $uri_parts[1];}
	elseif (strpos($uri_parts[1], "page_id") !== false) {$ItemLink = $Base . "?" . substr($uri_parts[1], 0, strpos($uri_parts[1], "&")) . "&SingleProduct=" . $Product->Item_ID;}
	else {$ItemLink = $Base . "?SingleProduct=" . $Product->Item_ID;}

	if ($Product->Item_Photo_URL != "") {$PhotoURL = $Product->Item_Photo_URL;}
	else {$PhotoURL = plugins_url('ultimate-product-catalogue/images/No-Photo-Available.png');}

	$ProductString .= "<a class='upcp-minimal-link' href='" . $ItemLink . "'>";
	$ProductString .= "<div class='upcp-minimal-img-div'>";
	$ProductString .= "<img class='upcp-minimal-img' src='" . $PhotoURL . "' alt='Product Image' />";
	$ProductString .= "</div>";
	$ProductString .= "<div class='upcp-minimal-title'>" . $Product->Item_Name . "</div>";
	$ProductString .= "<div class='upcp-minimal-price'>" . $Product->Item_Price . "</div>";
	$ProductString .= "</a>";

	return $ProductString;
}

function FilterCount($Product, $Tags, $Custom_Fields) {
	global $ProdCats, $ProdSubCats, $ProdTags, $ProdCustomFields;
	global $wpdb, $fields_table_name;

	// Increment the arrays keeping count of the number of products in each 
	// category, sub-category and tag
	$ProdCats[$Product->Category_ID]++;
	$ProdSubCats[$Product->SubCategory_ID]++;
	foreach ($Tags as $Tag) {$ProdTags[$Tag->Tag_ID]++;}
	if (is_array($Custom_Fields)) {
		foreach ($Custom_Fields as $Custom_Field) {
			$Field_Type = $wpdb->get_var("SELECT Field_Type FROM $fields_table_name WHERE Field_ID='" . $Custom_Field->Field_ID . "'");
			if ($Field_Type == "checkbox") {
				$Checkbox_Values = explode(",", $Custom_Field->Meta_Value);
				if (!is_array($Checkbox_Values)) {$Checkbox_Values = array();}
				foreach ($Checkbox_Values as $Individual_Value) {
					if ($Individual_Value != "") {$ProdCustomFields[$Custom_Field->Field_ID][$Individual_Value]++;}
				}
			}
			else {
				if ($Custom_Field->Meta_Value != "") {$ProdCustomFields[$Custom_Field->Field_ID][$Custom_Field->Meta_Value]++;}
			}
		}
	}
}

function SearchProductName($Item_ID, $ProductName, $ProductDescription, $SearchName, $CaseInsensitive, $SearchLocation) {
	global $wpdb;
	global $fields_meta_table_name;
		
	if ($CaseInsensitive == "Yes") {
		$ProductName = strtolower($ProductName);
		$ProductDescription = strtolower($ProductDescription);
		$SearchName = strtolower($SearchName);
	}
	
	if ($SearchName == ""){$NameSearchMatch = "Yes";}
	elseif (mb_strpos($ProductName, $SearchName) !== false) {$NameSearchMatch = "Yes";}
	elseif (mb_strpos($ProductDescription, $SearchName) !== false) {
		if ($SearchLocation == "namedesc" or $SearchLocation == "namedesccust") {
			$NameSearchMatch = "Yes";
		}
	}
		
	if ($NameSearchMatch != "Yes" and $SearchLocation == "namedesccust") {
		$SearchName =  "%" .  $SearchName . "%";
		$Metas = $wpdb->get_results($wpdb->prepare("SELECT Meta_Value FROM $fields_meta_table_name WHERE Item_ID='" . $Item_ID . "' and Meta_Value LIKE %s", $SearchName));
		if (sizeOf($Metas) > 0) {$NameSearchMatch = "Yes";}
	}
		
	return $NameSearchMatch;
}

function Custom_Field_Check($Custom_Fields_Sql_String, $Custom_Field_Count, $Product_ID) {
	global $wpdb, $fields_meta_table_name;

	if ($Custom_Fields_Sql_String == "") {return "Yes";}

	$Fields = $wpdb->get_results("SELECT Field_ID FROM $fields_meta_table_name WHERE " . $Custom_Fields_Sql_String . " AND Item_ID='" . $Product_ID . "'");
	if ($wpdb->num_rows == $Custom_Field_Count) {return "Yes";}
	else {return "No";} 
}

function CheckTags($tags, $ProdTag, $Tag_Logic) {
	if (sizeOf($tags) == 0) {return "Yes";}

	if ($Tag_Logic == "OR") {
		if (count(array_intersect($tags, $ProdTag)) > 0) {return "Yes";}
	}
	else {
		if (count(array_intersect($tags, $ProdTag)) == sizeOf($tags)) {return "Yes";}
	}
		
	return "No";
}

function CheckPagination($Product_Count, $products_per_page, $current_page, $Filtered = "No") {
	if ($products_per_page >= 1000000) {return "OK";}
	if ($Product_Count >= ($products_per_page * ($current_page - 1))) {
		if ($Product_Count < ($products_per_page * $current_page)) {
			return "OK";
		}
		else {
			return "Over";
		}
	}
		
	if ($Filtered == "Yes") {return "Filtered";}
	else {return "Under";}
}

function ConvertCustomFields($Description, $Item_ID, $Item_Name = "") {
	global $wpdb;
	global $fields_table_name, $fields_meta_table_name;
		
	$upload_dir = wp_upload_dir();
		
	$Fields = $wpdb->get_results("SELECT Field_ID, Field_Slug, Field_Type FROM $fields_table_name");
	$Metas = $wpdb->get_results($wpdb->prepare("SELECT Field_ID, Meta_Value FROM $fields_meta_table_name WHERE Item_ID=%d", $Item_ID));
		
	if (is_array($Fields)) {
		if (is_array($Metas)) {
			foreach ($Metas as $Meta) {
				$MetaArray[$Meta->Field_ID] = $Meta->Meta_Value;
			}
		}
		foreach ($Fields as $Field) {
			if ($Field->Field_Type == "file") {
				$LinkString = "<a href='" . $upload_dir['baseurl'] . "/upcp-product-file-uploads/" . $MetaArray[$Field->Field_ID] . "' download>" . $MetaArray[$Field->Field_ID] . "</a>";
				$Description = str_replace("[" . $Field->Field_Slug . "]" , $LinkString, $Description);
			}
			else {$Description = str_replace("[" . $Field->Field_Slug . "]" , $MetaArray[$Field->Field_ID], $Description);}
		}
	}

	if ($Item_Name != "") {
		$Description = str_replace("[product-name]" , $Item_Name, $Description);
	}
		
	return $Description;
}

function AddCustomFields($ProductID, $Layout) {
	global $wpdb;
	global $fields_table_name, $fields_meta_table_name;

	$Custom_Fields_Blank = get_option("UPCP_Custom_Fields_Blank");
		
	$upload_dir = wp_upload_dir();
		
	$Fields = $wpdb->get_results("SELECT Field_ID, Field_Name, Field_Type FROM $fields_table_name WHERE Field_Displays='" . $Layout . "' OR Field_Displays='both' ORDER BY Field_Sidebar_Order");
	if (is_array($Fields)) {
		$CustomFieldString .= "<div class='upcp-prod-desc-custom-fields upcp-custom-field-" . $Layout . "'>";
		if ($Layout == "details") {$AddBreak = "<br />";}
		if ($Layout == "list") {$AddBreak = " ";}
		else {$AddBreak = "";}
		foreach ($Fields as $Field) {
			$Meta = $wpdb->get_row("SELECT Meta_Value FROM $fields_meta_table_name WHERE Field_ID='" . $Field->Field_ID . "' AND Item_ID='" . $ProductID . "'");
			if ($Meta->Meta_Value != "" or $Custom_Fields_Blank != "Yes") {
				if ($Field->Field_Type == "file") {
					$CustomFieldString .= $AddBreak . $Field->Field_Name . ": ";
					$CustomFieldString .= "<a href='" . $upload_dir['baseurl'] . "/upcp-product-file-uploads/" .$Meta->Meta_Value . "' download>" . $Meta->Meta_Value . "</a>";
				}
				else {$CustomFieldString .= $AddBreak . $Field->Field_Name . ": " . $Meta->Meta_Value;}
				$AddBreak = "<br />";
			}
		}
		$CustomFieldString .= "</div>";
	}
		
	return $CustomFieldString;
}

function ObjectToArray($Obj) {
	$TagsArray = array();
	foreach ($Obj as $Tag) {
		$TagsArray[] = $Tag->Tag_ID;
	}
		
	return $TagsArray;
}

function UPCP_Filter_Title($ProductName) {
	echo $ProductName;
	add_filter('the_title', 'UPCP_Alter_Title', 20, $ProductName);
}

function UPCP_Alter_Title($Title, $ProductName) {
	$Title = $ProductName . " | " . $Title;
	return $Title;
}

function UPCP_getIDfromGUID($guid){
    global $wpdb;
    return $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE guid=%s", $guid ) );
}


function UPCP_Return_PHP_Version() {
	$PHP_Version_Array = explode(".", phpversion());
	$PHP_Version_Number = $PHP_Version_String[0] * 10000 + $PHP_Version_String[1] * 100 + $PHP_Version_String[2];

	return $PHP_Version_Number;
}

 ?>