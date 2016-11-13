<?php $Field = $wpdb->get_row($wpdb->prepare("SELECT * FROM $fields_table_name WHERE Field_ID ='%d'", $_GET['Field_ID'])); ?>
		
		<div class="OptionTab ActiveTab" id="EditCustomField">
				
				<div id="col-left">
				<div class="col-wrap">
				<div class="form-wrap TagDetail">
						<a href="admin.php?page=UPCP-options&DisplayPage=Tags" class="NoUnderline">&#171; <?php _e("Back", 'UPCP') ?></a>
						<h3>Edit <?php echo $Field->Field_Name; echo "( ID: "; echo $Field->Field_ID; echo" )"; ?></h3>
						<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=UPCP_EditCustomField&DisplayPage=CustomFields" class="validate" enctype="multipart/form-data">
						<input type="hidden" name="action" value="Edit_Custom_Field" />
						<input type="hidden" name="Field_ID" value="<?php echo $Field->Field_ID; ?>" />
						<?php wp_nonce_field(); ?>
						<?php wp_referer_field(); ?>
						<div class="form-field form-required">
								<label for="Field_Name"><?php _e("Name", 'UPCP') ?></label>
								<input name="Field_Name" id="Field_Name" type="text" value="<?php echo $Field->Field_Name;?>" size="60" />
								<p><?php _e("The name of the field you will see.", 'UPCP') ?></p>
						</div>
						<div class="form-field form-required">
								<label for="Field_Slug"><?php _e("Slug", 'UPCP') ?></label>
								<input name="Field_Slug" id="Field_Slug" type="text" value="<?php echo $Field->Field_Slug;?>" size="60" />
								<p><?php _e("An all-lowercase name that will be used to insert the field.", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Type"><?php _e("Type", 'UPCP') ?></label>
								<select name="Field_Type" id="Field_Type">
										<option value='text' <?php if ($Field->Field_Type == "text") {echo "selected=selected";} ?>><?php _e("Short Text", 'UPCP') ?></option>
										<option value='mediumint' <?php if ($Field->Field_Type == "mediumint") {echo "selected=selected";} ?>><?php _e("Integer", 'UPCP') ?></option>
										<option value='select' <?php if ($Field->Field_Type == "select") {echo "selected=selected";} ?>><?php _e("Select Box", 'UPCP') ?></option>
										<option value='radio' <?php if ($Field->Field_Type == "radio") {echo "selected=selected";} ?>><?php _e("Radio Button", 'UPCP') ?></option>
										<option value='checkbox' <?php if ($Field->Field_Type == "checkbox") {echo "selected=selected";} ?>><?php _e("Checkbox", 'UPCP') ?></option>
										<option value='textarea' <?php if ($Field->Field_Type == "textarea") {echo "selected=selected";} ?>><?php _e("Text Area", 'UPCP') ?></option>
										<option value='file' <?php if ($Field->Field_Type == "file") {echo "selected=selected";} ?>><?php _e("File", 'UPCP') ?></option>
										<option value='date' <?php if ($Field->Field_Type == "date") {echo "selected=selected";} ?>><?php _e("Date", 'UPCP') ?></option>
										<option value='datetime' <?php if ($Field->Field_Type == "datetime") {echo "selected=selected";} ?>><?php _e("Date/Time", 'UPCP') ?></option>
								</select>
								<p><?php _e("The input method for the field and type of data that the field will hold.", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Description"><?php _e("Description", 'UPCP') ?></label>
								<textarea name="Field_Description" id="Field_Description" rows="2" cols="40"><?php echo $Field->Field_Description;?></textarea>
								<p><?php _e("The description of the field, which you will see as the instruction for the field.", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Values"><?php _e("Input Values", 'UPCP') ?></label>
								<input name="Field_Values" id="Field_Values" type="text" value="<?php echo $Field->Field_Values;?>"  size="60" />
								<p><?php _e("A comma-separated list of acceptable input values for this field. These values will be the options for select, checkbox, and radio inputs. All values will be accepted if left blank.", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Displays"><?php _e("Display?", 'UPCP') ?></label>
								<select name="Field_Displays" id="Field_Displays">
										<option value='none' <?php if ($Field->Field_Displays == "none") {echo "selected=selected";} ?>><?php _e("None", 'UPCP') ?></option>
										<option value='thumbs' <?php if ($Field->Field_Displays == "thumbs") {echo "selected=selected";} ?>><?php _e("Thumbnail View", 'UPCP') ?></option>
										<option value='list' <?php if ($Field->Field_Displays == "list") {echo "selected=selected";} ?>><?php _e("List View", 'UPCP') ?></option>
										<option value='details' <?php if ($Field->Field_Displays == "details") {echo "selected=selected";} ?>><?php _e("Details View", 'UPCP') ?></option>
										<option value='both' <?php if ($Field->Field_Displays == "both") {echo "selected=selected";} ?>><?php _e("Both", 'UPCP') ?></option>
								</select>
								<p><?php _e("Should this field be displayed in any of the main catalogue pages?", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Searchable"><?php _e("Searchable?", 'UPCP') ?></label>
								<select name="Field_Searchable" id="Field_Searchable">
										<option value='No' <?php if ($Field->Field_Searchable == "No") {echo "selected=selected";} ?>><?php _e("No", 'UPCP') ?></option>
										<option value='Yes' <?php if ($Field->Field_Searchable == "Yes") {echo "selected=selected";} ?>><?php _e("Yes", 'UPCP') ?></option>
								</select>
								<p><?php _e("Should this field be searchable in your catalogues?", 'UPCP') ?></p>
						</div>
						<div class="form-field">
								<label for="Field_Display_Tabbed"><?php _e("Display in Tabbed Layout?", 'UPCP') ?></label>
								<select name="Field_Display_Tabbed" id="Field_Display_Tabbed">
										<option value='No' <?php if ($Field->Field_Display_Tabbed == "No") {echo "selected=selected";} ?>><?php _e("No", 'UPCP') ?></option>
										<option value='Yes' <?php if ($Field->Field_Display_Tabbed == "Yes") {echo "selected=selected";} ?>><?php _e("Yes", 'UPCP') ?></option>
								</select>
								<p><?php _e("Should this field be displayed in the 'Additional Information' area of the tabbed view?", 'UPCP') ?></p>
						</div>

						<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes', 'UPCP') ?>"  /></p>
						</form>
				</div>
				</div>
				</div>
		</div>