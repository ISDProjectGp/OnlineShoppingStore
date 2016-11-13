<?php
function UPCP_Product_Inquiry_Form() {
	$plugin = "contact-form-7/wp-contact-form-7.php";
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$CF_7_Installed = is_plugin_active($plugin);

	if ($CF_7_Installed) {
		$Admin_Email = get_option('admin_email');
		$Blogname = get_option('blogname');
		$Site_URL = get_bloginfo('siteurl');

		$UPCP_Contact_Form = get_page_by_path('upcp-product-inquiry-form', OBJECT, 'wpcf7_contact_form');

		if ($UPCP_Contact_Form) {
			$user_update = array("Message_Type" => "Upcate", "Message" => "Inquiry form already exists.");
			return $user_update;
		}

		$post = array(
			'post_name' => 'upcp-product-inquiry-form',
			'post_title' => 'UPCP Inquiry Form',
			'post_type' => 'wpcf7_contact_form',
			'post_content' => 
'<p>Your Name (required)<br />
    [text* your-name] </p>
				
<p>Your Email (required)<br />
    [email* your-email] </p>

<p>Inquiry Product Name<br />
    [text product-name "%PRODUCT_NAME%"] </p>

<p>Your Message<br />
    [textarea your-message] </p>

<p>[submit "Send"]</p>
Product Inquiry E-mail
[your-name] <' . $Admin_Email . '>
From: [your-name] <[your-email]>
Interested Product: [product-name]

Message Body:
[your-message]

--
This e-mail was sent from a contact form on ' . $Blogname . ' (' . $Site_URL . ')
' . $Admin_Email . '
Reply-To: [your-email]

0
0

[your-subject]
' . $Blogname . ' <' . $Admin_Email . '>
Message Body:
[your-message]

--
This e-mail was sent from a contact form on ' . $Blogname . ' (' . $Site_URL . ')
[your-email]
Reply-To: ' . $Admin_Email . '

0
0
Your message was sent successfully. Thanks.
Failed to send your message. Please try later or contact the administrator by another method.
Validation errors occurred. Please confirm the fields and submit it again.
Failed to send your message. Please try later or contact the administrator by another method.
Please accept the terms to proceed.
Please fill in the required field.
This input is too long.
This input is too short.
			');
		
		$insert_result = wp_insert_post( $post);

		if ($insert_result != 0) {
				$mail_array = array(
				'subject' => 'Product Inquiry E-mail',
				'sender' => $Blogname . ' <' . $Admin_Email . '>',
				'body' => 'From: [your-name] <[your-email]>
Interested Product: [product-name]

Message Body:
[your-message]

--
This e-mail was sent from a contact form on ' . $Blogname . ' (' . $Site_URL . ')',
				'recipient' => $Admin_Email,
				'additional_headers' => 'Reply-To: [your-email]',
				'attachments' => '',
				'use_html' => 0,
				'exclude_blank' => 0
			);

			add_post_meta($insert_result, "_mail", $mail_array);
			add_post_meta($insert_result, "_form", 
'<p>Your Name (required)<br />
    [text* your-name] </p>
				
<p>Your Email (required)<br />
    [email* your-email] </p>

<p>Inquiry Product Name<br />
    [text product-name "%PRODUCT_NAME%"] </p>

<p>Your Message<br />
    [textarea your-message] </p>

<p>[submit "Send"]</p>
			');
			add_post_meta($insert_result, "_mail_2", $mail_array);
			add_post_meta($insert_result, "_messages", array(
				"mail_sent_ok",
				"Your message was sent successfully. Thanks.",
				"mail_sent_ng",
				"Failed to send your message. Please try later or contact the administrator by another method.",
				"validation_error",
				"Validation errors occurred. Please confirm the fields and submit it again.",
				"spam",
				"Failed to send your message. Please try later or contact the administrator by another method.",
				"accept_terms",
				"Please accept the terms to proceed.",
				"invalid_required",
				"Please fill in the required field.",
				"invalid_too_long",
				"This input is too long.",
				"invalid_too_short",
				"This input is too short."
				)
			);

			add_post_meta($insert_result, "_additional_settings", '');
			add_post_meta($insert_result, "_locale", 'en_US');
		}

		if ($insert_result != 0) {$user_update = array("Message_Type" => "Update", "Message" => "Product inquiry form successfully created.");}
		else {$user_update = array("Message_Type" => "Error", "Message" => "Inquiry form could not be created.");}
	}
	else {
		$user_update = array("Message_Type" => "Error", "Message" => "Contact Form 7 must be activated.");
	}	

	return $user_update;
}

?>