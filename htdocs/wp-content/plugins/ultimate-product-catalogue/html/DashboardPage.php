<?php 
if (get_option("UPCP_Dash_Cache") + 24*3600 < time()) {
		UPCP_Get_EWD_Blog();
		update_option("UPCP_Dash_Cache", time());
	}
?>

<!-- Upgrade to pro link box -->
<!-- LEFT COLUMN -->
<div id="ewd-dashboard-left-column" class="metabox-holder">
<?php if ($Full_Version != "Yes") { ?>
<div id="ewd-dashboard-pro" class="postbox upcp-pro upcp-postbox-collapsible" >
	<div class="handlediv" title="Click to toggle"></div><h3 class='hndle ewd-dashboard-h3'><span><?php _e("Full Version", 'UPCP') ?></span></h3>
	<div class="inside">
		<ul><li><a href="http://www.etoilewebdesign.com/plugins/ultimate-product-catalog/"><?php _e("Upgrade to the full version ", "UPCP"); ?></a><?php _e("to take advantage of all the available features of the Ultimate Product Catalogue for Wordpress!", 'UPCP'); ?></li>
		<h3 class='hndle'><span><?php _e("What you get by upgrading:", 'UPCP') ?></span></h3>
		<ul>
			<li>Access to the "Custom Fields" tab, so you can create, filter by and display your own fields.</li>
			<li>Access to the "Product Page" tab, so you can create product pages that suit your products.</li>
			<li>Options to make your catalogue SEO-friendly, including custom permalinks and adding product/category names to page titles.</li>
			<li>Additional display options, changing features like the sidebar or catalogue skin to help you create the perfect catalogue for your site.</li>
			<li>Many other premium features including a product inquiry form, pagination of the catalogue, product sorting and related products along with many more!</li>
			<li>Access to e-mail support. </li>
		</ul>
		<div class="full-version-form-div">
			<form action="admin.php?page=UPCP-options" method="post">
				<div class="form-field form-required">
					<label for="Catalogue_Name"><?php _e("Product Key", 'UPCP') ?></label>
					<input name="Key" type="text" value="" size="40" />
				</div>							
				<input type="submit" name="Upgrade_To_Full" value="<?php _e('Upgrade', 'UPCP') ?>">
			</form>
		</div>
	</div>
</div>
<?php } ?>

