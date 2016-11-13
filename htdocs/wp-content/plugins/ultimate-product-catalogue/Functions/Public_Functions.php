<?php
if (!class_exists('UPCP_Product')){
    class UPCP_Product {
    	private $Item_Name;
		private $Item_ID;
				
		function __construct($params = array()) {
			global $wpdb, $items_table_name;

			if (isset($params['ID'])) {
				$this->Item_Name = $wpdb->get_var($wpdb->prepare("SELECT Item_Name FROM $items_table_name WHERE Item_ID=%d", $params['ID']));
				$this->Item_ID = $wpdb->get_var($wpdb->prepare("SELECT Item_ID FROM $items_table_name WHERE Item_ID=%d", $params['ID']));
			}
			elseif (isset($params['Name'])) {
				$this->Item_Name = $wpdb->get_var($wpdb->prepare("SELECT Item_Name FROM $items_table_name WHERE Item_Name=%s", $params['Name']));
				$this->Item_ID = $wpdb->get_var($wpdb->prepare("SELECT Item_ID FROM $items_table_name WHERE Item_Name=%s", $params['Name']));
			}
			elseif (get_query_var('single_product') != "" or $_GET['SingleProduct'] != "") {	
				if (get_query_var('single_product') != "") {$Item_ID = $wpdb->get_var($wpdb->prepare("SELECT Item_ID FROM $items_table_name WHERE Item_Slug=%s", trim(get_query_var('single_product'), "/? ")));}
				else {$Item_ID = $_GET['SingleProduct'];}
				$this->Item_ID = $Item_ID;
				$this->Item_Name = $wpdb->get_var($wpdb->prepare("SELECT User_ID FROM $items_table_name WHERE Item_ID=%d", $this->Item_ID));
			}
    	}
		
		function Get_Product_Name_For_ID($id = null) {
			global $wpdb, $items_table_name;

			if(!$id) {
				return null;
			}

			return $wpdb->get_var($wpdb->prepare("SELECT Item_Name FROM $items_table_name WHERE Item_ID=%d", $id));
		}

		function Get_Field_Value_For_ID($Field, $id) {
			global $wpdb, $items_table_name;

			if(!$Field || !$id) {
				return null;
			}
			$Values = $wpdb->get_row($wpdb->prepare("SELECT * FROM $items_table_name WHERE Item_ID=%d", $id));
			
			return $Values->$Field;
		}
				
		function Get_Item_ID() {
			return $this->Item_ID;
		}
				
		function Get_Product_Name() {
			return $this->Item_Name;
		}
				
		function Get_Field_Value($Field) {
			global $wpdb, $items_table_name;
						
			$Value = $wpdb->get_var($wpdb->prepare("SELECT $Field FROM $items_table_name WHERE Item_ID=%d", $this->Item_ID));
			
			return $Value;
		}

    	function Get_Custom_Feilds() {
    		global $wpdb, $fields_table_name, $fields_meta_table_name;
			
			$Fields = $wpdb->get_results("SELECT Field_Name, Field_ID FROM $fields_table_name");
			foreach ($Fields  as $Field) {
				$Values[$Field->Field_ID] = $wpdb->get_var($wpdb->prepare("SELECT Meta_Value FROM $fields_meta_table_name WHERE Field_ID=%d AND Item_ID=%d", $Field->Field_ID, $this->Item_ID));
			}
			return $Values;
    	}

    	function Get_Permalink($Link_Base) {
    		global $wpdb, $items_table_name;

    		$Pretty_Links = get_option("UPCP_Pretty_Links");

    		$Item_Link = $wpdb->get_var($wpdb->prepare("SELECT Item_Link FROM $items_table_name WHERE Item_ID=%d", $this->Item_ID));
    		$Item_Slug = $wpdb->get_var($wpdb->prepare("SELECT Item_Slug FROM $items_table_name WHERE Item_ID=%d", $this->Item_ID));

    		if ($Product->Item_Link != "") {$Return_Link = $Item_Link;}
			elseif ($Pretty_Links == "Yes") {$Return_Link = $Link_Base . "product/" . $Item_Slug . "/?" . $uri_parts[1];}
			elseif (strpos($Link_Base, "?") !== false) {$Return_Link = $Link_Base . "&SingleProduct=" . $this->Item_ID;}
			else {$Return_Link = $Link_Base . "?SingleProduct=" . $this->Item_ID;}

			return $Return_Link;
    	}
	}
}

function UPCP_Get_All_Products() {
	global $wpdb, $items_table_name;

	$WP_Product_Objects = $wpdb->get_results("SELECT Item_ID FROM $items_table_name");

	foreach ($WP_Product_Objects as $Product_Object) {
		$Product_Array[] = new UPCP_Product(array('ID' => $Product_Object->Item_ID));
	}

	return $Product_Array;
}
	
?>