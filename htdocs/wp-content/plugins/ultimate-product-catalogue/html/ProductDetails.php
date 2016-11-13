<?php $Product = $wpdb->get_row($wpdb->prepare("SELECT * FROM $items_table_name WHERE Item_ID ='%d'", $_GET['Item_ID'])); ?>
<?php 
	$Next_Product_ID = $wpdb->get_var("SELECT Item_ID FROM $items_table_name WHERE Item_ID>'" . $Product->Item_ID . "' ORDER BY Item_ID ASC LIMIT 1");
	$Previous_Product_ID = $wpdb->get_var("SELECT Item_ID FROM $items_table_name WHERE Item_ID<'" . $Product->Item_ID . "' ORDER BY Item_ID DESC LIMIT 1");

	$Next_Product = $wpdb->get_row("SELECT * FROM $items_table_name WHERE Item_ID='" . $Next_Product_ID ."'");
	$Previous_Product = $wpdb->get_row("SELECT * FROM $items_table_name WHERE Item_ID='" . $Previous_Product_ID ."'");
?>
	
	<div class="OptionTab ActiveTab" id="EditProduct">
		<!-- add the ability to switch quickly between products -->

		<div class="form-wrap ItemDetail upcp-product-details">
			<a href="admin.php?page=UPCP-options&DisplayPage=Products" class="NoUnderline">&#171; <?php _e("Back", 'UPCP') ?></a>
			<h3>Edit  <?php echo $Product->Item_Name . " (ID:" . $Product->Item_ID . " )"; ?></h3>
			<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=UPCP_EditProduct&Update_Item=Product&Item_ID=<?php echo $Product->Item_ID ?>" class="validate" enctype="multipart/form-data">
			<input type="hidden" name="action" value="Edit_Product" />
			<input type="hidden" name="Item_ID" value="<?php echo $Product->Item_ID; ?>" />
			<?php wp_nonce_field(); ?>
			<?php wp_referer_field(); ?>
			<table class="form-table">
			<tr>
				<th><label for="Item_Name"><?php _e("Name", 'UPCP') ?></label></th>
				<td><input name="Item_Name" id="Item_Name" type="text" value="<?php echo $Product->Item_Name;?>" size="60" />
				<p><?php _e("The name of the product your users will see.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Slug"><?php _e("Slug", 'UPCP') ?></label></th>
				<td><input name="Item_Slug" id="Item_Slug" type="text" value="<?php echo $Product->Item_Slug;?>" size="60" />
				<p><?php _e("The slug for your product if you use pretty permalinks.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Image"><?php _e("Image", 'UPCP') ?></label></th>
				<td><input id="Item_Image" type="text" size="36" name="Item_Image" value="<?php echo $Product->Item_Photo_URL;?>" /> 
				<input id="Item_Image_button" class="button" type="button" value="Upload Image" />
				<p><?php _e("The main image that will be displayed in association with this product. Current Image:", 'UPCP') ?><br/><img class="PreviewImage" height="100" width="100" src="<?php echo $Product->Item_Photo_URL;?>" /></p></td>
			</tr>
			<tr>
				<th><label for="Item_Price"><?php _e("Price", 'UPCP') ?></label></th>
				<td><input name="Item_Price" id="Item_Price" type="text" value="<?php echo $Product->Item_Price;?>" size="60" />
				<p><?php _e("The price of the product.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Description"><?php _e("Description", 'UPCP') ?></label></th>
				<td><?php 
					$settings = array( //'wpautotop' => false,
									'textarea_rows' => 6);																						
					wp_editor($Product->Item_Description, "Item_Description", $settings); ?>
				<p><?php _e("The description of the product. What is it and what makes it worth getting?", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_SEO_Description"><?php _e("SEO Description", 'UPCP') ?></label></th>
				<td><input name="Item_SEO_Description" id="Item_SEO_Description" type="text" value="<?php echo $Product->Item_SEO_Description;?>" size="60" />
				<p><?php _e("The description to use for this product in the SEO By Yoast meta description tag.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Link"><?php _e("Product Link", 'UPCP') ?></label></th>
				<td><input name="Item_Link" id="Item_Link" type="text" value="<?php echo $Product->Item_Link;?>" size="60" />
				<p><?php _e("A link that will replace the default product page. Useful if you participate in affiliate programs.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Display_Status"><?php _e("Display Status", 'UPCP') ?></label></th>
				<td><label title='Show'><input type='radio' name='Item_Display_Status' value='Show' <?php if($Product->Item_Display_Status == "Show" or $Product->Item_Display_Status == "") {echo "checked='checked'";} ?>/> <span>Show</span></label><br />
				<label title='Hide'><input type='radio' name='Item_Display_Status' value='Hide' <?php if($Product->Item_Display_Status == "Hide") {echo "checked='checked'";} ?>/> <span>Hide</span></label><br />
				<p><?php _e("Should this item be displayed if it's added to a catalogue?", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Category"><?php _e("Category:", 'UPCP') ?></label></th>
				<td><select name="Category_ID" id="Item_Category" onchange="UpdateSubCats();">
					<option value=""></option>
						<?php $Categories = $wpdb->get_results("SELECT * FROM $categories_table_name"); ?>
						<?php foreach ($Categories as $Category) {
						 	echo "<option value='" . $Category->Category_ID . "' ";
							if ($Category->Category_ID == $Product->Category_ID) {echo "selected='selected'";}
							echo " >" . $Category->Category_Name . "</option>";
						} ?>
					</select>
				<p><?php _e("What category is this product in? Categories help to organize your product catalogues and help your customers to find what they're looking for.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_SubCategory"><?php _e("Sub-Category:", 'UPCP') ?></label></th>
				<td><select name="SubCategory_ID" id="Item_SubCategory">
						<option value=""></option>
						<?php $SubCategories = $wpdb->get_results("SELECT * FROM $subcategories_table_name WHERE Category_ID=" . $Product->Category_ID . " ORDER BY SubCategory_Name"); ?>
						<?php foreach ($SubCategories as $SubCategory) {
						 			echo "<option value='" . $SubCategory->SubCategory_ID . "' ";
									if ($SubCategory->SubCategory_ID == $Product->SubCategory_ID) {echo "selected='selected'";}
									echo " >" . $SubCategory->SubCategory_Name . "</option>";
							} ?>
					</select>
				<p><?php _e("What sub-category is this product in? Sub-categories help to organize your product catalogues and help your customers to find what they're looking for.", 'UPCP') ?></p></td>
			</tr>
			<tr>
				<th><label for="Item_Tags"><?php _e("Tags:", 'UPCP') ?></label></th>
				<td>
				<?php $Tagged_Items = $wpdb->get_results("SELECT Tag_ID FROM $tagged_items_table_name WHERE Item_ID='" . $Product->Item_ID ."'");?>
				<?php $TagGroupNames = $wpdb->get_results("SELECT * FROM $tag_groups_table_name ORDER BY Tag_Group_ID ASC");
				$NoTag = new stdClass(); //Create an object for the tags that don't have a group
				$NoTag->Tag_Group_ID = 0;
				$NoTag->Tag_Group_Name = "Not Assigned";
				$NoTag->Tag_Group_Order = 9999;
				$NoTag->Display_Tag_Group = "Yes";
				$TagGroupNames[] = $NoTag;?>
                <div class="Tag-Group-Holder" style="margin:10px auto;">
                <?php foreach($TagGroupNames as $TagGroupName){
					$Tags = $wpdb->get_results("SELECT * FROM $tags_table_name WHERE Tag_Group_ID=" . $TagGroupName->Tag_Group_ID . " ORDER BY Tag_Name ASC" );
					if(!empty($Tags)){?>
                    	<div style="padding:10px;" id="Tag-Group-<?php echo $TagGroupName->Tag_Group_ID; ?>">
                        <?php echo $TagGroupName->Tag_Group_Name."<br /><br />"; ?>
                        <?php foreach ($Tags as $Tag) {
                                $Is_Tagged = false;
                                foreach ($Tagged_Items as $Tagged_Item) {if ($Tagged_Item->Tag_ID == $Tag->Tag_ID) {$Is_Tagged = true;}}?>
                                <input type="checkbox" class='upcp-tag-input' name="Tags[]" value="<?php echo $Tag->Tag_ID; ?>" id="Tag-<?php echo $Tag->Tag_Name; ?>" <?php if ($Is_Tagged) {echo " checked";} ?>>
                                <?php echo $Tag->Tag_Name; ?></br>
                        <?php } ?>
                        </div><!-- end #Tag-Group-<?php echo $TagGroupName->Tag_Group_ID; ?> --><?php } } ?>
                </div><!-- end .Tag-Group-Holder -->
 				<p><?php _e("What tags should this product have? Tags help to describe the attributes of a product.", 'UPCP') ?></p></td>
 			</tr>
			
			<?php if ($Related_Products != "Manual") {$RelatedDisabled = "disabled";} ?>
			<?php $Related_Products_Array = explode(",", $Product->Item_Related_Products); ?>
			<tr>
				<th><label for="Item_Related_Products"><?php _e("Related Products", 'UPCP') ?></label></th>
				<td>
				<label title='Product ID'></label><input type='text' name='Item_Related_Products_1' value="<?php echo $Related_Products_Array['0']; ?>" <?php echo $RelatedDisabled; ?>/><br />
				<label title='Product ID'></label><input type='text' name='Item_Related_Products_2' value="<?php echo $Related_Products_Array['1']; ?>" <?php echo $RelatedDisabled; ?>/><br />
				<label title='Product ID'></label><input type='text' name='Item_Related_Products_3' value="<?php echo $Related_Products_Array['2']; ?>" <?php echo $RelatedDisabled; ?>/><br />
				<label title='Product ID'></label><input type='text' name='Item_Related_Products_4' value="<?php echo $Related_Products_Array['3']; ?>" <?php echo $RelatedDisabled; ?>/><br />
				<label title='Product ID'></label><input type='text' name='Item_Related_Products_5' value="<?php echo $Related_Products_Array['4']; ?>" <?php echo $RelatedDisabled; ?>/><br />
				<p><?php _e("What products are related to this one if set to manual related products? (premium feature, input product IDs)", 'UPCP') ?></p>
				</td>
			</tr>
			
			<?php if ($Next_Previous != "Manual") {$NextPreviousDisabled = "disabled";} ?>
			<tr>
				<th><label for="Item_Related_Products"><?php _e("Next/Previous Products", 'UPCP') ?></label></th>
				<td>
				<label title='Product ID'>Next Product ID:</label><input type='text' name='Item_Next_Product' value="<?php echo substr($Product->Item_Next_Previous, 0, strpos($Product->Item_Next_Previous, ',')); ?>" <?php echo $NextPreviousDisabled; ?>/><br />
				<label title='Product ID'>Previous Product ID:</label><input type='text' name='Item_Previous_Product' value="<?php echo substr($Product->Item_Next_Previous, strpos($Product->Item_Next_Previous, ',')+1); ?>" <?php echo $NextPreviousDisabled; ?>/><br />
				<p><?php _e("What products should be listed as the next/previous products? (premium feature, input product IDs)", 'UPCP') ?></p>
				</td>
			</tr>
			
			<?php
			
			$Sql = "SELECT * FROM $fields_table_name ";
			$Fields = $wpdb->get_results($Sql);
			$MetaValues = $wpdb->get_results($wpdb->prepare("SELECT Field_ID, Meta_Value FROM $fields_meta_table_name WHERE Item_ID=%d", $_GET['Item_ID']));
			foreach ($Fields as $Field) {
				$Value = "";
				if (is_array($MetaValues)) {
					foreach ($MetaValues as $Meta) {
						if ($Field->Field_ID == $Meta->Field_ID) {$Value = $Meta->Meta_Value;}
					}
				}
				$ReturnString .= "<tr><th><label for='" . $Field->Field_Name . "'>" . $Field->Field_Name . ":</label></th>";
				if ($Field->Field_Type == "text" or $Field->Field_Type == "mediumint") {
		  		  $ReturnString .= "<td><input name='" . $Field->Field_Name . "' id='upcp-input-" . $Field->Field_ID . "' class='upcp-text-input' type='text' value='" . htmlspecialchars($Value, ENT_QUOTES) . "' size='60' /></td>";
				}
				elseif ($Field->Field_Type == "textarea") {
					$ReturnString .= "<td><textarea name='" . $Field->Field_Name . "' id='upcp-input-" . $Field->Field_ID . "' class='upcp-textarea' cols='60' rows='6'>" . $Value . "</textarea></td>";
				} 
				elseif ($Field->Field_Type == "select") { 
					$Options = explode(",", $Field->Field_Values);
					$ReturnString .= "<td><select name='" . $Field->Field_Name . "' id='upcp-input-" . $Field->Field_ID . "' class='upcp-select'>";
 					foreach ($Options as $Option) {
						$ReturnString .= "<option value='" . $Option . "' ";
						if (trim($Option) == trim($Value)) {$ReturnString .= "selected='selected'";}
						$ReturnString .= ">" . $Option . "</option>";
					}
					$ReturnString .= "</select></td>";
				} 
				elseif ($Field->Field_Type == "radio") {
					$Counter = 0;
					$Options = explode(",", $Field->Field_Values);
					$ReturnString .= "<td>";
					foreach ($Options as $Option) {
						if ($Counter != 0) {$ReturnString .= "<label class='radio'></label>";}
						$ReturnString .= "<input type='radio' name='" . $Field->Field_Name . "' value='" . $Option . "' class='upcp-radio' ";
						if (trim($Option) == trim($Value)) {$ReturnString .= "checked";}
						$ReturnString .= ">" . $Option;
						$Counter++;
					} 
					$ReturnString .= "</td>";
				} 
				elseif ($Field->Field_Type == "checkbox") {
					$Counter = 0;
					$Options = explode(",", $Field->Field_Values);
					$Values = explode(",", $Value);
					$ReturnString .= "<td>";
					foreach ($Options as $Option) {
						if ($Counter != 0) {$ReturnString .= "<label class='radio'></label>";}
						$ReturnString .= "<input type='checkbox' name='" . $Field->Field_Name . "[]' value='" . $Option . "' class='upcp-checkbox' ";
						if (in_array($Option, $Values)) {$ReturnString .= "checked";}
						$ReturnString .= ">" . $Option . "</br>";
						$Counter++;
					}
					$ReturnString .= "</td>";
				}
				elseif ($Field->Field_Type == "file") {
					$ReturnString .= "<td><input name='" . $Field->Field_Name . "' class='upcp-file-input' type='file' value='" . $Value . "' /><br/>Current Filename: " . $Value . "</td>";
				}
				elseif ($Field->Field_Type == "date") {
					$ReturnString .= "<td><input name='" . $Field->Field_Name . "' class='upcp-date-input' type='date' value='" . $Value . "' /></td>";
				} 
				elseif ($Field->Field_Type == "datetime") {
					$ReturnString .= "<td><input name='" . $Field->Field_Name . "' class='upcp-datetime-input' type='datetime-local' value='" . $Value . "' /></td>";
				}
			}
			echo $ReturnString;
			?>
			</table>
			<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Save Changes"  /></p>
			</form>

		</div>

		<div class='upcp-next-previous'>
			<h3><?php _e("Edit Another Product", 'UPCP'); ?></h3>
			<?php  if ($Previous_Product) { ?>
				<p>Previous Product:<br />
				<a href='admin.php?page=UPCP-options&Action=UPCP_Item_Details&Selected=Product&Item_ID=<?php echo $Previous_Product->Item_ID; ?>'><?php echo $Previous_Product->Item_Name; ?></a></p>
			<?php } ?>
			<?php  if ($Next_Product) { ?>
				<p>Next Product:<br />
				<a href='admin.php?page=UPCP-options&Action=UPCP_Item_Details&Selected=Product&Item_ID=<?php echo $Next_Product->Item_ID; ?>'><?php echo $Next_Product->Item_Name; ?></a></p>
			<?php } ?>
		</div>

		<div class="clear"></div>
	
		<!-- A form to add additional images for a product, so that they can be viewed in the FancyBox popup -->
		<?php if ($Full_Version == "Yes") { ?>
       <hr /> 
        <div class="form-wrap ItemImages" style="margin:10px 0 20px;">
			<h3><?php _e("Add Product Images", 'UPCP') ?></h3>
			<form id="add-image" method="post" action="admin.php?page=UPCP-options&Action=UPCP_AddProductImage&Update_Item=Product&Item_ID=<?php echo $Product->Item_ID ?>" class="validate" enctype="multipart/form-data">
				<input type="hidden" name="action" value="Add_Product_Image" />
				<input type="hidden" name="Item_ID" value="<?php echo $Product->Item_ID; ?>" />
				<?php wp_nonce_field(); ?>
				<?php wp_referer_field(); ?>
				<table class="form-table">
					<tr>
						<th><label for="Item_Image"><?php _e("Image", 'UPCP') ?></label></th>
						<td><input id="Item_Image_Addt" type="text" size="36" name="Item_Image[]" value="http://" /> 
						<input id="Item_Image_Addt_button" class="button" type="button" value="<?php _e('Upload Image', 'UPCP');?>" />
						<p><?php _e("The secondary images that will be displayed.", 'UPCP') ?></p></td>
					</tr>
				</table>
				<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Add Image"  /></p>
			</form>
			<p><?php _e("Current Images:", 'UPCP') ?><p/>
<ul class="sorttable images-list" style="width:100%;">
	<?php $Images = $wpdb->get_results("SELECT * FROM $item_images_table_name WHERE Item_ID='" . $Product->Item_ID . "' ORDER BY Item_Image_Order");
	 		if(empty($Images)){ echo "<p>No Current Images are uploaded</p>"; }
			else{ foreach($Images as $Image){
				?><li id="list-item-<?php echo $Image->Item_Image_ID; ?>" class="list-item-image" style="position:relative;float:left;">
                    <div class="item-image">
                    <img class="PreviewImage upcp-sortable-preview" height="100" width="100" src="<?php echo $Image->Item_Image_URL;?>" />
                    <a href="admin.php?page=UPCP-options&Action=UPCP_DeleteProductImage&Item_Image_ID=<?php echo $Image->Item_Image_ID; ?>&Update_Item=Product&Item_ID=<?php echo $Product->Item_ID ?>&#add-image" class="confirm-delete"><?php _e("Delete", 'UPCP') ?></a>
                    </div>
				</li>
                <?php
			}
		}
	 ?>
</ul>
<div class="clear"></div>
</div>
<hr />
<div class="form-wrap ItemVideos" style="margin:10px 0 20px;">
    <h3><?php _e("Add Product Videos", 'UPCP') ?></h3>
    <form id="add-video" method="post" action="admin.php?page=UPCP-options&Action=UPCP_AddProductVideos&Update_Item=Product&Item_ID=<?php echo $Product->Item_ID ?>" class="validate" enctype="multipart/form-data">
        <input type="hidden" name="action" value="Add_Product_Videos" />
        <input type="hidden" name="Item_ID" value="<?php echo $Product->Item_ID; ?>" />
        <?php wp_nonce_field(); ?>
        <?php wp_referer_field(); ?>
        <!-- <p><?php _e("What type of video are you using?", 'UPCP') ?></p>
        <label title='YouTube'><input type='radio' name='Item_Video_Type' value='YouTube' /> <span>YouTube</span></label><br />  -->
        <table class="form-table">
            <tr>
                <th><label for="Item_Video"><?php _e("YouTube Video ID", 'UPCP') ?></label></th>
                <td>
                    <input type="text" size="36" name="Item_Video[]" value="" /><br />
                    <input type="text" size="36" name="Item_Video[]" value="" /><br />
                    <input type="text" size="36" name="Item_Video[]" value="" /><br />
                    <input type="text" size="36" name="Item_Video[]" value="" /><br />
                    <input type="text" size="36" name="Item_Video[]" value="" />
                </td>
            </tr>
         </table> 
         <p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="Add Video(s)"  /></p>  
    </form>

<!-- Show the videos in the current order associated with the product, give the user the
option of deleting them or switching the order around -->
<div class="nav-tabs-wrapper">
    <div id="Videos" class="nav-tabs">
    	<span class="nav-tab nav-tab-active">Videos</span>		
    </div><!-- end .nav-tabs -->
</div><!-- end .nav-tabs-wrapper -->

<table class="wp-list-table widefat tags sorttable videos-list" style="width:75%;">
    <thead>
    	<tr>
            <th class="video-delete"><?php _e("Delete?", 'UPCP') ?></th>
            <th class="video-image"><?php _e("Video Image", 'UPCP') ?></th>
            <th class="video-description"><?php _e("Video Description", 'UPCP') ?></th>
    	</tr>
    </thead>
    <tbody>
    <?php $ItemVideos = $wpdb->get_results($wpdb->prepare("SELECT * FROM $item_videos_table_name WHERE Item_ID='%d' ORDER BY Item_Video_Order ASC", $Product->Item_ID));
	if(empty($ItemVideos)){ echo "<div class='video-row list-item'><p>No current videos available<p/></div>"; }else{
    foreach ($ItemVideos as $ItemVideo) {
		$ItemVideoThumb = $ItemVideo->Item_Video_URL;
		$ItemVideoDescription = $ItemVideoThumb;
    ?>
    <tr id="video-item-<?php echo $ItemVideo->Item_Video_ID; ?>" class="video-item">
        <td class="video-delete"><a href="admin.php?page=UPCP-options&Action=UPCP_DeleteProductVideo&DisplayPage=Product&Item_Video_ID=<?php echo $ItemVideo->Item_Video_ID; ?>" class="confirm-delete"><?php _e("Delete", 'UPCP') ?></a></td>
        <td class="video-image"><?php echo "<img class='PreviewVideoImage' height='100' width='100' src='https://img.youtube.com/vi/" . $ItemVideoThumb . "/0.jpg' title='" . $ItemVideoThumb . "' />"; ?></td>
        <td class="video-description"><?php echo $ItemVideoDescription; ?></td>
    </tr>
    <?php }
	}?>
    </tbody>
    <tfoot>
        <tr>
            <th><?php _e("Delete?", 'UPCP') ?></th>
            <th><?php _e("Video Image", 'UPCP') ?></th>
            <th><?php _e("Video Description", 'UPCP') ?></th>
        </tr>
    </tfoot>
</table>
</div>
		<?php } else { ?>
			<div class="Explanation-Div">
				<h2><?php _e("Full Version Required!", 'UPCP') ?></h2>
				<div class="upcp-full-version-explanation">
					<?php _e("The full version of the Ultimate Product Catalogue Plugin is required to additional product images.", "UPCP");?><a href="http://www.etoilewebdesign.com/ultimate-product-catalogue-plugin/"><?php _e(" Please upgrade to unlock this page!", 'UPCP'); ?></a>
				</div>
			</div>
		<?php } ?>
	</div>