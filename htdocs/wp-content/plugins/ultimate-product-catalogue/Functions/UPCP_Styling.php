<?php

define('THUMBNAIL_VIEW_IMAGE_HOVER_FADE_DEFAULT', "None");
define('THUMBNAIL_VIEW_MOUSEOVER_ZOOM_DEFAULT', "None");
define('THUMBNAIL_VIEW_IMAGE_HEIGHT_DEFAULT', "");
define('THUMBNAIL_VIEW_IMAGE_WIDTH_DEFAULT', "");
define('THUMBNAIL_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT', "");
define('THUMBNAIL_VIEW_IMAGE_HOLDER_WIDTH_DEFAULT', "");
define('THUMBNAIL_VIEW_IMAGE_BORDER_DEFAULT', "None");
define('THUMBNAIL_VIEW_IMAGE_BORDER_COLOR_DEFAULT', "");
define('THUMBNAIL_VIEW_BOX_WIDTH_DEFAULT', "");
define('THUMBNAIL_VIEW_BOX_MIN_HEIGHT_DEFAULT', "");
define('THUMBNAIL_VIEW_BOX_MAX_HEIGHT_DEFAULT', "");
define('THUMBNAIL_VIEW_BOX_PADDING_DEFAULT', "0");
define('THUMBNAIL_VIEW_BOX_MARGIN_DEFAULT', "");
define('THUMBNAIL_VIEW_BOX_BORDER_DEFAULT', "Yes");
define('THUMBNAIL_VIEW_BORDER_COLOR_DEFAULT', "");
define('THUMBNAIL_VIEW_TITLE_FONT_SIZE_DEFAULT', "");
define('THUMBNAIL_VIEW_TITLE_COLOR_DEFAULT', "");
define('THUMBNAIL_VIEW_TITLE_FONT_DEFAULT', "");
define('THUMBNAIL_VIEW_PRICE_FONT_SIZE_DEFAULT', "");
define('THUMBNAIL_VIEW_PRICE_COLOR_DEFAULT', "");
define('THUMBNAIL_VIEW_PRICE_FONT_DEFAULT', "");
define('THUMBNAIL_VIEW_BACKGROUND_COLOR_DEFAULT', "");
define('THUMBNAIL_VIEW_SEPARATOR_LINE_DEFAULT', "None");
define('THUMBNAIL_VIEW_DETAILS_ARROW_DEFAULT', "Original");
define('THUMBNAIL_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT', "");

define('LIST_VIEW_IMAGE_HOVER_FADE_DEFAULT', "None");
define('LIST_VIEW_MOUSEOVER_ZOOM_DEFAULT', "None");
define('LIST_VIEW_IMAGE_HEIGHT_DEFAULT', "");
define('LIST_VIEW_IMAGE_WIDTH_DEFAULT', "");
define('LIST_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT', "200");
define('LIST_VIEW_IMAGE_BORDER_DEFAULT', "None");
define('LIST_VIEW_IMAGE_BORDER_COLOR_DEFAULT', "");
define('LIST_VIEW_IMAGE_BACKGROUND_COLOR_DEFAULT', "#fafafa");
define('LIST_VIEW_ITEM_MARGIN_LEFT_DEFAULT', "5");
define('LIST_VIEW_ITEM_MARGIN_TOP_DEFAULT', "10");
define('LIST_VIEW_ITEM_PADDING_DEFAULT', "0");
define('LIST_VIEW_ITEM_MIN_HEIGHT_DEFAULT', "240");
define('LIST_VIEW_ITEM_MAX_HEIGHT_DEFAULT', "");
define('LIST_VIEW_ITEM_COLOR_DEFAULT', "");
define('LIST_VIEW_TITLE_FONT_SIZE_DEFAULT', "");
define('LIST_VIEW_TITLE_COLOR_DEFAULT', "#1b8be0");
define('LIST_VIEW_TITLE_FONT_DEFAULT', "");
define('LIST_VIEW_PRICE_FONT_SIZE_DEFAULT', "");
define('LIST_VIEW_PRICE_COLOR_DEFAULT', "#2e8f9a");
define('LIST_VIEW_PRICE_FONT_DEFAULT', "");
define('LIST_VIEW_BACKGROUND_COLOR_DEFAULT', "");
define('LIST_VIEW_DETAILS_ARROW_DEFAULT', "Original");
define('LIST_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT', "");

define('DETAIL_VIEW_IMAGE_HOVER_FADE_DEFAULT', "None");
define('DETAIL_VIEW_MOUSEOVER_ZOOM_DEFAULT', "None");
define('DETAIL_VIEW_IMAGE_HEIGHT_DEFAULT', "");
define('DETAIL_VIEW_IMAGE_WIDTH_DEFAULT', "");
define('DETAIL_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT', "");
define('DETAIL_VIEW_IMAGE_HOLDER_WIDTH_DEFAULT', "");
define('DETAIL_VIEW_IMAGE_BORDER_DEFAULT', "None");
define('DETAIL_VIEW_IMAGE_BORDER_COLOR_DEFAULT', "");
define('DETAIL_VIEW_IMAGE_BACKGROUND_COLOR_DEFAULT', "");
define('DETAIL_VIEW_BOX_WIDTH_DEFAULT', "");
define('DETAIL_VIEW_BOX_MIN_HEIGHT_DEFAULT', "");
define('DETAIL_VIEW_BOX_PADDING_DEFAULT', "0");
define('DETAIL_VIEW_BOX_MARGIN_DEFAULT', "15 auto");
define('DETAIL_VIEW_BOX_BORDER_DEFAULT', "Yes");
define('DETAIL_VIEW_BORDER_COLOR_DEFAULT', "");
define('DETAIL_VIEW_TITLE_FONT_SIZE_DEFAULT', "");
define('DETAIL_VIEW_TITLE_COLOR_DEFAULT', "#1b8be0");
define('DETAIL_VIEW_TITLE_FONT_DEFAULT', "");
define('DETAIL_VIEW_PRICE_FONT_SIZE_DEFAULT', "");
define('DETAIL_VIEW_PRICE_COLOR_DEFAULT', "");
define('DETAIL_VIEW_PRICE_FONT_DEFAULT', "");
define('DETAIL_VIEW_BACKGROUND_COLOR_DEFAULT', "");
define('DETAIL_VIEW_SEPARATOR_LINE_DEFAULT', "None");
define('DETAIL_VIEW_DETAILS_ARROW_DEFAULT', "Original");
define('DETAIL_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT', "");

