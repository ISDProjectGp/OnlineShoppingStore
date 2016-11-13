<?php
/* Add any update or error notices to the top of the admin page */
function UPCP_Error_Notices(){
    global $upcp_message;
		if (isset($upcp_message)) {
			if (isset($upcp_message['Message_Type']) and $upcp_message['Message_Type'] == "Update") {echo "<div class='updated'><p>" . $upcp_message['Message'] . "</p></div>";}
			if (isset($upcp_message['Message_Type']) and $upcp_message['Message_Type'] == "Error") {echo "<div class='error'><p>" . $upcp_message['Message'] . "</p></div>";}
		}
}

?>