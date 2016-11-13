<?php $Category = $wpdb->get_row($wpdb->prepare("SELECT * FROM $categories_table_name WHERE Category_ID ='%d'", $_GET['Category_ID'])); ?>
		
		<div class="OptionTab ActiveTab" id="EditCategory">
				
				<div id="col-right">
				<div class="col-wrap">
				<div id="add-page" class="postbox metabox-holder" >
				<div class="handlediv" title="Click to toggle"><br /></div><h3 class='hndle'><span><?php _e("Products in Category", 'UPCP') ?></span></h3>
				<div class="inside">
				<div id="posttype-page" class="posttypediv">

				<div id="tabs-panel-posttype-page-most-recent" class="tabs-panel tabs-panel-active">
				</ul>
				<table class="wp-list-table widefat tags sorttable category-products-list">
				    <thead>
				    	<tr>
				            <th><?php _e("Product Name", 'UPCP') ?></th>
				    	</tr>
				    </thead>
				    <tbody>
				    <?php $Products = $wpdb->get_results($wpdb->prepare("SELECT Item_ID, Item_Name FROM $items_table_name WHERE Category_ID='%d' ORDER BY Item_Category_Product_Order", $_GET['Category_ID']));
					if (empty($Products)) { echo "<div class='product-category-row list-item'><p>No products currently in category<p/></div>"; }
					else {
				    	foreach ($Products as $Product) {
				    		echo "<tr id='category-product-item-" . $Product->Item_ID . "' class='category-product-item'>";
				    	    echo "<td class='product-name'>";
				    	    echo "<a href='admin.php?page=UPCP-options&Action=UPCP_Item_Details&Selected=Product&Item_ID=" . $Product->Item_ID . "'>" . $Product->Item_Name . "</a>";
				    	    echo "</td>";
				    		echo "</tr>";
				    	}
					}?>
				    </tbody>
				    <tfoot>
				        <tr>
				            <th><?php _e("Product Name", 'UPCP') ?></th>
				        </tr>
				    </tfoot>
				</table>
				</div><!-- /.tabs-panel -->
				</div><!-- /.posttypediv -->
				</div>
				</div>
				</div>
				</div><!-- col-right -->
				
				<div id="col-left">
				<div class="col-wrap">
				<div class="form-wrap CategoryDetail">
					<a href="admin.php?page=UPCP-options&DisplayPage=Categories" class="NoUnderline">&#171; <?php _e("Back", 'UPCP') ?></a>
					<h3>Edit <?php echo $Category->Category_Name;echo" (ID:";echo $Category->Category_ID;echo " )";?></h3>
					<form id="addtag" method="post" action="admin.php?page=UPCP-options&Action=UPCP_EditCategory&DisplayPage=Categories" class="validate" enctype="multipart/form-data">
					<input type="hidden" name="action" value="Edit_Category" />
					<input type="hidden" name="Category_ID" value="<?php echo $Category->Category_ID; ?>" />
					<?php wp_nonce_field(); ?>
					<?php wp_referer_field(); ?>
					<div class="form-field">
						<label for="Category_Name"><?php _e("Name", 'UPCP') ?></label>
						<input name="Category_Name" id="Category_Name" type="text" value="<?php echo $Category->Category_Name;?>" size="60" />
						<p><?php _e("The name of the category your users will see and search for.", 'UPCP') ?></p>
					</div>
					<div class="form-field">
						<label for="Category_Description"><?php _e("Description", 'UPCP') ?></label>
						<textarea name="Category_Description" id="Category_Description" rows="5" cols="40"><?php echo $Category->Category_Description;?></textarea>
						<p><?php _e("The description of the category. What products are included in this?", 'UPCP') ?></p>
					</div>

					<p class="submit"><input type="submit" name="submit" id="submit" class="button-primary" value="<?php _e('Save Changes', 'UPCP') ?>" /></p>
					</form>
				</div>
				</div>
				</div>
			
		</div>