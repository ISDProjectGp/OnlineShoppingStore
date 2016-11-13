<?php 
	/* Basic Options */
	$Color = get_option("UPCP_Color_Scheme");
	$Links = get_option("UPCP_Product_Links");
	$Tags = get_option("UPCP_Tag_Logic");
	$Filter = get_option("UPCP_Filter_Type");
	$ReadMore = get_option("UPCP_Read_More");
	$Detail_Desc_Chars = get_option("UPCP_Desc_Chars");
	$Sidebar_Order = get_option("UPCP_Sidebar_Order");
	$Filter_Title = get_option("UPCP_Filter_Title");
	$Detail_Image = get_option("UPCP_Details_Image");
	$CaseInsensitiveSearch = get_option("UPCP_Case_Insensitive_Search");
	$Apply_Contents_Filter = get_option("UPCP_Apply_Contents_Filter");
	$Maintain_Filtering = get_option("UPCP_Maintain_Filtering");
	$Single_Page_Price = get_option("UPCP_Single_Page_Price");
	$Thumbnail_Support = get_option("UPCP_Thumbnail_Support");
	$Show_Category_Descriptions = get_option("UPCP_Show_Category_Descriptions");
	$Show_Catalogue_Information = get_option("UPCP_Show_Catalogue_Information");
	$Inner_Filter = get_option("UPCP_Inner_Filter");
	$Extra_Elements_Array = get_option("UPCP_Extra_Elements");
	$Extra_Elements = explode(",", $Extra_Elements_Array);
	$Socialmedia_String = get_option("UPCP_Social_Media");
    $Socialmedia = explode(",", $Socialmedia_String);

    /* Payment Options */
    $Allow_Payments = get_option("UPCP_Allow_Payments");
	$PayPal_Email_Address = get_option("UPCP_PayPal_Email_Address"); 
	$Pricing_Currency_Code = get_option("UPCP_Pricing_Currency_Code"); 
	$Thank_You_URL = get_option("UPCP_Thank_You_URL"); 
	
	/* Premium Options */
	$InstallVersion = get_option("UPCP_First_Install_Version");
	$Custom_Product_Page = get_option("UPCP_Custom_Product_Page");
	$Product_Inquiry_Form = get_option("UPCP_Product_Inquiry_Form");
	$Product_Reviews = get_option("UPCP_Product_Reviews");
	$Lightbox = get_option("UPCP_Lightbox");
	$Products_Per_Page = get_option("UPCP_Products_Per_Page");
	$Pagination_Location = get_option("UPCP_Pagination_Location");
	$Product_Search = get_option("UPCP_Product_Search");
	$Product_Sort = get_option("UPCP_Product_Sort");
	$CF_Conversion = get_option("UPCP_CF_Conversion");
	$Related_Products = get_option("UPCP_Related_Products");
	$Next_Previous = get_option("UPCP_Next_Previous");
	$Access_Role = get_option("UPCP_Access_Role");
	$Custom_Fields_Blank = get_option("UPCP_Custom_Fields_Blank");
	
	/* Labelling Options */
	$Categories_Label = get_option("UPCP_Categories_Label");
	$SubCategories_Label = get_option("UPCP_SubCategories_Label");
	$Tags_Label = get_option("UPCP_Tags_Label");
	$Custom_Fields_Label = get_option("UPCP_Custom_Fields_Label");
	$Details_Label = get_option("UPCP_Details_Label");
	$Sort_By_Label = get_option("UPCP_Sort_By_Label");
	$Price_Ascending_Label = get_option("UPCP_Price_Ascending_Label");
	$Price_Descending_Label = get_option("UPCP_Price_Descending_Label");
	$Name_Ascending_Label = get_option("UPCP_Name_Ascending_Label");
	$Name_Descending_Label = get_option("UPCP_Name_Descending_Label");
	$Product_Name_Search_Label = get_option("UPCP_Product_Name_Search_Label");
	$Product_Search_Text_Label = get_option("UPCP_Product_Name_Text_Label");
	$Back_To_Catalogue_Label = get_option("UPCP_Back_To_Catalogue_Label");
	$Updating_Results_Label = get_option("UPCP_Updating_Results_Label");
	$No_Results_Found_Label = get_option("UPCP_No_Results_Found_Label");
	$Products_Pagination_Label = get_option("UPCP_Products_Pagination_Label");
	$Read_More_Label = get_option("UPCP_Read_More_Label");
	$Product_Details_Label = get_option("UPCP_Product_Details_Label");
	$Additional_Info_Label = get_option("UPCP_Additional_Info_Label");
	$Contact_Us_Label = get_option("UPCP_Contact_Us_Label");
	$Product_Inquiry_Form_Title_Label = get_option("UPCP_Product_Inquiry_Form_Title_Label");
	$Related_Products_Label = get_option("UPCP_Related_Products_Label");
	$Next_Product_Label = get_option("UPCP_Next_Product_Label");
	$Previous_Product_Label = get_option("UPCP_Previous_Product_Label");

	/* SEO Options */
	$PrettyLinks = get_option("UPCP_Pretty_Links");
	$XML_Sitemap_URL = get_option("UPCP_XML_Sitemap_URL");
	$SEO_Option = get_option("UPCP_SEO_Option");
	$SEO_Integration = get_option("UPCP_SEO_Integration");
	$SEO_Title = get_option("UPCP_SEO_Title");
	$Update_Breadcrumbs = get_option("UPCP_Update_Breadcrumbs");

?>
<div class="wrap upcp-options-page-tabbed">
<div class="upcp-options-submenu-div">
	<ul class="upcp-options-submenu upcp-options-page-tabbed-nav">
		<li><a id="Basic_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == '' or $Display_Tab == 'Basic') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Basic');">Basic</a></li>
		<li><a id="Premium_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Premium') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Premium');">Premium</a></li>
		<li><a id="SEO_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'SEO') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('SEO');">SEO</a></li>
		<li><a id="Labelling_Menu" class="MenuTab options-subnav-tab <?php if ($Display_Tab == 'Labelling') {echo 'options-subnav-tab-active';}?>" onclick="ShowOptionTab('Labelling');">Labelling</a></li>
	</ul>
