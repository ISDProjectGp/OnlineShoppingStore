<?php
function UPCP_Export_To_Excel() {
	global $wpdb;
	global $categories_table_name, $subcategories_table_name, $items_table_name, $tagged_items_table_name, $tags_table_name, $fields_table_name, $fields_meta_table_name, $item_images_table_name;
		
	include_once('../wp-content/plugins/ultimate-product-catalogue/PHPExcel/Classes/PHPExcel.php');

	$FileType = $_GET['FileType'];
		
	// Instantiate a new PHPExcel object 
	$objPHPExcel = new PHPExcel();  
	// Set the active Excel worksheet to sheet 0 
	$objPHPExcel->setActiveSheetIndex(0);  

	// Print out the regular order field labels
	$objPHPExcel->getActiveSheet()->setCellValue("A1", "Name");
	$objPHPExcel->getActiveSheet()->setCellValue("B1", "Slug");
	$objPHPExcel->getActiveSheet()->setCellValue("C1", "Description");
	$objPHPExcel->getActiveSheet()->setCellValue("D1", "Price");
	$objPHPExcel->getActiveSheet()->setCellValue("E1", "Image");
	$objPHPExcel->getActiveSheet()->setCellValue("F1", "Link");
	$objPHPExcel->getActiveSheet()->setCellValue("G1", "Category");
	$objPHPExcel->getActiveSheet()->setCellValue("H1", "Sub-Category");
	$objPHPExcel->getActiveSheet()->setCellValue("I1", "Tags");

	//start of printing column names as names of custom fields  
	$column = 'J';
	$Sql = "SELECT * FROM $fields_table_name WHERE Field_Type !='file'";
	$Custom_Fields = $wpdb->get_results($Sql);
	foreach ($Custom_Fields as $Custom_Field) {
    	$objPHPExcel->getActiveSheet()->setCellValue($column."1", $Custom_Field->Field_Name);
   		$column++;
	}

	$Number_Names = array("One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten");
	foreach ($Number_Names as $Number) {
		$objPHPExcel->getActiveSheet()->setCellValue($column."1", "Additional Image " . $Number);
   		$column++;
	} 

	//start while loop to get data  
	$rowCount = 2;  
	$Products = $wpdb->get_results("SELECT * FROM $items_table_name");
	foreach ($Products as $Product)  
	{  
    	$objPHPExcel->getActiveSheet()->setCellValue("A" . $rowCount, $Product->Item_Name);
		$objPHPExcel->getActiveSheet()->setCellValue("B" . $rowCount, $Product->Item_Slug);
		$objPHPExcel->getActiveSheet()->setCellValue("C" . $rowCount, $Product->Item_Description);
		$objPHPExcel->getActiveSheet()->setCellValue("D" . $rowCount, $Product->Item_Price);
		$objPHPExcel->getActiveSheet()->setCellValue("E" . $rowCount, $Product->Item_Photo_URL);
		$objPHPExcel->getActiveSheet()->setCellValue("F" . $rowCount, $Product->Item_Link);
		$objPHPExcel->getActiveSheet()->setCellValue("G" . $rowCount, $Product->Category_Name);
		$objPHPExcel->getActiveSheet()->setCellValue("H" . $rowCount, $Product->SubCategory_Name);
		
		$Tagged_Items = $wpdb->get_results($wpdb->prepare("SELECT Tag_ID FROM $tagged_items_table_name WHERE Item_ID=%d", $Product->Item_ID));
		foreach ($Tagged_Items as $Tag_Item) {
			$TagName = $wpdb->get_var("SELECT Tag_Name FROM $tags_table_name WHERE Tag_ID='" . $Tag_Item->Tag_ID . "'");
			$TagString .= $TagName . ",";
		}
		if (strlen($TagString) > 0) {$TagString = substr($TagString, 0, strlen($TagString)-1);}
		$objPHPExcel->getActiveSheet()->setCellValue("I" . $rowCount, $TagString);
				
		$column = 'J';
    	foreach ($Custom_Fields as $Custom_Field) {  
        	$MetaValue = $wpdb->get_var($wpdb->prepare("SELECT Meta_Value FROM $fields_meta_table_name WHERE Item_ID=%d AND Field_ID=%d", $Product->Item_ID, $Custom_Field->Field_ID));

        	$objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $MetaValue);
        	$column++;
    	}  

    	$Image_Counter = 0;
    	$Addtl_Images = $wpdb->get_results($wpdb->prepare("SELECT * FROM $item_images_table_name WHERE Item_ID=%d", $Product->Item_ID));
    	foreach ($Addtl_Images as $Addtl_Image) {
    		if ($Image_Counter >= 10) {break;}

    		$objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $Addtl_Image->Item_Image_URL);

    		$Image_Counter++;
    		$column++;
    	}
    	$rowCount++;
    	unset($TagString);
	} 


	// Redirect output to a client’s web browser (Excel5) 
	if ($FileType == "CSV") {
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="Product_Export.csv"'); 
		header('Cache-Control: max-age=0'); 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
		$objWriter->save('php://output');
	}
	else {
		header('Content-Type: application/vnd.ms-excel'); 
		header('Content-Disposition: attachment;filename="Product_Export.xls"'); 
		header('Cache-Control: max-age=0'); 
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5'); 
		$objWriter->save('php://output');
	}

	// Turn on buffering so that the WordPress menus don't end up in the file (turned off in UPCP_Output_Options.php)
	ob_start();

}
?>