<?php /* echo get_option('plugin_error');*/ ?>
<?php if (get_option("UPCP_Update_Flag") == "Yes" or get_option("UPCP_Install_Flag") == "Yes") {?>
	<div id="ewd-dashboard-thank-you" class="postbox upcp-thank-you upcp-postbox-collapsible" >
		<div class="handlediv" title="Click to toggle"></div>
		<h3 class='hndle ewd-dashboard-h3'><span><?php _e("Thank You!", 'UPCP') ?></span></h3>
	 	<div class="inside">
			<?php /* if (get_option("UPCP_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the Ultimate Product Catalogue Plugin.", "UPCP"); ?><br> <a href='https://www.youtube.com/channel/UCZPuaoetCJB1vZOmpnMxJNw'><?php _e("Subscribe to our YouTube channel ", "UPCP"); ?></a> <?php _e("for tutorial videos on this and our other plugins!", "UPCP");?> </li></ul>
			<?php } else { ?><ul><li><?php _e("Thanks for upgrading to version 3.7.9!", "UPCP"); ?><br> <a href='https://www.youtube.com/channel/UCZPuaoetCJB1vZOmpnMxJNw'><?php _e("Subscribe to our YouTube channel ", "UPCP"); ?></a> <?php _e("for tutorial videos on this and our other plugins!", "UPCP");?> </li></ul><?php } */ ?>
			
			<?php  if (get_option("UPCP_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the Ultimate Product Catalogue Plugin.", "UPCP"); ?><br> <a href='https://www.youtube.com/channel/UCZPuaoetCJB1vZOmpnMxJNw'><?php _e("Subscribe to our YouTube channel ", "UPCP"); ?></a> <?php _e("for tutorial videos on this and our other plugins!", "UPCP");?> </li></ul>
			<?php } else { ?><ul><li>Giant icons for the "support options"? Refresh the page (F5 or the refresh icon) to see the new dashboard page layout correctly!</li></ul><?php } ?>

			<?php /* if (get_option("UPCP_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the Ultimate Product Catalogue Plugin.", "UPCP"); ?><br> <a href='http://www.facebook.com/EtoileWebDesign'><?php _e("Follow us on Facebook", "UPCP"); ?></a> <?php _e("to suggest new features or hear about upcoming ones!", "UPCP");?> </li></ul>
			<?php } else { ?><ul><li><?php _e("Thanks for upgrading to version 2.2.9!", "UPCP"); ?><br> <a href='http://www.facebook.com/EtoileWebDesign'><?php _e("Follow us on Facebook", "UPCP"); ?></a> <?php _e("to suggest new features or hear about upcoming ones!", "UPCP");?> </li></ul><?php } */ ?>
			
			<?php /* if (get_option("UPCP_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the Ultimate Product Catalogue Plugin.", "UPCP"); ?><br> <a href='http://www.facebook.com/EtoileWebDesign'><?php _e("Follow us on Facebook", "UPCP"); ?></a> <?php _e("to suggest new features or hear about upcoming ones!", "UPCP");?>  </li></ul>
			<?php } else { ?><ul><li><?php _e("Thanks for upgrading to version 3.0.16!", "UPCP"); ?><br> <a href='http://wordpress.org/support/view/plugin-reviews/ultimate-product-catalogue'><?php _e("Please rate our plugin", "UPCP"); ?></a> <?php _e("if you find the Ultimate Product Catalogue Plugin useful!", "UPCP");?> </li></ul><?php } */ ?>
			
			<?php /* if (get_option("UPCP_Install_Flag") == "Yes") { ?><ul><li><?php _e("Thanks for installing the Ultimate Product Catalogue Plugin.", "UPCP"); ?><br> <a href='http://www.facebook.com/EtoileWebDesign'><?php _e("Follow us on Facebook", "UPCP"); ?></a> <?php _e("to suggest new features or hear about upcoming ones!", "UPCP");?>  </li></ul>
			<?php } else { ?><ul><li><?php _e("Thanks for upgrading to version 3.7.5!", "UPCP"); ?><br> <a href='https://wordpress.org/plugins/ultimate-faqs/'><?php _e("Try out our FAQ plugin ", "UPCP"); ?></a> <?php _e("for a better way to connect with your visitors!", "UPCP");?> </li></ul><?php } */ ?>
		</div>
	</div>
<?php 
UPCP_Get_Changelog();
update_option('UPCP_Update_Flag', "No");
update_option('UPCP_Install_Flag', "No");  
} ?>

<div id="ewd-dashboard-support" class="upcp-support postbox upcp-postbox-collapsible" >
	<div class="handlediv" title="Click to toggle"></div><h3 class='hndle ewd-dashboard-h3'><span><?php _e("Support Options", 'UPCP') ?></span></h3>
	<div class="inside">
		<div class="ewd-dashboard-icons"><a href='https://www.youtube.com/channel/UCZPuaoetCJB1vZOmpnMxJNw/feed'>
			<img style="width:100%" src='http://www.etoilewebdesign.com/DevelopmentFour/wp-content/uploads/2016/04/ewd-upcp-dashboard-icons-01.png'/></a>
			Youtube Tutorials
		</div>
		<div class="ewd-dashboard-icons"><a href='http://www.etoilewebdesign.com/ultimate-product-catalogue-faq/'>
			<img style="width:100%" src='http://www.etoilewebdesign.com/DevelopmentFour/wp-content/uploads/2016/04/ewd-upcp-dashboard-icons-02.png'/></a>
			Plugin FAQs
		</div>
		<div class="ewd-dashboard-icons"><a href='https://wordpress.org/support/plugin/ultimate-product-catalogue'>
			<img style="width:100%" src='http://www.etoilewebdesign.com/DevelopmentFour/wp-content/uploads/2016/04/ewd-upcp-dashboard-icons-04.png'/></a>
			Support Forum
		</div>
		<div class="ewd-dashboard-icons"><a href='http://www.etoilewebdesign.com/wp-content/uploads/2015/07/UPCP-Document.pdf'>
			<img style="width:100%" src='http://www.etoilewebdesign.com/DevelopmentFour/wp-content/uploads/2016/04/ewd-upcp-dashboard-icons-03.png'/></a>
			Documentation
		</div>

	</div>
