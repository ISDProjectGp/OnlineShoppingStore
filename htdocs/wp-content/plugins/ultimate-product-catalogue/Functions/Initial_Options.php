<?php
/* Adds a the default options for the product catalogue which can be changed on the options page */
function Initial_UPCP_Options() {
	if (get_option("UPCP_Color_Scheme") == "") {update_option("UPCP_Color_Scheme", "Blue");}
	if (get_option("UPCP_Product_Links") == "") {update_option("UPCP_Product_Links", "Same");}
	if (get_option("UPCP_Tag_Logic") == "") {update_option("UPCP_Tag_Logic", "AND");}
	if (get_option("UPCP_Filter_Type") == "") {update_option("UPCP_Filter_Type", "AJAX");}
	if (get_option("UPCP_Read_More") == "") {update_option("UPCP_Read_More", "Yes");}
	if (get_option("UPCP_Pretty_Links") == "") {update_option("UPCP_Pretty_Links", "No");}
	if (get_option("UPCP_Mobile_SS") == "") {update_option("UPCP_Mobile_SS", "No");}
	if (get_option("UPCP_Install_Flag") == "") {update_option("UPCP_Install_Flag", "Yes");}
	if (get_option("UPCP_First_Install_Version") == "") {update_option("UPCP_First_Install_Version", "3.6");}
	if (get_option("UPCP_Desc_Chars") == "") {update_option("UPCP_Desc_Chars", 240);}
	if (get_option("UPCP_Case_Insensitive_Search") == "") {update_option("UPCP_Case_Insensitive_Search", "Yes");}
	if (get_option("UPCP_Apply_Contents_Filter") == "") {update_option("UPCP_Apply_Contents_Filter", "Yes");}
	if (get_option("UPCP_Maintain_Filtering") == "") {update_option("UPCP_Maintain_Filtering", "Yes");}
	if (get_option("UPCP_Thumbnail_Support") == "") {update_option("UPCP_Thumbnail_Support", "No");}
	if (get_option("UPCP_Show_Category_Descriptions") == "") {update_option("UPCP_Show_Category_Descriptions", "No");}
	if (get_option("UPCP_Show_Catalogue_Information") == "") {update_option("UPCP_Show_Catalogue_Information", "None");}
	if (get_option("UPCP_Inner_Filter") == "") {update_option("UPCP_Inner_Filter", "No");}
	
	if (get_option("UPCP_Product_Search") == "") {update_option("UPCP_Product_Search", "name");}
	if (get_option("UPCP_Custom_Product_Page") == "") {update_option("UPCP_Custom_Product_Page", "No");}
	if (get_option("UPCP_Product_Inquiry_Form") == "") {update_option("UPCP_Product_Inquiry_Form", "No");}
	if (get_option("UPCP_Product_Reviews") == "") {update_option("UPCP_Product_Reviews", "No");}
	if (get_option("UPCP_Lightbox") == "") {update_option("UPCP_Lightbox", "No");}
	if (get_option("UPCP_Products_Per_Page") == "") {update_option("UPCP_Products_Per_Page", 1000000);}
	if (get_option("EWD_OTP_Access_Role") == "") {update_option("UPCP_Access_Role", "administrator");}
	if (get_option("UPCP_PP_Grid_Width") == "") {update_option("UPCP_PP_Grid_Width", 90);}
	if (get_option("UPCP_PP_Grid_Height") == "") {update_option("UPCP_PP_Grid_Height", 35);}
	if (get_option("UPCP_Top_Bottom_Padding") == "") {update_option("UPCP_Top_Bottom_Padding", 10);}
	if (get_option("UPCP_Left_Right_Padding") == "") {update_option("UPCP_Left_Right_Padding", 10);}
	
	if (get_option("UPCP_SEO_Option") == "") {update_option("UPCP_SEO_Option", "None");}
	if (get_option("UPCP_SEO_Integration") == "") {update_option("UPCP_SEO_Integration", "Add");}
	if (get_option("UPCP_SEO_Title") == "") {update_option("UPCP_SEO_Title", "[page-title] | [product-name]");}
	if (get_option("UPCP_Update_Breadcrumbs") == "") {update_option("UPCP_Update_Breadcrumbs", "No");}

	if (get_option("UPCP_Pagination_Background") == "") {update_option("UPCP_Pagination_Background", "None");}
	if (get_option("UPCP_Pagination_Border") == "") {update_option("UPCP_Pagination_Border", "none");}
	if (get_option("UPCP_Pagination_Shadow") == "") {update_option("UPCP_Pagination_Shadow", "shadow-none");}
	if (get_option("UPCP_Pagination_Gradient") == "") {update_option("UPCP_Pagination_Gradient", "gradient-none");}
	if (get_option("UPCP_Pagination_Font") == "") {update_option("UPCP_Pagination_Font", "none");}
	if (get_option("UPCP_Sidebar_Title_Collapse") == "") {update_option("UPCP_Sidebar_Title_Collapse", "no");}
	if (get_option("UPCP_Sidebar_Title_Hover") == "") {update_option("UPCP_Sidebar_Title_Hover", "none");}
	if (get_option("UPCP_Sidebar_Checkbox_Style") == "") {update_option("UPCP_Sidebar_Checkbox_Style", "none");}

	if (get_option("UPCP_Product_Links") == "") {UPCP_Set_Default_Style_Values();}
}