</div>

<div class="upcp-options-page-tabbed-content">
<form method="post" action="admin.php?page=UPCP-options&DisplayPage=Options&Action=UPCP_UpdateOptions">

<div id='Basic' class='upcp-option-set'>
<h2 id="basic-options" class="upcp-options-tab-title">Basic Options</h2>
<table id='basic-options' class="form-table upcp-options-table">
	<tr>
	<th scope="row"><?php _e("Catalogue Color", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('color_scheme_exp')" onMouseOut="HideToolTip('color_scheme_exp')" class="questionMark"><br> 
	<div id="color_scheme_exp" class="toolTip" ><?php _e("Set the color of the image and border elements", 'UPCP')?></div></div>
	</th>
	<td >
		<fieldset><legend class="screen-reader-text"><span><?php _e("Catalogue Color", 'UPCP')?></span></legend>
		<label title='Blue'><input type='radio' name='color_scheme' value='Blue' <?php if($Color == "Blue") {echo "checked='checked'";} ?> /> <span><?php _e("Blue", 'UPCP')?></span></label><br />
		<label title='Black'><input type='radio' name='color_scheme' value='Black' <?php if($Color == "Black") {echo "checked='checked'";} ?> /> <span><?php _e("Black", 'UPCP')?></span></label><br />
		<label title='Grey'><input type='radio' name='color_scheme' value='Grey' <?php if($Color == "Grey") {echo "checked='checked'";} ?> /> <span><?php _e("Grey", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Product Links", 'UPCP')?> <br>
	<div onMouseOver="ShowToolTip('product_links_exp')" onMouseOut="HideToolTip('product_links_exp')" class="questionMark"><br> 
	<div id="product_links_exp" class="toolTip" ><?php _e("Should external product links open in a new window?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Product Links", 'UPCP')?></span></legend>
		<label title='Same'><input type='radio' name='product_links' value='Same' <?php if($Links == "Same") {echo "checked='checked'";} ?> /> <span><?php _e("Open in Same Window", 'UPCP')?></span></label><br />
		<label title='New'><input type='radio' name='product_links' value='New' <?php if($Links == "New") {echo "checked='checked'";} ?> /> <span><?php _e("Open in New Window", 'UPCP')?></span></label><br />
		<!--<label title='External'><input type='radio' name='product_links' value='External' <?php if($Links == "External") {echo "checked='checked'";} ?> /> <span><?php _e("Open External Links Only in New Window", 'UPCP')?></span></label><br />-->
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Read More", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('read_more_exp')" onMouseOut="HideToolTip('read_more_exp')" class="questionMark"><br> 
	<div id="read_more_exp" class="toolTip" ><?php _e("In the 'Details' layout, should the product description be cutoff if it's long?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("'Read More' for Details view", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='read_more' value='Yes' <?php if($ReadMore == "Yes") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='read_more' value='No' <?php if($ReadMore == "No") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	<tr>
	<th scope="row"><?php _e("Characters in Details Description", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('desc_count_exp')" onMouseOut="HideToolTip('desc_count_exp')" class="questionMark"><br> 
	<div id="desc_count_exp" class="toolTip" ><?php _e("Set maximum number of characters in product description in the 'Details' layout", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Characters in 'Details' Description", 'UPCP')?></span></legend>
		<input type='text' name='desc_count' value='<?php echo $Detail_Desc_Chars; ?>'/>
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Sub-Category Style", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('sidebar_order_exp')" onMouseOut="HideToolTip('sidebar_order_exp')" class="questionMark"><br> 
	<div id="sidebar_order_exp" class="toolTip" ><?php _e("Should categories and sub-categories be arranged hierarchically or be grouped?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("How Should Sub-Categories be Displayed", 'UPCP')?></span></legend>
		<label title='Normal'><input type='radio' name='sidebar_order' value='Normal' <?php if($Sidebar_Order == "Normal") {echo "checked='checked'";} ?> /> <span><?php _e("Normal", 'UPCP')?></span></label><br />
		<label title='Hierarchical'><input type='radio' name='sidebar_order' value='Hierarchical' <?php if($Sidebar_Order == "Hierarchical") {echo "checked='checked'";} ?> /> <span><?php _e("Hierarchical", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Custom 'Details' icon", 'UPCP')?><br/> 
	<div onMouseOver="ShowToolTip('Details_Image_exp')" onMouseOut="HideToolTip('Details_Image_exp')" class="questionMark"><br> 
	<div id="Details_Image_exp" class="toolTip" ><?php _e("Image to use instead of 'Details' (Optional)", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Image to use instead of 'Details' (Optional)", 'UPCP')?></span></legend>
		<input id="Details_Image" type="text" size="36" name="Details_Image" value='<?php if ($Detail_Image == "") {echo "http://";} else {echo $Detail_Image;} ?>' /> 
	  <input id="Details_Image_button" class="button" type="button" value="Upload Image" />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Product Page Elements (Additional Info)", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('extra_elements_exp')" onMouseOut="HideToolTip('extra_elements_exp')" class="questionMark"><br> 
	<div id="extra_elements_exp" class="toolTip" ><?php _e("Select elements to be displayed on each product page.", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Extra Product Page Elements", 'UPCP')?></span></legend>
		<label title='Category'><input type='checkbox' name='extra_elements[]' value='Category' <?php if(in_array("Category", $Extra_Elements)) {echo "checked='checked'";} ?> /> <span>Category Name</span></label><br />
		<label title='SubCategory'><input type='checkbox' name='extra_elements[]' value='SubCategory' <?php if(in_array("SubCategory", $Extra_Elements)) {echo "checked='checked'";} ?> /> <span>SubCategory Name</span></label><br />
		<label title='Tags'><input type='checkbox' name='extra_elements[]' value='Tags' <?php if(in_array("Tags", $Extra_Elements)) {echo "checked='checked'";} ?> /> <span>Tags</span></label><br />
		<label title='CustomFields'><input type='checkbox' name='extra_elements[]' value='CustomFields' <?php if(in_array("CustomFields", $Extra_Elements)) {echo "checked='checked'";} ?> /> <span>Custom Fields</span></label><br />
		<label title='Videos'><input type='checkbox' name='extra_elements[]' value='Videos' <?php if(in_array("Videos", $Extra_Elements)) {echo "checked='checked'";} ?> /> <span>Videos</span></label><br />
		<div style='display:none;'><label title='Blank'><input type='checkbox' name='extra_elements[]' value='Blank' checked='checked' /> <span>Blank</span></label></div>
		</fieldset>
	</td>
	</tr>
		<tr>
	<th scope="row"><?php _e("Display Product Page Price", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('single_page_price_exp')" onMouseOut="HideToolTip('single_page_price_exp')" class="questionMark"><br> 
	<div id="single_page_price_exp" class="toolTip" ><?php _e("Should a product's price be displayed on the product pages?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Put Prices on the Default Product Pages", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='single_page_price' value='Yes' <?php if($Single_Page_Price == "Yes") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='single_page_price' value='No' <?php if($Single_Page_Price == "No") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Filtering Type", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('filter_type_exp')" onMouseOut="HideToolTip('filter_type_exp')" class="questionMark"><br> 
	<div id="filter_type_exp" class="toolTip" ><?php _e("Should the plugin use AJAX (recommended) or Javascript (legacy support only) to filter products?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Filtering Type", 'UPCP')?></span></legend>
		<label title='Javascript'><input type='radio' name='filter_type' value='Javascript' <?php if($Filter == "Javascript") {echo "checked='checked'";} ?> /> <span><?php _e("Javascript Filtering", 'UPCP')?></span></label><br />
		<label title='AJAX'><input type='radio' name='filter_type' value='AJAX' <?php if($Filter == "AJAX") {echo "checked='checked'";} ?> /> <span><?php _e("AJAX Filtering", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Case Insensitive Search (AJAX Only)", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('case_insensitive_search_exp')" onMouseOut="HideToolTip('case_insensitive_search_exp')" class="questionMark"><br> 
	<div id="case_insensitive_search_exp" class="toolTip" ><?php _e("Compare only the letters and not their case in AJAX search", 'UPCP')?></div></div>
	</th>
	<td >
		<fieldset><legend class="screen-reader-text"><span><?php _e("Compare only the letters and not their case in AJAX search", 'UPCP')?></span></legend>
		<label title='Javascript'><input type='radio' name='case_insensitive_search' value='Yes' <?php if($CaseInsensitiveSearch == "Yes") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='AJAX'><input type='radio' name='case_insensitive_search' value='No' <?php if($CaseInsensitiveSearch == "No") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Tag Logic", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('tag_logic_exp')" onMouseOut="HideToolTip('tag_logic_exp')" class="questionMark"><br> 
	<div id="tag_logic_exp" class="toolTip" ><?php _e("Gives users the option to use multiple tags at the same time in filtering ('OR' option)", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Tag Logic", 'UPCP')?></span></legend>
		<label title='AND'><input type='radio' name='tag_logic' value='AND' <?php if($Tags == "AND") {echo "checked='checked'";} ?> /> <span><?php _e("Selected Tags use 'AND'", 'UPCP')?></span></label><br />
		<label title='OR'><input type='radio' name='tag_logic' value='OR' <?php if($Tags == "OR") {echo "checked='checked'";} ?> /> <span><?php _e("Selected Tags use 'OR'", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Product Search", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('product_search_exp')" onMouseOut="HideToolTip('product_search_exp')" class="questionMark"><br> 
	<div id="product_search_exp" class="toolTip" ><?php _e("Set the 'Product Search' text box to search either product name, product name and description or product name, description and custom fields (slowest option)", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Product Search", 'UPCP')?></span></legend>
		<label title='Name'><input type='radio' name='product_search' value='name' <?php if($Product_Search == "name") {echo "checked='checked'";} ?> /> <span><?php _e("Name Only", 'UPCP')?></span></label><br />
		<label title='Name-and-Desc'><input type='radio' name='product_search' value='namedesc' <?php if($Product_Search == "namedesc") {echo "checked='checked'";} ?> /> <span><?php _e("Name and Description", 'UPCP')?></span></label><br />
		<label title='Name-Desc-and-Cust'><input type='radio' name='product_search' value='namedesccust' <?php if($Product_Search == "namedesccust") {echo "checked='checked'";} ?> /> <span><?php _e("Name, Description and Custom Fields", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Contents Filter", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('contents_filter_exp')" onMouseOut="HideToolTip('contents_filter_exp')" class="questionMark"><br> 
	<div id="contents_filter_exp" class="toolTip" ><?php _e("Should the default WordPress contents filter be applied to product descriptions before they're saved in the database?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Contents Filter", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='contents_filter' value='Yes' <?php if($Apply_Contents_Filter == "Yes") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='contents_filter' value='No' <?php if($Apply_Contents_Filter == "No") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Maintain Filtering", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('maintain_filtering_exp')" onMouseOut="HideToolTip('maintain_filtering_exp')" class="questionMark"><br> 
	<div id="maintain_filtering_exp" class="toolTip" ><?php _e("Should filtering be maintained after viewing a product page (may cause redirect to homepage issues)?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Maintain Filtering", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='maintain_filtering' value='Yes' <?php if($Maintain_Filtering == "Yes") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='maintain_filtering' value='No' <?php if($Maintain_Filtering == "No") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Results Filtering", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('inner_filter_exp')" onMouseOut="HideToolTip('inner_filter_exp')" class="questionMark"><br> 
	<div id="inner_filter_exp" class="toolTip" ><?php _e("Should filtering results be passed through the default content filter?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Show Category Description", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='inner_filter' value='Yes' <?php if($Inner_Filter == "Yes") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='inner_filter' value='No' <?php if($Inner_Filter == "No") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Thumbnail Support", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('thumbnail_support_exp')" onMouseOut="HideToolTip('thumbnail_support_exp')" class="questionMark"><br> 
	<div id="thumbnail_support_exp" class="toolTip" ><?php _e("Should thumbnails be used when possible on the main catalogue pages?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Thumbnail Support", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='thumbnail_support' value='Yes' <?php if($Thumbnail_Support == "Yes") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='thumbnail_support' value='No' <?php if($Thumbnail_Support == "No") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Show Category Description", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('show_category_descriptions_exp')" onMouseOut="HideToolTip('show_category_descriptions_exp')" class="questionMark"><br> 
	<div id="show_category_descriptions_exp" class="toolTip" ><?php _e("Should the descriptions of product categories be shown below them?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Show Category Description", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='show_category_descriptions' value='Yes' <?php if($Show_Category_Descriptions == "Yes") {echo "checked='checked'";} ?> /> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='show_category_descriptions' value='No' <?php if($Show_Category_Descriptions == "No") {echo "checked='checked'";} ?> /> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Show Catalogue Information", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('show_catalogue_information_exp')" onMouseOut="HideToolTip('show_catalogue_information_exp')" class="questionMark"><br> 
	<div id="show_catalogue_information_exp" class="toolTip" ><?php _e("Should the name or description of the catalogue be shown above the catalogue?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Show Catalogue Information", 'UPCP')?></span></legend>
		<label title='NameDescription'><input type='radio' name='show_catalogue_information' value='NameDescription' <?php if($Show_Catalogue_Information == "NameDescription") {echo "checked='checked'";} ?> /> <span><?php _e("Name and Description", 'UPCP')?></span></label><br />
		<label title='Name'><input type='radio' name='show_catalogue_information' value='Name' <?php if($Show_Catalogue_Information == "Name") {echo "checked='checked'";} ?> /> <span><?php _e("Name", 'UPCP')?></span></label><br />
		<label title='Description'><input type='radio' name='show_catalogue_information' value='Description' <?php if($Show_Catalogue_Information == "Description") {echo "checked='checked'";} ?> /> <span><?php _e("Description", 'UPCP')?></span></label><br />
		<label title='None'><input type='radio' name='show_catalogue_information' value='None' <?php if($Show_Catalogue_Information == "None") {echo "checked='checked'";} ?> /> <span><?php _e("None", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Social Media Options", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('social_media_exp')" onMouseOut="HideToolTip('social_media_exp')" class="questionMark"><br> 
	<div id="social_media_exp" class="toolTip" ><?php _e("Which social media links should be displayed on the product page?", 'UPCP')?></div></div>
	</th>
	<td>
	    <fieldset><legend class="screen-reader-text"><span><?php _e("Social Media Options", 'UPCP')?> </span></legend>
	        <label title='Facebook'><input type='checkbox' name='Socialmedia[]' value='Facebook' <?php if(in_array("Facebook", $Socialmedia)) {echo "checked='checked'";} ?> /> <span>Facebook</span></label><br />
	        <label title='Name'><input type='checkbox' name='Socialmedia[]' value='Google'  <?php if(in_array("Google", $Socialmedia)) {echo "checked='checked'";} ?>  /> <span>Google</span></label><br />
	        <label title='Twitter'><input type='checkbox' name='Socialmedia[]' value='Twitter' <?php if(in_array("Twitter", $Socialmedia)) {echo "checked='checked'";} ?> /> <span>Twitter</span></label><br />
	        <label title='Linkedin'><input type='checkbox' name='Socialmedia[]' value='Linkedin' <?php if(in_array("Linkedin", $Socialmedia)) {echo "checked='checked'";} ?> /> <span>Linkedin</span></label><br />
	        <label title='Pinterest'><input type='checkbox' name='Socialmedia[]' value='Pinterest' <?php if(in_array("Pinterest", $Socialmedia)) {echo "checked='checked'";} ?> /> <span>Pinterest</span></label><br />
	        <label title='Email'><input type='checkbox' name='Socialmedia[]' value='Email' <?php if(in_array("Email", $Socialmedia)) {echo "checked='checked'";} ?> /> <span>Email</span></label><br />
	        <div style='display:none;'><label title='Blank'><input type='checkbox' name='Socialmedia[]' value='Blank' checked='checked'/> <span>Blank</span></label></div>
	    </fieldset>
	</td>
	</tr>
</table>
</div>

<!--<div id='Payment' class='upcp-option-set upcp-hidden'>
<h2 id="payment-order-options" class="upcp-options-tab-title">Payment Options</h2>
<table class="form-table" class="form-table upcp-options-table">
<tr>
<th scope="row">Allow Payment By PayPal</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Allow Payment By PayPal</span></legend>
	<label title='Yes'><input type='radio' name='allow_payments' value='Yes' <?php if($Allow_Payments == "Yes") {echo "checked='checked'";} ?>/> <span>Yes</span></label><br />
	<label title='No'><input type='radio' name='allow_payments' value='No' <?php if($Allow_Payments == "No") {echo "checked='checked'";} ?> /> <span>No</span></label><br />
	<p>Should shopping cart buttons be added and payment be possible via PayPal?</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">PayPal Email Address</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>PayPal Email Address</span></legend>
	<label title='PayPal Email Address'><input type='text' name='paypal_email_address' value='<?php echo $PayPal_Email_Address; ?>' /></label><br />
	<p>If PayPal payments are possible, what e-mail address is associated with the PayPal account?</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">Pricing Currency</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>Pricing Currency</span></legend>
	<label title='Pricing Currency'></label><select name='pricing_currency_code' >
	<option value="AUD" <?php if($Pricing_Currency_Code == "AUD") {echo " selected=selected";} ?>><?php _e("Australian Dollar", 'EWD_UASP'); ?></option>
	<option value="BRL" <?php if($Pricing_Currency_Code == "BRL") {echo " selected=selected";} ?>><?php _e("Brazilian Real", 'EWD_UASP'); ?></option>
	<option value="CAD" <?php if($Pricing_Currency_Code == "CAD") {echo " selected=selected";} ?>><?php _e("Canadian Dollar", 'EWD_UASP'); ?></option>
	<option value="CZK" <?php if($Pricing_Currency_Code == "CZK") {echo " selected=selected";} ?>><?php _e("Czech Koruna", 'EWD_UASP'); ?></option>
	<option value="DKK" <?php if($Pricing_Currency_Code == "DKK") {echo " selected=selected";} ?>><?php _e("Danish Krone", 'EWD_UASP'); ?></option>
	<option value="EUR" <?php if($Pricing_Currency_Code == "EUR") {echo " selected=selected";} ?>><?php _e("Euro", 'EWD_UASP'); ?></option>
	<option value="HKD" <?php if($Pricing_Currency_Code == "HKD") {echo " selected=selected";} ?>><?php _e("Hong Kong Dollar", 'EWD_UASP'); ?></option>
	<option value="HUF" <?php if($Pricing_Currency_Code == "HUF") {echo " selected=selected";} ?>><?php _e("Hungarian Forint", 'EWD_UASP'); ?></option>
	<option value="ILS" <?php if($Pricing_Currency_Code == "ILS") {echo " selected=selected";} ?>><?php _e("Israeli New Sheqel", 'EWD_UASP'); ?></option>
	<option value="JPY" <?php if($Pricing_Currency_Code == "JPY") {echo " selected=selected";} ?>><?php _e("Japanese Yen", 'EWD_UASP'); ?></option>
	<option value="MYR" <?php if($Pricing_Currency_Code == "MYR") {echo " selected=selected";} ?>><?php _e("Malaysian Ringgit", 'EWD_UASP'); ?></option>
	<option value="MXN" <?php if($Pricing_Currency_Code == "MXN") {echo " selected=selected";} ?>><?php _e("Mexican Peso", 'EWD_UASP'); ?></option>
	<option value="NOK" <?php if($Pricing_Currency_Code == "NOK") {echo " selected=selected";} ?>><?php _e("Norwegian Krone", 'EWD_UASP'); ?></option>
	<option value="NZD" <?php if($Pricing_Currency_Code == "NZD") {echo " selected=selected";} ?>><?php _e("New Zealand Dollar", 'EWD_UASP'); ?></option>
	<option value="PHP" <?php if($Pricing_Currency_Code == "PHP") {echo " selected=selected";} ?>><?php _e("Philippine Peso", 'EWD_UASP'); ?></option>
	<option value="PLN" <?php if($Pricing_Currency_Code == "PLN") {echo " selected=selected";} ?>><?php _e("Polish Zloty", 'EWD_UASP'); ?></option>
	<option value="GBP" <?php if($Pricing_Currency_Code == "GBP") {echo " selected=selected";} ?>><?php _e("Pound Sterling", 'EWD_UASP'); ?></option>
	<option value="RUB" <?php if($Pricing_Currency_Code == "RUB") {echo " selected=selected";} ?>><?php _e("Russian Ruble", 'EWD_UASP'); ?></option>
	<option value="SGD" <?php if($Pricing_Currency_Code == "SGD") {echo " selected=selected";} ?>><?php _e("Singapore Dollar", 'EWD_UASP'); ?></option>
	<option value="SEK" <?php if($Pricing_Currency_Code == "SEK") {echo " selected=selected";} ?>><?php _e("Swedish Krona", 'EWD_UASP'); ?></option>
	<option value="CHF" <?php if($Pricing_Currency_Code == "CHF") {echo " selected=selected";} ?>><?php _e("Swiss Franc", 'EWD_UASP'); ?></option>
	<option value="TWD" <?php if($Pricing_Currency_Code == "TWD") {echo " selected=selected";} ?>><?php _e("Taiwan New Dollar", 'EWD_UASP'); ?></option>
	<option value="THB" <?php if($Pricing_Currency_Code == "THB") {echo " selected=selected";} ?>><?php _e("Thai Baht", 'EWD_UASP'); ?></option>
	<option value="TRY" <?php if($Pricing_Currency_Code == "TRY") {echo " selected=selected";} ?>><?php _e("Turkish Lira", 'EWD_UASP'); ?></option>
	<option value="USD" <?php if($Pricing_Currency_Code == "USD") {echo " selected=selected";} ?>><?php _e("U.S. Dollar", 'EWD_UASP'); ?></option>
	</select>
	<p>What currency are your products priced in?</p>
	</fieldset>
</td>
</tr>

<tr>
<th scope="row">"Thank You" Page URL</th>
<td>
	<fieldset><legend class="screen-reader-text"><span>"Thank You" Page URL</span></legend>
	<label title='Thank You Page URL'><input type='text' name='thank_you_url' value='<?php echo $Thank_You_URL; ?>' /></label><br />
	<p>What page should customers be taken to after successfully completing a PayPal payment?</p>
	</fieldset>
</td>
</tr>
</table>
</div>-->

<div id='Premium' class='upcp-option-set upcp-hidden'>
<h2 id="premium-options" class="upcp-options-tab-title">Premium Options</h2>
<table id='premium-options' class="form-table upcp-options-table">
	<tr>
	<th scope="row"><?php _e("Product Page Type", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('custom_product_page_exp')" onMouseOut="HideToolTip('custom_product_page_exp')" class="questionMark"><br> 
	<div id="custom_product_page_exp" class="toolTip" ><?php _e("Should the layout created on the 'Product Pages' tab be used instead of the default plugin layout?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Use your custom designed page (Product Page tab) instead of the default?", 'UPCP')?></span></legend>
		<label title='Tabbed'><input type='radio' name='custom_product_page' value='Tabbed' <?php if($Custom_Product_Page == "Tabbed") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Tabbed Product Page", 'UPCP')?></span></label><br />
		<label title='Yes'><input type='radio' name='custom_product_page' value='Yes' <?php if($Custom_Product_Page == "Yes") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Custom Product Page", 'UPCP')?></span></label><br />
		<label title='Large'><input type='radio' name='custom_product_page' value='Large' <?php if($Custom_Product_Page == "Large") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Custom Page - Large Screen Only", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='custom_product_page' value='No' <?php if($Custom_Product_Page == "No") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Default", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Product Inquiry Form", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('product_inquiry_form_exp')" onMouseOut="HideToolTip('product_inquiry_form_exp')" class="questionMark"><br> 
	<div id="product_inquiry_form_exp" class="toolTip" ><?php _e("Should a form be added to inquire about products on the product page (requires plugin 'Contact Form 7')?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Should a form be added to inquire about products on the product page (requires plugin 'Contact Form 7')?", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='product_inquiry_form' value='Yes' <?php if($Product_Inquiry_Form == "Yes") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Yes", 'UPCP')?><?php _e(" (requires plugin 'Contact Form 7')", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='product_inquiry_form' value='No' <?php if($Product_Inquiry_Form == "No") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Product Reviews", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('product_reviews_exp')" onMouseOut="HideToolTip('product_reviews_exp')" class="questionMark"><br> 
	<div id="product_reviews_exp" class="toolTip" ><?php _e("Should reviews be displayed for products on the 'Tabbed Layout' product page (requires plugin 'Ultimate Reviews')?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Should reviews be displayed for products on the 'Tabbed Layout' product page (requires plugin 'Ultimate Reviews')?", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='product_reviews' value='Yes' <?php if($Product_Reviews == "Yes") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Yes", 'UPCP')?><?php _e(" (requires plugin 'Ultimate Reviews')", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='product_reviews' value='No' <?php if($Product_Reviews == "No") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Lightbox", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('lightbox_exp')" onMouseOut="HideToolTip('lightbox_exp')" class="questionMark"><br> 
	<div id="lightbox_exp" class="toolTip" ><?php _e("Should a lightbox pop-up on the product page when an image is clicked?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Should a lightbox pop-up on the product page when an image is clicked?", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='lightbox' value='Yes' <?php if($Lightbox == "Yes") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='Main'><input type='radio' name='lightbox' value='Main' <?php if($Lightbox == "Main") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Main Image Only", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='lightbox' value='No' <?php if($Lightbox == "No") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Products per Page", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('products_per_page_exp')" onMouseOut="HideToolTip('products_per_page_exp')" class="questionMark"><br> 
	<div id="products_per_page_exp" class="toolTip" ><?php _e("Set the maximum number of products per page for your catalogues", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("How many products should be displayed on each page of the catalogue?", 'UPCP')?></span></legend>
		<input type='text' name='products_per_page' value='<?php echo $Products_Per_Page; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Pagination Location", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('pagination_location_exp')" onMouseOut="HideToolTip('pagination_location_exp')" class="questionMark"><br> 
	<div id="pagination_location_exp" class="toolTip" ><?php _e("Set the location of pagination controls for your catalogues", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Where should the pagination controls be located?", 'UPCP')?></span></legend>
		<label title='Top'><input type='radio' name='pagination_location' value='Top' <?php if($Pagination_Location == "Top") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Top", 'UPCP')?></span></label><br />
		<label title='Bottom'><input type='radio' name='pagination_location' value='Bottom' <?php if($Pagination_Location == "Bottom") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Bottom", 'UPCP')?></span></label><br />
		<label title='Both'><input type='radio' name='pagination_location' value='Both' <?php if($Pagination_Location == "Both") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Top and Bottom", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Product Sorting", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('product_sort_exp')" onMouseOut="HideToolTip('product_sort_exp')" class="questionMark"><br> 
	<div id="product_sort_exp" class="toolTip" ><?php _e("Select which sorting options are available in the 'Sort By' box", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Available Sorting Options", 'UPCP')?></span></legend>
		<label title='Price and Name'><input type='radio' name='product_sort' value='Price_Name' <?php if($Product_Sort == "Price_Name") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Price and Name", 'UPCP')?></span></label><br />
		<label title='Price'><input type='radio' name='product_sort' value='Price' <?php if($Product_Sort == "Price") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Price", 'UPCP')?></span></label><br />
		<label title='Name'><input type='radio' name='product_sort' value='Name' <?php if($Product_Sort == "Name") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Name", 'UPCP')?></span></label><br />
		<label title='None'><input type='radio' name='product_sort' value='None' <?php if($Product_Sort == "None") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("None", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Custom Slugs Conversion", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('cf_converion_exp')" onMouseOut="HideToolTip('cf_converion_exp')" class="questionMark"><br> 
	<div id="cf_converion_exp" class="toolTip" ><?php _e("Are custom field slugs being used in the product descriptions?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Are custom field slugs being used in the product descriptions?", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='cf_converion' value='Yes' <?php if($CF_Conversion == "Yes") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='cf_converion' value='No' <?php if($CF_Conversion == "No") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Related Products", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('related_products_exp')" onMouseOut="HideToolTip('related_products_exp')" class="questionMark"><br> 
	<div id="related_products_exp" class="toolTip" ><?php _e("Should related products be created automatically, manually, or not at all?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Should related products be created automatically, manually, or not at all?", 'UPCP')?></span></legend>
		<label title='Auto'><input type='radio' name='related_products' value='Auto' <?php if($Related_Products == "Auto") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Automatic", 'UPCP')?></span></label><br />
		<label title='Manual'><input type='radio' name='related_products' value='Manual' <?php if($Related_Products == "Manual") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Manual", 'UPCP')?></span></label><br />
		<label title='None'><input type='radio' name='related_products' value='None' <?php if($Related_Products == "None") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("None", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Next/Previous Products", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('next_previous_exp')" onMouseOut="HideToolTip('next_previous_exp')" class="questionMark"><br> 
	<div id="next_previous_exp" class="toolTip" ><?php _e("Should next and previous products be displayed? Automatic takes the products with the next and previous IDs, if they exist.", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Should next and previous products be displayed?", 'UPCP')?></span></legend>
		<label title='Auto'><input type='radio' name='next_previous' value='Auto' <?php if($Next_Previous == "Auto") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Automatic", 'UPCP')?></span></label><br />
		<label title='Manual'><input type='radio' name='next_previous' value='Manual' <?php if($Next_Previous == "Manual") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Manual", 'UPCP')?></span></label><br />
		<label title='None'><input type='radio' name='next_previous' value='None' <?php if($Next_Previous == "None") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("None", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Set Access Role", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('access_role_exp')" onMouseOut="HideToolTip('access_role_exp')" class="questionMark"><br> 
	<div id="access_role_exp" class="toolTip" ><?php _e("Which level of user should have access to UPCP?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span>Set Access Role</span></legend>
		<label title='Access Role'></label><select name='access_role' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>> 
			<option value="administrator"<?php if($Access_Role == "administrator") {echo " selected=selected";} ?>>Administrator</option>
			<option value="delete_others_pages"<?php if($Access_Role == "delete_others_pages") {echo " selected=selected";} ?>>Editor</option>
			<option value="delete_published_posts"<?php if($Access_Role == "delete_published_posts") {echo " selected=selected";} ?>>Author</option>
			<option value="delete_posts"<?php if($Access_Role == "delete_posts") {echo " selected=selected";} ?>>Contributor</option>
			<option value="read"<?php if($Access_Role == "read") {echo " selected=selected";} ?>>Subscriber</option>
		</select>
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Hide Blank Custom Fields", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('custom_fields_blank_exp')" onMouseOut="HideToolTip('custom_fields_blank_exp')" class="questionMark"><br> 
	<div id="custom_fields_blank_exp" class="toolTip" ><?php _e("Should custom fields be hidden when they are emtpy?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Should custom fields be hidden when they are emtpy?", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='custom_fields_blank' value='Yes' <?php if($Custom_Fields_Blank == "Yes") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='custom_fields_blank' value='No' <?php if($Custom_Fields_Blank == "No") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
</table>
</div>

<div id='SEO' class='upcp-option-set upcp-hidden'>
<h2 id="seo-options" class="upcp-options-tab-title">SEO Options</h2>
<table id='seo-options' class="form-table upcp-options-table">
	<tr>
	<th scope="row"><?php _e("Pretty Permalinks", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('pretty_links_exp')" onMouseOut="HideToolTip('pretty_links_exp')" class="questionMark"><br> 
	<div id="pretty_links_exp" class="toolTip" ><?php _e("Should the plugin create SEO-friendly product page URLs?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Use Pretty Permalinks for Product Pages", 'UPCP')?></span></legend>
		<label title='Yes'><input type='radio' name='pretty_links' value='Yes' <?php if($PrettyLinks == "Yes") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='No'><input type='radio' name='pretty_links' value='No' <?php if($PrettyLinks == "No") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("XML Sitemap URL", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('xml_sitemap_url_exp')" onMouseOut="HideToolTip('xml_sitemap_url_exp')" class="questionMark"><br> 
	<div id="xml_sitemap_url_exp" class="toolTip" ><?php _e("Set the base URL path of XML sitemap that the plugin creates of all products, used for SEO purposes", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("What URL should be used at the base of the products sitemap?", 'UPCP')?></span></legend>
		<input type='text' name='xml_sitemap_url' value='<?php echo $XML_Sitemap_URL; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("SEO By Yoast Integration", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('seo_option_exp')" onMouseOut="HideToolTip('seo_option_exp')" class="questionMark"><br> 
	<div id="seo_option_exp" class="toolTip" ><?php _e("Should product descriptions and titled be added using SEO By Yoast for product pages?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Should product descriptions and titled be added using SEO By Yoast for product pages?", 'UPCP')?></span></legend>
		<label title='Yoast'><input type='radio' name='seo_option' value='Yoast' <?php if($SEO_Option == "Yoast") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Yes", 'UPCP')?></span></label><br />
		<label title='None'><input type='radio' name='seo_option' value='None' <?php if($SEO_Option == "None") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("No", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<tr>
	<th scope="row"><?php _e("Description Handling", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('seo_integration_exp')" onMouseOut="HideToolTip('seo_integration_exp')" class="questionMark"><br> 
	<div id="seo_integration_exp" class="toolTip" ><?php _e("Should the page description be added to or replaced?", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("Should the page description be added to or replaced?", 'UPCP')?></span></legend>
		<label title='Add'><input type='radio' name='seo_integration' value='Add' <?php if($SEO_Integration == "Add") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Add", 'UPCP')?></span></label><br />
		<label title='Replace'><input type='radio' name='seo_integration' value='Replace' <?php if($SEO_Integration == "Replace") {echo "checked='checked'";} ?> <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/> <span><?php _e("Replace", 'UPCP')?></span></label><br />
		</fieldset>
	</td>
	</tr>
	<th scope="row"><?php _e("SEO Title", 'UPCP')?> <br/> 
	<div onMouseOver="ShowToolTip('seo_title_exp')" onMouseOut="HideToolTip('seo_title_exp')" class="questionMark"><br> 
	<div id="seo_title_exp" class="toolTip" ><?php _e("What should the page title be set to? Can use [page-title], [product-name], [category-name], [subcategory_name] to substitute those in the title.", 'UPCP')?></div></div>
	</th>
	<td>
		<fieldset><legend class="screen-reader-text"><span><?php _e("What should the page title be set to? Can use [page-title], [product-name], [category-name], [subcategory_name] to substitute those in the title.", 'UPCP')?></span></legend>
		<input type='text' name='seo_title' value='<?php echo $SEO_Title; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
		</fieldset>
	</td>
	</tr>
</table>
</div>

<div id='Labelling' class='upcp-option-set upcp-hidden'>
<h2 id="labelling-options" class="upcp-options-tab-title">Labelling Options</h2>
		<p>Replace the default text on the catalogue pages</p>
<div id='labelling-view-options' class="upcp-options-div upcp-options-flex">
<div class='upcp-subsection'>
	<div class='upcp-subsection-header'>Sidebar</div>
	<div class='upcp-subsection-content'>
		<div class='upcp-option'>
		<?php _e("Categories Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Categories' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='categories_label' value='<?php echo $Categories_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
		<?php _e("Sub-Categories Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Sub-Categories' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='subcategories_label' value='<?php echo $SubCategories_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
		<?php _e("Tags Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Tags' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='tags_label' value='<?php echo $Tags_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
		<?php _e("Custom Fields Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Additional Options' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='custom_fields_label' value='<?php echo $Custom_Fields_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
		<?php _e("Sort By Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Sort By' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='sort_by_label' value='<?php echo $Sort_By_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
		<?php _e("Price (Ascending) Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Price (Ascending)' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='price_ascending_label' value='<?php echo $Price_Ascending_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
		<?php _e("Price (Descending) Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Price (Descending)' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='price_descending_label' value='<?php echo $Price_Descending_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
		<?php _e("Name (Ascending) Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Name (Ascending)' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='name_ascending_label' value='<?php echo $Name_Ascending_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
		<?php _e("Name (Descending) Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Name (Descending)' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='name_descending_label' value='<?php echo $Name_Descending_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
		<?php _e("Product Name Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Product Name' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='product_name_search_label' value='<?php echo $Product_Name_Search_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
		<?php _e("Search Placeholder Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace the search placeholder text on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='product_name_text_label' value='<?php echo $Product_Search_Text_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
	</div>
</div>
<div class='upcp-subsection'>
	<div class='upcp-subsection-header'>Catalogue</div>
	<div class='upcp-subsection-content'>
		<div class='upcp-option'>
		<?php _e("Details Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'Details' on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='details_label' value='<?php echo $Details_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
			<?php _e("Back to Catalogue Label", 'UPCP')?>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace the search placeholder text on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='back_to_catalogue' value='<?php echo $Back_To_Catalogue_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
			<?php _e("Updating Results Label", 'UPCP')?> <br/> 
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should be displayed while filtering results are updating", 'UPCP')?></span></legend>
			<input type='text' name='updating_results_label' value='<?php echo $Updating_Results_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
			<?php _e("No Products Found Label", 'UPCP')?> <br/> 
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should display when no products are found", 'UPCP')?></span></legend>
			<input type='text' name='no_results_found_label' value='<?php echo $No_Results_Found_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
			<?php _e("Products Pagination Label", 'UPCP')?> <br/>
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'products' for pagination on your catalogue pages", 'UPCP')?></span></legend>
			<input type='text' name='products_pagination_label' value='<?php echo $Products_Pagination_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		<div class='upcp-option'>
			<?php _e("Read More Label", 'UPCP')?> <br/> 
			<fieldset><legend class="screen-reader-text"><span><?php _e("Text that should replace 'read more' for product details", 'UPCP')?></span></legend>
			<input type='text' name='read_more_label' value='<?php echo $Read_More_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
	</div>
</div>
<div class='upcp-subsection'>
	<div class='upcp-subsection-header'>Product Page</div>
	<div class='upcp-subsection-content'>
		<div class='upcp-option'>
		<?php _e("Product Details Tab Label", 'UPCP')?>
			<fieldset></legend>
			<input type='text' name='product_details_label' value='<?php echo $Product_Details_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
			<div class='upcp-option'>
		<?php _e("Additional Information Tab Label", 'UPCP')?>
			<fieldset>
			<input type='text' name='additional_info_label' value='<?php echo $Additional_Info_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
			<div class='upcp-option'>
		<?php _e("Contact Us Tab Label", 'UPCP')?>
			<fieldset>
			<input type='text' name='contact_us_label' value='<?php echo $Contact_Us_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
			<div class='upcp-option'>
		<?php _e("Product Inquiry Form Label", 'UPCP')?>
			<fieldset>
			<input type='text' name='product_inquiry_form_title_label' value='<?php echo $Product_Inquiry_Form_Title_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
			<div class='upcp-option'>
		<?php _e("Related Products Label", 'UPCP')?>
			<fieldset>
			<input type='text' name='related_products_label' value='<?php echo $Related_Products_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
			<div class='upcp-option'>
		<?php _e("Next Product Label", 'UPCP')?>
			<fieldset>
			<input type='text' name='next_product_label' value='<?php echo $Next_Product_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
			<div class='upcp-option'>
		<?php _e("Previous Product Label", 'UPCP')?>
			<fieldset>
			<input type='text' name='previous_product_label' value='<?php echo $Previous_Product_Label; ?>' <?php if ($Full_Version != "Yes") {echo "disabled";} ?>/>
			</fieldset>
		</div>
		</div>
	</div>

	<div class='clear'></div>

</div></div>

<p class="submit"><input type="submit" name="Options_Submit" id="submit" class="button button-primary" value='<?php _e("Save Changes", "UPCP")?>'/></p></form>

<div class='clear'></div>
</div></div>