</div>

<!-- List of the catalogues which have already been created -->
<div id='ewd-dashboard-graph' class="col-wrap">

<?php wp_nonce_field(); ?>
<?php wp_referer_field(); ?>

<?php 
			if (isset($_GET['Page'])) {$Page = $_GET['Page'];}
			else {$Page = 1;}
			
			$Sql = "SELECT * FROM $catalogues_table_name ";
				if (isset($_GET['OrderBy']) and $_GET['DisplayPage'] == "Dashboard") {$Sql .= "ORDER BY " . $_GET['OrderBy'] . " " . $_GET['Order'] . " ";}
				else {$Sql .= "ORDER BY Catalogue_Name ";}
				$Sql .= "LIMIT " . ($Page - 1)*20 . ",20";
				$myrows = $wpdb->get_results($Sql);
				$TotalProducts = $wpdb->get_results("SELECT Catalogue_ID FROM $catalogues_table_name");
				$num_rows = $wpdb->num_rows; 
				$Number_of_Pages = ceil($wpdb->num_rows/20);
				$Current_Page_With_Order_By = "admin.php?page=UPCP-options&DisplayPage=Dashboard";
				if (isset($_GET['OrderBy'])) {$Current_Page_With_Order_By .= "&OrderBy=" .$_GET['OrderBy'] . "&Order=" . $_GET['Order'];}?>

<form action="admin.php?page=UPCP-options&Action=UPCP_MassDeleteCatalogues" method="post">    
<div class="tablenav top">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'><?php _e("Bulk Actions", 'UPCP') ?></option>
						<option value='delete'><?php _e("Delete", 'UPCP') ?></option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="<?php _e('Apply', 'UPCP') ?>"  />
		</div>
		<div class='tablenav-pages <?php if ($Number_of_Pages == 1) {echo "one-page";} ?>'>
				<span class="displaying-num"><?php echo $wpdb->num_rows; ?> <?php _e("items", 'UPCP') ?></span>
				<span class='pagination-links'>
						<a class='first-page <?php if ($Page == 1) {echo "disabled";} ?>' title='Go to the first page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=1'>&laquo;</a>
						<a class='prev-page <?php if ($Page <= 1) {echo "disabled";} ?>' title='Go to the previous page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page-1;?>'>&lsaquo;</a>
						<span class="paging-input"><?php echo $Page; ?> <?php _e("of", 'UPCP') ?> <span class='total-pages'><?php echo $Number_of_Pages; ?></span></span>
						<a class='next-page <?php if ($Page >= $Number_of_Pages) {echo "disabled";} ?>' title='Go to the next page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page+1;?>'>&rsaquo;</a>
						<a class='last-page <?php if ($Page == $Number_of_Pages) {echo "disabled";} ?>' title='Go to the last page' href='<?php echo $Current_Page_With_Order_By . "&Page=" . $Number_of_Pages; ?>'>&raquo;</a>
				</span>
		</div>
</div>

