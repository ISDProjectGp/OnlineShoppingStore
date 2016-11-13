<?php 
function Upgrade_To_Full() {
		global $message, $Full_Version;
		
		$Key = $_POST['Key'];
		$opts = array('http'=>array('method'=>"GET"));
		$context = stream_context_create($opts);
		$Response = unserialize(file_get_contents("http://www.etoilewebdesign.com/UPCP-Key-Check/KeyCheck.php?Key=" . $Key . "&Site=" . get_bloginfo('wpurl'), false, $context));
		//$Response = file_get_contents("http://www.etoilewebdesign.com/UPCP-Key-Check/KeyCheck.php?Key=" . $Key);
		
		if ($Response['Message_Type'] == "Error") {
			  $message = array("Message_Type" => "Error", "Message" => $Response['Message']);
		}
		else {
				$message = array("Message_Type" => "Update", "Message" => $Response['Message']);
				update_option("UPCP_Full_Version", "Yes");
				update_option("UPCP_Product_Page_Serialized", $Response['ProductPage']);
				$Full_Version = get_option("UPCP_Full_Version");
		}
}

 ?>