define('UPCP_SIDEBAR_HEADER_FONT', "");
define('UPCP_SIDEBAR_HEADER_FONT_SIZE', "");
define('UPCP_SIDEBAR_HEADER_FONT_WEIGHT', "");
define('UPCP_SIDEBAR_HEADER_COLOR', "");
define('UPCP_SIDEBAR_SUBHEADER_FONT', "");
define('UPCP_SIDEBAR_SUBHEADER_FONT_SIZE', "");
define('UPCP_SIDEBAR_SUBHEADER_FONT_WEIGHT', "");
define('UPCP_SIDEBAR_SUBHEADER_COLOR', "");
define('UPCP_SIDEBAR_CHECKBOX_FONT', "");
define('UPCP_SIDEBAR_CHECKBOX_FONT_SIZE', "");
define('UPCP_SIDEBAR_CHECKBOX_FONT_WEIGHT', "");
define('UPCP_SIDEBAR_CHECKBOX_COLOR', "");

function UPCP_Set_Default_Style_Values() {
	/* Thumbnail View Options */
	update_option("UPCP_Thumbnail_View_Image_Hover_Fade", THUMBNAIL_VIEW_IMAGE_HOVER_FADE_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Mouseover_Zoom", THUMBNAIL_VIEW_MOUSEOVER_ZOOM_DEFAULT);  
	update_option("UPCP_Thumbnail_View_Image_Height", THUMBNAIL_VIEW_IMAGE_HEIGHT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Image_Width", THUMBNAIL_VIEW_IMAGE_WIDTH_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Image_Holder_Height", THUMBNAIL_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Image_Holder_Width", THUMBNAIL_VIEW_IMAGE_HOLDER_WIDTH_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Image_Border", THUMBNAIL_VIEW_IMAGE_BORDER_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Image_Border_Color", THUMBNAIL_VIEW_IMAGE_BORDER_COLOR_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Width", THUMBNAIL_VIEW_BOX_WIDTH_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Min_Height", THUMBNAIL_VIEW_BOX_MIN_HEIGHT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Max_Height", THUMBNAIL_VIEW_BOX_MAX_HEIGHT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Padding", THUMBNAIL_VIEW_BOX_PADDING_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Margin", THUMBNAIL_VIEW_BOX_MARGIN_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Box_Border", THUMBNAIL_VIEW_BOX_BORDER_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Border_Color", THUMBNAIL_VIEW_BORDER_COLOR_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Title_Font_Size", THUMBNAIL_VIEW_TITLE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Title_Font", THUMBNAIL_VIEW_TITLE_FONT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Title_Color", THUMBNAIL_VIEW_TITLE_COLOR_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Price_Font", THUMBNAIL_VIEW_PRICE_FONT_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Price_Font_Size", THUMBNAIL_VIEW_PRICE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Price_Color", THUMBNAIL_VIEW_PRICE_COLOR_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Background_Color", THUMBNAIL_VIEW_BACKGROUND_COLOR_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Separator_Line", THUMBNAIL_VIEW_SEPARATOR_LINE_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Details_Arrow", THUMBNAIL_VIEW_DETAILS_ARROW_DEFAULT); 
	update_option("UPCP_Thumbnail_View_Custom_Details_Arrow", THUMBNAIL_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT); 
	
	/* List View Options */
	update_option("UPCP_List_View_Image_Hover_Fade", LIST_VIEW_IMAGE_HOVER_FADE_DEFAULT); 
	update_option("UPCP_List_View_Mouseover_Zoom", LIST_VIEW_MOUSEOVER_ZOOM_DEFAULT); 
	update_option("UPCP_List_View_Image_Height", LIST_VIEW_IMAGE_HEIGHT_DEFAULT); 
	update_option("UPCP_List_View_Image_Width", LIST_VIEW_IMAGE_WIDTH_DEFAULT); 
	update_option("UPCP_List_View_Image_Holder_Height", LIST_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT); 
	update_option("UPCP_List_View_Image_Border", LIST_VIEW_IMAGE_BORDER_DEFAULT); 
	update_option("UPCP_List_View_Image_Border_Color", LIST_VIEW_IMAGE_BORDER_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Image_Background_Color", LIST_VIEW_IMAGE_BACKGROUND_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Item_Margin_Left", LIST_VIEW_ITEM_MARGIN_LEFT_DEFAULT); 
	update_option("UPCP_List_View_Item_Margin_Top", LIST_VIEW_ITEM_MARGIN_TOP_DEFAULT); 
	update_option("UPCP_List_View_Item_Padding", LIST_VIEW_ITEM_PADDING_DEFAULT); 
	update_option("UPCP_List_View_Item_Min_Height", LIST_VIEW_ITEM_MIN_HEIGHT_DEFAULT); 
	update_option("UPCP_List_View_Item_Max_Height", LIST_VIEW_ITEM_MAX_HEIGHT_DEFAULT); 
	update_option("UPCP_List_View_Item_Color", LIST_VIEW_ITEM_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Title_Font_Size", LIST_VIEW_TITLE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_List_View_Title_Color", LIST_VIEW_TITLE_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Title_Font", LIST_VIEW_TITLE_FONT_DEFAULT); 
	update_option("UPCP_List_View_Price_Font_Size", LIST_VIEW_PRICE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_List_View_Price_Color", LIST_VIEW_PRICE_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Price_Font", LIST_VIEW_PRICE_FONT_DEFAULT); 
	update_option("UPCP_List_View_Background_Color", LIST_VIEW_BACKGROUND_COLOR_DEFAULT); 
	update_option("UPCP_List_View_Details_Arrow", LIST_VIEW_DETAILS_ARROW_DEFAULT); 
	update_option("UPCP_List_View_Custom_Details_Arrow", LIST_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT); 
	

	/* Detail View Options */
	update_option("UPCP_Detail_View_Image_Hover_Fade", DETAIL_VIEW_IMAGE_HOVER_FADE_DEFAULT); 
	update_option("UPCP_Detail_View_Mouseover_Zoom", DETAIL_VIEW_MOUSEOVER_ZOOM_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Height", DETAIL_VIEW_IMAGE_HEIGHT_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Width", DETAIL_VIEW_IMAGE_WIDTH_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Holder_Height", DETAIL_VIEW_IMAGE_HOLDER_HEIGHT_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Holder_Width", DETAIL_VIEW_IMAGE_HOLDER_WIDTH_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Border", DETAIL_VIEW_IMAGE_BORDER_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Border_Color", DETAIL_VIEW_IMAGE_BORDER_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Image_Background_Color", DETAIL_VIEW_IMAGE_BACKGROUND_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Box_Width", DETAIL_VIEW_BOX_WIDTH_DEFAULT); 
	update_option("UPCP_Detail_View_Box_Min_Height", DETAIL_VIEW_BOX_MIN_HEIGHT_DEFAULT); 
	update_option("UPCP_Detail_View_Box_Padding", DETAIL_VIEW_BOX_PADDING_DEFAULT); 
	update_option("UPCP_Detail_View_Box_Margin", DETAIL_VIEW_BOX_MARGIN_DEFAULT); 
	update_option("UPCP_Detail_View_Box_Border", DETAIL_VIEW_BOX_BORDER_DEFAULT); 
	update_option("UPCP_Detail_View_Border_Color", DETAIL_VIEW_BORDER_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Title_Font_Size", DETAIL_VIEW_TITLE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_Detail_View_Title_Color", DETAIL_VIEW_TITLE_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Title_Font", DETAIL_VIEW_TITLE_FONT_DEFAULT); 
	update_option("UPCP_Detail_View_Price_Font_Size", DETAIL_VIEW_PRICE_FONT_SIZE_DEFAULT); 
	update_option("UPCP_Detail_View_Price_Color", DETAIL_VIEW_PRICE_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Price_Font", DETAIL_VIEW_PRICE_FONT_DEFAULT); 
	update_option("UPCP_Detail_View_Background_Color", DETAIL_VIEW_BACKGROUND_COLOR_DEFAULT); 
	update_option("UPCP_Detail_View_Separator_Line", DETAIL_VIEW_SEPARATOR_LINE_DEFAULT); 
	update_option("UPCP_Detail_View_Details_Arrow", DETAIL_VIEW_DETAILS_ARROW_DEFAULT); 
	update_option("UPCP_Detail_View_Custom_Details_Arrow", DETAIL_VIEW_CUSTOM_DETAILS_ARROW_DEFAULT); 
	
	update_option("UPCP_Sidebar_Header_Font", UPCP_SIDEBAR_HEADER_FONT); 
	update_option("UPCP_Sidebar_Header_Font_Size", UPCP_SIDEBAR_HEADER_FONT_SIZE); 
	update_option("UPCP_Sidebar_Header_Font_Weight", UPCP_SIDEBAR_HEADER_FONT_WEIGHT); 
	update_option("UPCP_Sidebar_Header_Color", UPCP_SIDEBAR_HEADER_COLOR); 
	update_option("UPCP_Sidebar_Subheader_Font", UPCP_SIDEBAR_SUBHEADER_FONT); 
	update_option("UPCP_Sidebar_Subheader_Font_Size", UPCP_SIDEBAR_SUBHEADER_FONT_SIZE); 
	update_option("UPCP_Sidebar_Subheader_Font_Weight", UPCP_SIDEBAR_SUBHEADER_FONT_WEIGHT); 
	update_option("UPCP_Sidebar_Subheader_Color", UPCP_SIDEBAR_SUBHEADER_COLOR); 
	update_option("UPCP_Sidebar_Checkbox_Font", UPCP_SIDEBAR_CHECKBOX_FONT); 
	update_option("UPCP_Sidebar_Checkbox_Font_Size", UPCP_SIDEBAR_CHECKBOX_FONT_SIZE); 
	update_option("UPCP_Sidebar_Checkbox_Font_Weight", UPCP_SIDEBAR_CHECKBOX_FONT_WEIGHT); 
	update_option("UPCP_Sidebar_Checkbox_Color", UPCP_SIDEBAR_CHECKBOX_COLOR); 

	$update = __("Styles have been succesfully reset.", 'UPCP');
	return $update;
}

function UPCP_Add_Modified_Styles() {
	
	$StylesString = "<style>";
	/* Thumbnail View Options */
	/*if (get_option("UPCP_Thumbnail_View_Image_Hover_Fade") != THUMBNAIL_VIEW_IMAGE_HOVER_FADE) {$StylesString .= get_option("UPCP_Thumbnail_View_Image_Hover_Fade");} */
	/*if (get_option("UPCP_Thumbnail_View_Mouseover_Zoom") != THUMBNAIL_VIEW_MOUSEOVER_ZOOM) {$StylesString .= get_option("UPCP_Thumbnail_View_Mouseover_Zoom");} */
	$StylesString .="div.upcp-thumb-image-div img { ";
		if (get_option("UPCP_Thumbnail_View_Image_Height") != (THUMBNAIL_VIEW_IMAGE_HEIGHT) &&  get_option("UPCP_Thumbnail_View_Image_Height") != "") 
				{$StylesString .= "max-height:" .  get_option("UPCP_Thumbnail_View_Image_Height") . "px ; ";} 
		if (get_option("UPCP_Thumbnail_View_Image_Width") != THUMBNAIL_VIEW_IMAGE_WIDTH &&  get_option("UPCP_Thumbnail_View_Image_Width") != "") 
				{$StylesString .= "max-width:" . get_option("UPCP_Thumbnail_View_Image_Width") . "px ; ";} 
		if (get_option("UPCP_Thumbnail_View_Image_Border") != THUMBNAIL_VIEW_IMAGE_BORDER &&  get_option("UPCP_Thumbnail_View_Image_Border") != "") 
				{$StylesString .="border: " . get_option("UPCP_Thumbnail_View_Image_Border"). "; ";} 
		if (get_option("Thumbnail_View_Image_Border_Color") != THUMBNAIL_VIEW_IMAGE_BORDER_COLOR &&  get_option("Thumbnail_View_Image_Border_Color") != "") 
				{$StylesString .="border-color:" . get_option("Thumbnail_View_Image_Border_Color") . ";";} 
		$StylesString .="}\n";

	$StylesString .= ".upcp-thumb-image-div { ";
		if (get_option("UPCP_Thumbnail_View_Image_Holder_Height") != THUMBNAIL_VIEW_IMAGE_HOLDER_HEIGHT &&  get_option("UPCP_Thumbnail_View_Image_Holder_Height") != "") 
				{$StylesString .= "height:" . get_option("UPCP_Thumbnail_View_Image_Holder_Height") . "px ;";} 
		if (get_option("UPCP_Thumbnail_View_Image_Holder_Width") != THUMBNAIL_VIEW_IMAGE_HOLDER_WIDTH &&  get_option("UPCP_Thumbnail_View_Image_Holder_Width") != "")
				{$StylesString .= "width:" . get_option("UPCP_Thumbnail_View_Image_Holder_Width") . "px ";} 
		$StylesString .="}\n";
	$StylesString .= ".upcp-thumb-image-div a { ";
		if (get_option("UPCP_Thumbnail_View_Image_Holder_Height") != THUMBNAIL_VIEW_IMAGE_HOLDER_HEIGHT &&  get_option("UPCP_Thumbnail_View_Image_Holder_Height") != "") 
				{$StylesString .= "height:" . get_option("UPCP_Thumbnail_View_Image_Holder_Height") . "px !important;";} 
		// if (get_option("UPCP_Thumbnail_View_Image_Holder_Width") != THUMBNAIL_VIEW_IMAGE_HOLDER_WIDTH &&  get_option("UPCP_Thumbnail_View_Image_Holder_Width") != "") {$StylesString .= "width:" . get_option("UPCP_Thumbnail_View_Image_Holder_Width") . ";";} 
		$StylesString .="}\n";

	$StylesString .= ".upcp-thumb-item {";
		if (get_option("UPCP_Thumbnail_View_Box_Width") != THUMBNAIL_VIEW_BOX_WIDTH &&  get_option("UPCP_Thumbnail_View_Box_Width") != "")
			 {$StylesString .= "width:" . get_option("UPCP_Thumbnail_View_Box_Width") . "px;";} 
		if (get_option("UPCP_Thumbnail_View_Box_Min_Height") != THUMBNAIL_VIEW_BOX_MIN_HEIGHT &&  get_option("UPCP_Thumbnail_View_Box_Min_Height") != "") 
			{$StylesString .= "min-height:" . get_option("UPCP_Thumbnail_View_Box_Min_Height") . "px;";} 
		if (get_option("UPCP_Thumbnail_View_Box_Max_Height") != THUMBNAIL_VIEW_BOX_MAX_HEIGHT &&  get_option("UPCP_Thumbnail_View_Box_Max_Height") != "")
		 	{$StylesString .= "max-height:" . get_option("UPCP_Thumbnail_View_Box_Max_Height") . "px;";} 
		if (get_option("UPCP_Thumbnail_View_Box_Padding") != THUMBNAIL_VIEW_BOX_PADDING &&  get_option("UPCP_Thumbnail_View_Box_Padding") != "") 
			{$StylesString .= "padding:" . str_replace(" ", "px ", get_option("UPCP_Thumbnail_View_Box_Padding")) . "px;";} 
		if (get_option("UPCP_Thumbnail_View_Box_Margin") != THUMBNAIL_VIEW_BOX_MARGIN &&  get_option("UPCP_Thumbnail_View_Box_Margin") != "")
			 {$StylesString .= "margin:" . str_replace(" ", "px ", get_option("UPCP_Thumbnail_View_Box_Margin")) . "px;";} 
		// if (get_option("UPCP_Thumbnail_View_Box_Border") != THUMBNAIL_VIEW_BOX_BORDER) {$StylesString .= get_option("UPCP_Thumbnail_View_Box_Border") . ";";} 
		if (get_option("UPCP_Thumbnail_View_Border_Color") != THUMBNAIL_VIEW_BORDER_COLOR &&  get_option("UPCP_Thumbnail_View_Box_Border") != "")
			 {$StylesString .= "border-color:" . get_option("UPCP_Thumbnail_View_Border_Color") . ";";} 
		if (get_option("UPCP_Thumbnail_View_Background_Color") != THUMBNAIL_VIEW_BACKGROUND_COLOR &&  get_option("UPCP_Thumbnail_View_Border_Color") != "")
			 {$StylesString .= "background-color:" . get_option("UPCP_Thumbnail_View_Background_Color") . ";";} 
		// if (get_option("UPCP_Thumbnail_View_Separator_Line") != THUMBNAIL_VIEW_SEPARATOR_LINE &&  get_option("UPCP_Thumbnail_View_Background_Color") != "") {$StylesString .= get_option("UPCP_Thumbnail_View_Separator_Line") . ";";} 
		$StylesString .="}\n";
	$StylesString .= ".upcp-thumb-title a {";
		if (get_option("UPCP_Thumbnail_View_Title_Font_Size") != THUMBNAIL_VIEW_TITLE_FONT_SIZE &&  get_option("UPCP_Thumbnail_View_Title_Font_Size") != "")
			{$StylesString .="font-size:" . get_option("UPCP_Thumbnail_View_Title_Font_Size") . "px !important;";} 
		if (get_option("UPCP_Thumbnail_View_Title_Font") != THUMBNAIL_VIEW_TITLE_FONT &&  get_option("UPCP_Thumbnail_View_Title_Font") != "")
			{$StylesString .="font-family:" . get_option("UPCP_Thumbnail_View_Title_Font") . " !important;";} 
		if (get_option("UPCP_Thumbnail_View_Title_Color") != THUMBNAIL_VIEW_TITLE_COLOR &&  get_option("UPCP_Thumbnail_View_Title_Color") != "")
			{$StylesString .= "color:" . get_option("UPCP_Thumbnail_View_Title_Color") . " !important;";} 
		$StylesString .="}\n";
	$StylesString .= ".upcp-thumb-price {";
		if (get_option("UPCP_Thumbnail_View_Price_Font") != THUMBNAIL_VIEW_PRICE_FONT &&  get_option("UPCP_Thumbnail_View_Price_Font") != "")
			{$StylesString .="font-family:" .  get_option("UPCP_Thumbnail_View_Price_Font") . ";";} 
		if (get_option("UPCP_Thumbnail_View_Price_Font_Size") != THUMBNAIL_VIEW_PRICE_FONT_SIZE &&  get_option("UPCP_Thumbnail_View_Price_Font_Size") != "")
			{$StylesString .="font-size:" . get_option("UPCP_Thumbnail_View_Price_Font_Size") . "px;";} 
		if (get_option("UPCP_Thumbnail_View_Price_Color") != THUMBNAIL_VIEW_PRICE_COLOR &&  get_option("UPCP_Thumbnail_View_Price_Color") != "")
			{$StylesString .= "color:" . get_option("UPCP_Thumbnail_View_Price_Color") . ";";} 
		$StylesString .="}\n";
	$StylesString .= ".upcp-thumb-details-link {";
		// if (get_option("UPCP_Thumbnail_View_Details_Arrow") != THUMBNAIL_VIEW_DETAILS_ARROW) {$StylesString .= get_option("UPCP_Thumbnail_View_Details_Arrow") . ";";}  
		// if (get_option("UPCP_Thumbnail_View_Custom_Details_Arrow") != THUMBNAIL_VIEW_CUSTOM_DETAILS_ARROW) {$StylesString .= get_option("UPCP_Thumbnail_View_Custom_Details_Arrow") . ";";}  
		$StylesString .="}\n";
	
	/* List View Options */
	$StylesString .=".upcp-list-image-div img { ";
		if (get_option("UPCP_List_View_Image_Height") != LIST_VIEW_IMAGE_HEIGHT &&  get_option("UPCP_List_View_Image_Height") != "") {$StylesString .="height:" . get_option("UPCP_List_View_Image_Height") . "px;";}  
		if (get_option("UPCP_List_View_Image_Width") != LIST_VIEW_IMAGE_WIDTH &&  get_option("UPCP_List_View_Image_Width") != "") {$StylesString .="width:" . get_option("UPCP_List_View_Image_Width") . "px;";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-list-image-div { ";
		if (get_option("UPCP_List_View_Image_Holder_Height") != LIST_VIEW_IMAGE_HOLDER_HEIGHT &&  get_option("UPCP_List_View_Image_Holder_Height") != "") {$StylesString .= "height:" . get_option("UPCP_List_View_Image_Holder_Height") . "px ;";}  
		// if (get_option("UPCP_List_View_Image_Border") != LIST_VIEW_IMAGE_BORDER &&  get_option("UPCP_List_View_Image_Border") != "") {$StylesString .= get_option("UPCP_List_View_Image_Border") . ";";}  
		if (get_option("UPCP_List_View_Image_Border_Color") != LIST_VIEW_IMAGE_BORDER_COLOR &&  get_option("UPCP_List_View_Image_Border_Color") != "") {$StylesString .= "border-color:" . get_option("UPCP_List_View_Image_Border_Color") . ";";}  
		if (get_option("UPCP_List_View_Image_Background_Color") != LIST_VIEW_IMAGE_BACKGROUND_COLOR &&  get_option("UPCP_List_View_Image_Background_Color") != "") {$StylesString .="background-color:" . get_option("UPCP_List_View_Image_Background_Color") . ";";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-list-item { ";
		if (get_option("UPCP_List_View_Item_Margin_Left") != LIST_VIEW_ITEM_MARGIN_LEFT &&  get_option("UPCP_List_View_Item_Margin_Left") != "") {$StylesString .="margin-left:" . get_option("UPCP_List_View_Item_Margin_Left") . "px;";}  
		if (get_option("UPCP_List_View_Item_Margin_Top") != LIST_VIEW_ITEM_MARGIN_TOP &&  get_option("UPCP_List_View_Item_Margin_Top") != "") {$StylesString .="margin-top:" . get_option("UPCP_List_View_Item_Margin_Top") . "px;";}  
		if (get_option("UPCP_List_View_Item_Padding") != LIST_VIEW_ITEM_PADDING &&  get_option("UPCP_List_View_Item_Padding") != "") {$StylesString .="padding:" . str_replace(" ", "px ", get_option("UPCP_List_View_Item_Padding")) . "px;";}  
		if (get_option("UPCP_List_View_Item_Color") != LIST_VIEW_ITEM_COLOR &&  get_option("UPCP_List_View_Item_Color") != "") {$StylesString .="background-color:" . get_option("UPCP_List_View_Item_Color") . ";";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-list-details {";
		if (get_option("UPCP_List_View_Item_Min_Height") != LIST_VIEW_ITEM_MIN_HEIGHT &&  get_option("UPCP_List_View_Item_Min_Height") != "") {$StylesString .="min-height:" . get_option("UPCP_List_View_Item_Min_Height") . "px;";}  
		if (get_option("UPCP_List_View_Item_Max_Height") != LIST_VIEW_ITEM_MAX_HEIGHT &&  get_option("UPCP_List_View_Item_Max_Height") != "") {$StylesString .="max-height:" . get_option("UPCP_List_View_Item_Max_Height") . "px;";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-list-title {";
		if (get_option("UPCP_List_View_Title_Font_Size") != LIST_VIEW_TITLE_FONT_SIZE &&  get_option("UPCP_List_View_Title_Font_Size") != "") {$StylesString .="font-size:" . get_option("UPCP_List_View_Title_Font_Size") . "px;";}  
		if (get_option("UPCP_List_View_Title_Color") != LIST_VIEW_TITLE_COLOR &&  get_option("UPCP_List_View_Title_Color") != "") {$StylesString .= "color:" . get_option("UPCP_List_View_Title_Color") . ";";}  
		if (get_option("UPCP_List_View_Title_Font") != LIST_VIEW_TITLE_FONT &&  get_option("UPCP_List_View_Title_Font") != "") {$StylesString .= "font-family:" . get_option("UPCP_List_View_Title_Font") . ";";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-list-price {";
		if (get_option("UPCP_List_View_Price_Font_Size") != LIST_VIEW_PRICE_FONT_SIZE &&  get_option("UPCP_List_View_Price_Font_Size") != "") {$StylesString .= "font-size:" . get_option("UPCP_List_View_Price_Font_Size") . "px;";}  
		if (get_option("UPCP_List_View_Price_Color") != LIST_VIEW_PRICE_COLOR &&  get_option("UPCP_List_View_Price_Color") != "") {$StylesString .= "color:" . get_option("UPCP_List_View_Price_Color") . ";";}  
		if (get_option("UPCP_List_View_Price_Font") != LIST_VIEW_PRICE_FONT &&  get_option("UPCP_List_View_Price_Font") != "") {$StylesString .= "font-family:" . get_option("UPCP_List_View_Price_Font") . ";";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-list-details-link {";
		// if (get_option("UPCP_List_View_Details_Arrow") != LIST_VIEW_DETAILS_ARROW &&  get_option("UPCP_List_View_Details_Arrow") != "") {$StylesString .= get_option("UPCP_List_View_Details_Arrow") . ";";}  
		// if (get_option("UPCP_List_View_Custom_Details_Arrow") != LIST_VIEW_CUSTOM_DETAILS_ARROW &&  get_option("UPCP_List_View_Custom_Details_Arrow") != "") {$StylesString .= get_option("UPCP_List_View_Custom_Details_Arrow") . ";";}  
		$StylesString .="}\n";
	// if (get_option("UPCP_List_View_Background_Color") != LIST_VIEW_BACKGROUND_COLOR &&  get_option("UPCP_List_View_Background_Color") != "") {$StylesString .= get_option("UPCP_List_View_Background_Color") . ";";}  
	// if (get_option("UPCP_List_View_Image_Hover_Fade") != LIST_VIEW_IMAGE_HOVER_FADE &&  get_option("UPCP_List_View_Image_Hover_Fade") != "") {$StylesString .= get_option("UPCP_List_View_Image_Hover_Fade") . ";";}  
	// if (get_option("UPCP_List_View_Mouseover_Zoom") != LIST_VIEW_MOUSEOVER_ZOOM &&  get_option("UPCP_List_View_Mouseover_Zoom") != "") {$StylesString .= get_option("UPCP_List_View_Mouseover_Zoom") . ";";}  
	
	/* Detail View Options */
	$StylesString .="div.upcp-detail-image-div img { ";
		if (get_option("UPCP_Detail_View_Image_Height") != DETAIL_VIEW_IMAGE_HEIGHT &&  get_option("UPCP_Detail_View_Image_Height") != "") {$StylesString .="height:" . get_option("UPCP_Detail_View_Image_Height") . "px;";}  
		if (get_option("UPCP_Detail_View_Image_Width") != DETAIL_VIEW_IMAGE_WIDTH &&  get_option("UPCP_Detail_View_Image_Width") != "") {$StylesString .= "width:" . get_option("UPCP_Detail_View_Image_Width") . "px;";}  
		$StylesString .="}\n";
	$StylesString .="div.upcp-detail-image-div { ";
		if (get_option("UPCP_Detail_View_Image_Holder_Height") != DETAIL_VIEW_IMAGE_HOLDER_HEIGHT &&  get_option("UPCP_Detail_View_Image_Holder_Height") != "") {$StylesString .= "height:" . get_option("UPCP_Detail_View_Image_Holder_Height") . "px;";}  
		if (get_option("UPCP_Detail_View_Image_Holder_Width") != DETAIL_VIEW_IMAGE_HOLDER_WIDTH &&  get_option("UPCP_Detail_View_Image_Holder_Width") != "") {$StylesString .= "width:" . get_option("UPCP_Detail_View_Image_Holder_Width") . "px ;";}  
		// if (get_option("UPCP_Detail_View_Image_Border") != DETAIL_VIEW_IMAGE_BORDER &&  get_option("UPCP_Detail_View_Image_Border") != "") {$StylesString .= get_option("UPCP_Detail_View_Image_Border") . ";";}  
		if (get_option("UPCP_Detail_View_Image_Border_Color") != DETAIL_VIEW_IMAGE_BORDER_COLOR &&  get_option("UPCP_Detail_View_Image_Border_Color") != "") {$StylesString .= "border-color:" . get_option("UPCP_Detail_View_Image_Border_Color") . ";";}  
		if (get_option("UPCP_Detail_View_Image_Background_Color") != DETAIL_VIEW_IMAGE_BACKGROUND_COLOR &&  get_option("UPCP_Detail_View_Image_Background_Color") != "") {$StylesString .= "background-color:" . get_option("UPCP_Detail_View_Image_Background_Color") . ";";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-detail-item { ";
		// if (get_option("UPCP_Detail_View_Box_Width") != DETAIL_VIEW_BOX_WIDTH &&  get_option("UPCP_Detail_View_Box_Width") != "") {$StylesString .= get_option("UPCP_Detail_View_Box_Width") . "px;";}  
		if (get_option("UPCP_Detail_View_Box_Padding") != DETAIL_VIEW_BOX_PADDING &&  get_option("UPCP_Detail_View_Box_Padding") != "") {$StylesString .= "padding:" . str_replace(" ", "px ", get_option("UPCP_Detail_View_Box_Padding")) . "px;";}  
		if (get_option("UPCP_Detail_View_Box_Margin") != DETAIL_VIEW_BOX_MARGIN &&  get_option("UPCP_Detail_View_Box_Margin") != "") {$StylesString .= "margin:" . str_replace(" ", "px ", get_option("UPCP_Detail_View_Box_Margin")) . "px;";}  
		// if (get_option("UPCP_Detail_View_Box_Border") != DETAIL_VIEW_BOX_BORDER &&  get_option("UPCP_Detail_View_Box_Border") != "") {$StylesString .= get_option("UPCP_Detail_View_Box_Border") . ";";}  
		if (get_option("UPCP_Detail_View_Border_Color") != DETAIL_VIEW_BORDER_COLOR &&  get_option("UPCP_Detail_View_Border_Color") != "") {$StylesString .= "border-color:" . get_option("UPCP_Detail_View_Border_Color") . ";";}  
		if (get_option("UPCP_Detail_View_Background_Color") != DETAIL_VIEW_BACKGROUND_COLOR &&  get_option("UPCP_Detail_View_Background_Color") != "") {$StylesString .= "background-color:" . get_option("UPCP_Detail_View_Background_Color") . ";";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-detail-title { ";
		if (get_option("UPCP_Detail_View_Title_Font_Size") != DETAIL_VIEW_TITLE_FONT_SIZE &&  get_option("UPCP_Detail_View_Title_Font_Size") != "") {$StylesString .= "font-size:" . get_option("UPCP_Detail_View_Title_Font_Size") . "px;";}  
		if (get_option("UPCP_Detail_View_Title_Color") != DETAIL_VIEW_TITLE_COLOR &&  get_option("UPCP_Detail_View_Title_Color") != "") {$StylesString .= "color:" . get_option("UPCP_Detail_View_Title_Color") . ";";}  
		if (get_option("UPCP_Detail_View_Title_Font") != DETAIL_VIEW_TITLE_FONT &&  get_option("UPCP_Detail_View_Title_Font") != "") {$StylesString .= "font-family:" . get_option("UPCP_Detail_View_Title_Font") . ";";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-detail-price {";
		if (get_option("UPCP_Detail_View_Price_Font_Size") != DETAIL_VIEW_PRICE_FONT_SIZE &&  get_option("UPCP_Detail_View_Price_Font_Size") != "") {$StylesString .= "font-size:" . get_option("UPCP_Detail_View_Price_Font_Size") . "px;";}  
		if (get_option("UPCP_Detail_View_Price_Color") != DETAIL_VIEW_PRICE_COLOR &&  get_option("UPCP_Detail_View_Price_Color") != "") {$StylesString .= "color:" . get_option("UPCP_Detail_View_Price_Color") . ";";}  
		if (get_option("UPCP_Detail_View_Price_Font") != DETAIL_VIEW_PRICE_FONT &&  get_option("UPCP_Detail_View_Price_Font") != "") {$StylesString .= "font-family:" . get_option("UPCP_Detail_View_Price_Font") . ";";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-detail-details-link { ";
		// if (get_option("UPCP_Detail_View_Details_Arrow") != DETAIL_VIEW_DETAILS_ARROW &&  get_option("UPCP_Detail_View_Details_Arrow") != "") {$StylesString .= get_option("UPCP_Detail_View_Details_Arrow") . ";";}  
		// if (get_option("UPCP_Detail_View_Custom_Details_Arrow") != DETAIL_VIEW_CUSTOM_DETAILS_ARROW &&  get_option("UPCP_Detail_View_Custom_Details_Arrow") != "") {$StylesString .= get_option("UPCP_Detail_View_Custom_Details_Arrow") . ";";}  
		$StylesString .="}\n";
	$StylesString .=".upcp-mid-detail-div { ";
		// if (get_option("UPCP_Detail_View_Separator_Line") != DETAIL_VIEW_SEPARATOR_LINE &&  get_option("UPCP_Detail_View_Separator_Line") != "") {$StylesString .= get_option("UPCP_Detail_View_Separator_Line") . ";";}  
		$StylesString .="}\n";
		// if (get_option("UPCP_Detail_View_Image_Hover_Fade") != DETAIL_VIEW_IMAGE_HOVER_FADE &&  get_option("UPCP_Detail_View_Image_Hover_Fade") != "") {$StylesString .= get_option("UPCP_Detail_View_Image_Hover_Fade") . ";";}  
		// if (get_option("UPCP_Detail_View_Mouseover_Zoom") != DETAIL_VIEW_MOUSEOVER_ZOOM &&  get_option("UPCP_Detail_View_Mouseover_Zoom") != "") {$StylesString .= get_option("UPCP_Detail_View_Mouseover_Zoom") . ";";}  
		// if (get_option("UPCP_Detail_View_Zoom_On_Image_Hover") != DETAIL_VIEW_ZOOM_ON_IMAGE_HOVER &&  get_option("UPCP_Detail_View_Zoom_On_Image_Hover") != "") {$StylesString .= get_option("UPCP_Detail_View_Zoom_On_Image_Hover") . ";";}  
	
	/* Sidebar View Options */
	$StylesString .=".prod-cat-sidebar-cat-title h3 { ";
		if (get_option("UPCP_Sidebar_Header_Font") != UPCP_SIDEBAR_HEADER_FONT &&  get_option("UPCP_Sidebar_Header_Font") != "") {$StylesString .= "font-family:" . get_option("UPCP_Sidebar_Header_Font") . ";";}  
		if (get_option("UPCP_Sidebar_Header_Font_Size") != UPCP_SIDEBAR_HEADER_FONT_SIZE &&  get_option("UPCP_Sidebar_Header_Font_Size") != "") {$StylesString .= "font-size:" . get_option("UPCP_Sidebar_Header_Font_Size") . "px;";}  
		if (get_option("UPCP_Sidebar_Header_Font_Weight") != UPCP_SIDEBAR_HEADER_FONT_WEIGHT &&  get_option("UPCP_Sidebar_Header_Font_Weight") != "") {$StylesString .= "font-weight:" . get_option("UPCP_Sidebar_Header_Font_Weight") . ";";}  
		if (get_option("UPCP_Sidebar_Header_Color") != UPCP_SIDEBAR_HEADER_COLOR &&  get_option("UPCP_Sidebar_Header_Color") != "") {$StylesString .= "color:" . get_option("UPCP_Sidebar_Header_Color") . ";";}  
$StylesString .="}\n";
	$StylesString .=".prod-cat-sort-by, .prod-cat-text-search, .prod-cat-sidebar-cat-title span { ";
		if (get_option("UPCP_Sidebar_Subheader_Font") != UPCP_SIDEBAR_SUBHEADER_FONT &&  get_option("UPCP_Sidebar_Subheader_Font") != "") {$StylesString .= "font-family:" . get_option("UPCP_Sidebar_Subheader_Font") . ";";}  
		if (get_option("UPCP_Sidebar_Subheader_Font_Size") != UPCP_SIDEBAR_SUBHEADER_FONT_SIZE &&  get_option("UPCP_Sidebar_Subheader_Font_Size") != "") {$StylesString .= "font-size:" . get_option("UPCP_Sidebar_Subheader_Font_Size") . "px;";}  
		if (get_option("UPCP_Sidebar_Subheader_Font_Weight") != UPCP_SIDEBAR_SUBHEADER_FONT_WEIGHT &&  get_option("UPCP_Sidebar_Subheader_Font_Weight") != "") {$StylesString .= "font-weight:" . get_option("UPCP_Sidebar_Subheader_Font_Weight") . ";";}  
		if (get_option("UPCP_Sidebar_Subheader_Color") != UPCP_SIDEBAR_SUBHEADER_COLOR &&  get_option("UPCP_Sidebar_Subheader_Color") != "") {$StylesString .= "color:" . get_option("UPCP_Sidebar_Subheader_Color") . ";";}  
	$StylesString .="}\n";
	$StylesString .=".prod-cat-sidebar-content .upcp-label { ";
		if (get_option("UPCP_Sidebar_Checkbox_Font") != UPCP_SIDEBAR_CHECKBOX_FONT &&  get_option("UPCP_Sidebar_Checkbox_Font") != "") {$StylesString .= "font-family:" . get_option("UPCP_Sidebar_Checkbox_Font") . ";";}  
		if (get_option("UPCP_Sidebar_Checkbox_Font_Size") != UPCP_SIDEBAR_CHECKBOX_FONT_SIZE &&  get_option("UPCP_Sidebar_Checkbox_Font_Size") != "") {$StylesString .= "font-size:" . get_option("UPCP_Sidebar_Checkbox_Font_Size") . "px;";}  
		if (get_option("UPCP_Sidebar_Checkbox_Font_Weight") != UPCP_SIDEBAR_CHECKBOX_FONT_WEIGHT &&  get_option("UPCP_Sidebar_Checkbox_Font_Weight") != "") {$StylesString .= "font-weight:" . get_option("UPCP_Sidebar_Checkbox_Font_Weight") . ";";}  
		if (get_option("UPCP_Sidebar_Checkbox_Color") != UPCP_SIDEBAR_CHECKBOX_COLOR &&  get_option("UPCP_Sidebar_Checkbox_Color") != "") {$StylesString .= "color:" . get_option("UPCP_Sidebar_Checkbox_Color") . ";";}  
	$StylesString .="}\n";
		

	$StylesString .= "</style>";

	return $StylesString;
}