<table class="wp-list-table widefat fixed tags sorttable" cellspacing="0">
		<thead>
				<tr>
						<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
								<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
										<?php if ($_GET['OrderBy'] == "Catalogue_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Name&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Name&Order=ASC'>";} ?>
											  <span><?php _e("Name", 'UPCP') ?></span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='shortcode' class='manage-column column-shortcode'  style="">
											  <span><?php _e("Shortcode", 'UPCP') ?></span>
						</th>
						<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "Catalogue_Item_Count" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Item_Count&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Item_Count&Order=ASC'>";} ?>
											  <span><?php _e("Products in Catalogue", 'UPCP') ?></span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
				</tr>
		</thead>

		<tfoot>
				<tr>
						<th scope='col' id='cb' class='manage-column column-cb check-column'  style="">
								<input type="checkbox" /></th><th scope='col' id='name' class='manage-column column-name sortable desc'  style="">
										<?php if ($_GET['OrderBy'] == "Catalogue_Name" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Name&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Name&Order=ASC'>";} ?>
											  <span><?php _e("Name", 'UPCP') ?></span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
						<th scope='col' id='shortcode' class='manage-column column-shortcode'  style="">
											  <span><?php _e("Shortcode", 'UPCP') ?></span>
						</th>
						<th scope='col' id='requirements' class='manage-column column-requirements sortable desc'  style="">
									  <?php if ($_GET['OrderBy'] == "Catalogue_Item_Count" and $_GET['Order'] == "ASC") { echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Item_Count&Order=DESC'>";}
										 			else {echo "<a href='admin.php?page=UPCP-options&DisplayPage=Catalogues&OrderBy=Catalogue_Item_Count&Order=ASC'>";} ?>
											  <span><?php _e("Products in Catalogue", 'UPCP') ?></span>
												<span class="sorting-indicator"></span>
										</a>
						</th>
				</tr>
		</tfoot>

	<tbody id="the-list" class='list:tag'>
		
		 <?php
				if ($myrows) { 
	  			  foreach ($myrows as $Catalogue) {
								echo "<tr id='Item" . $Catalogue->Catalogue_ID ."'>";
								echo "<th scope='row' class='check-column'>";
								echo "<input type='checkbox' name='Catalogues_Bulk[]' value='" . $Catalogue->Catalogue_ID ."' />";
								echo "</th>";
								echo "<td class='name column-name'>";
								echo "<strong>";
								echo "<a class='row-title' href='admin.php?page=UPCP-options&Action=UPCP_Catalogue_Details&Selected=Catalogue&Catalogue_ID=" . $Catalogue->Catalogue_ID ."' title='Edit " . $Catalogue->Catalogue_Name . "'>" . $Catalogue->Catalogue_Name . "</a></strong>";
								echo "<br />";
								echo "<div class='row-actions'>";
								echo "<span class='delete'>";
								echo "<a class='delete-tag' href='admin.php?page=UPCP-options&Action=UPCP_DeleteCatalogue&DisplayPage=Catalogues&Catalogue_ID=" . $Catalogue->Catalogue_ID ."'>" . __("Delete", 'UPCP') . "</a>";
		 						echo "</span>";
								echo "</div>";
								echo "<div class='hidden' id='inline_" . $Catalogue->Catalogue_ID ."'>";
								echo "<div class='name'>" . $Catalogue->Catalogue_Name . "</div>";
								echo "</div>";
								echo "</td>";
								echo "<td class='description column-description'>[product-catalogue id='" . $Catalogue->Catalogue_ID . "']</td>";
								echo "<td class='description column-items-count'>" . $Catalogue->Catalogue_Item_Count . "</td>";
								echo "</tr>";
						}
				}
		?>

	</tbody>
</table>

<div class="tablenav bottom">
		<div class="alignleft actions">
				<select name='action'>
  					<option value='-1' selected='selected'><?php _e("Bulk Actions", 'UPCP') ?></option>
						<option value='delete'><?php _e("Delete", 'UPCP') ?></option>
				</select>
				<input type="submit" name="" id="doaction" class="button-secondary action" value="<?php _e('Apply', 'UPCP') ?>"  />
		</div>
		<div class='tablenav-pages <?php if ($Number_of_Pages == 1) {echo "one-page";} ?>'>
				<span class="displaying-num"><?php echo $wpdb->num_rows; ?> <?php _e("items", 'UPCP') ?></span>
				<span class='pagination-links'>
						<a class='first-page <?php if ($Page == 1) {echo "disabled";} ?>' title='Go to the first page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=1'>&laquo;</a>
						<a class='prev-page <?php if ($Page <= 1) {echo "disabled";} ?>' title='Go to the previous page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page-1;?>'>&lsaquo;</a>
						<span class="paging-input"><?php echo $Page; ?> <?php _e("of", 'UPCP') ?> <span class='total-pages'><?php echo $Number_of_Pages; ?></span></span>
						<a class='next-page <?php if ($Page >= $Number_of_Pages) {echo "disabled";} ?>' title='Go to the next page' href='<?php echo $Current_Page_With_Order_By; ?>&Page=<?php echo $Page+1;?>'>&rsaquo;</a>
						<a class='last-page <?php if ($Page == $Number_of_Pages) {echo "disabled";} ?>' title='Go to the last page' href='<?php echo $Current_Page_With_Order_By . "&Page=" . $Number_of_Pages; ?>'>&raquo;</a>
				</span>
		</div>
		<br class="clear" />
</div>
</form>
<br class="clear" />
</div>

</div>

<!--RIGHT COLUMN-->
<!-- A list of the products in the catalogue -->
<div id="ewd-dashboard-right-column">
<div id='ewd-dashboard-updates' class='upcp-updates postbox upcp-postbox-collapsible'>
<h3 class='hndle ewd-dashboard-h3' id='ewd-recent-changes'><?php _e("Recent Changes", 'UPCP'); ?></h3>
<div class='ewd-dashboard-content' ><?php echo get_option('UPCP_Changelog_Content'); ?></div>
</div>


<div id='ewd-dashboard-blog' class='upcp-blog postbox upcp-postbox-collapsible'>
<h3 class='hndle ewd-dashboard-h3'>News</h3>
<div class='ewd-dashboard-content'><?php echo get_option('UPCP_Blog_Content'); ?></div>
</div>

<div id="ewd-dashboard-plugins" class='upcp-support postbox upcp-postbox-collapsible' >
	<h3 class='hndle ewd-dashboard-h3'><span><?php _e("Goes great with:", 'UPCP') ?></span></h3>
	<div class="inside">
		<div class="ewd-dashboard-plugin-icons">
			<div style="width:50%">
				<a target='_blank' href='https://wordpress.org/plugins/order-tracking/'><img style="width:100%" src='http://www.etoilewebdesign.com/DevelopmentFour/wp-content/uploads/2016/04/OTP_Icons-10.png'/></a>
			</div>
			<div>
				<h3>Order Tracking</h3> <p>Let customers track and pay for orders through your website. Send status update emails automatically!</p>
			</div>
			
		</div>
		<div class="ewd-dashboard-plugin-icons">
			<div style="width:50%">
				<a target='_blank' href='https://wordpress.org/plugins/ultimate-reviews/'><img style="width:100%" src='http://www.etoilewebdesign.com/DevelopmentFour/wp-content/uploads/2016/04/URP_Icons-03.png'/></a>
			</div>
			<div>
				<h3>Ultimate Reviews</h3><p>Let visitors submit reviews and display them right in the tabbed page layout! Require login, email confirmation, and many more options!</p>
			</div>
			
		</div>
	</div>
</div>

</div>


<?php
function UPCP_Get_EWD_Blog() {
	if (!function_exists('curl_version')) {return;}
	
	$Update_URL = 'http://www.etoilewebdesign.com/Dashboard/UPCP.html';

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $Update_URL);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	
	$response = curl_exec($ch);
	curl_close($ch);

	update_option('UPCP_Blog_Content', $response);
}

function UPCP_Get_Changelog() {
	$Readme_URL = UPCP_CD_PLUGIN_PATH . 'readme.txt';
	$Readme = file_get_contents($Readme_URL);

	$Changes_Start = strpos($Readme, "== Changelog ==") + 15;
	$Changes_Section = substr($Readme, $Changes_Start);

	$Changes_Text = substr($Changes_Section, 0, strposX($Changes_Section, "=", 5));

	$Changes_Text = str_replace("= ", "<h3>", $Changes_Text);
	$Changes_Text = str_replace(" =", "</h3>", $Changes_Text);

	update_option('UPCP_Changelog_Content', $Changes_Text);
}

function strposX($haystack, $needle, $number){
    if($number == '1'){
        return strpos($haystack, $needle);
    }elseif($number > '1'){
        return strpos($haystack, $needle, strposX($haystack, $needle, $number - 1) + strlen($needle));
    }else{
        return error_log('Error: Value for parameter $number is out of range');
    }
}

?>