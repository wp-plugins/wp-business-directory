<div class="panel panel-primary wpsp_admin_panel" >
	<div class="panel-heading">
		    <h3 class="panel-title"><?php _e('Categories','wp-support-plus-responsive');?></h3>
    </div>
    <div class="panel-body">
	 <?php if(($errorFlag==1)){ ?>
     <?php _e($errormessage,'wp-business-directroy-plugin'); ?>
    <?php }else if($errorFlag==2){ ?>
     <span class="label label-success"><?php _e($sucssesMessage,'wp-business-directroy-plugin'); ?></span>
    <?php }	?>
	<br>
	<form id="categoryForm" method="post">
		   <div id="createCategoryContainer">
           <input id="newCatName" name="category" class="form-control" type="text" placeholder="<?php _e('Enter Category Name','wp-support-plus-responsive');?>" ><br>
	       <input type="submit" class="btn btn-success" name="create" value="<?php _e('Create New Category','wp-support-plus-responsive');?>"/>
</form>
<?php if($category_edit==1 && !(empty($category_name)) && !(empty($category_cid))) {?>
<hr>
<form id="editCategoryForm" method="post">
		   <div id="createCategoryContainer">
           <input name="editcategory" value="<?php echo $category_name; ?>"
		   class="form-control" type="text" >
		   <input name="category_cid" value="<?php echo $category_cid; ?>"type="hidden"><br>
	       <input type="submit" class="btn btn-success" name="update" value="<?php _e('Update Category','wp-business-directroy-plugin');?>"/>
		   <?php echo '<a href="'.get_bloginfo('url').'/wp-admin/admin.php?page=wpbdp-category"
		    ><span class="btn btn-primary">';
			_e('Cancle','wp-business-directroy-plugin');
			echo '</span></a>';?>

</form>
<?php } ?>
</div>
<hr>
<div class="tab-content">
	<?php
	global $wpdb;
$categories = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_categories" );
?>
<div id="catDisplayTableContainer" class="table-responsive">
	<table class="table table-striped">
		<tr>
			<th><?php _e('Category Name','wp-support-plus-responsive');?></th>
			<th><?php _e('Action','wp-support-plus-responsive');?></th>
		</tr>
		<?php foreach ($categories as $category){?>
			<tr>
				<td><?php _e($category->category_name,'wp-support-plus-responsive');?></td>
				<td>
					<?php if($category->cid!=1){?>					
					<?php echo '<a href="'.get_bloginfo("url").'/wp-admin/admin.php?page=wpbdp-category&action=editcategory&cid='.$category->cid.'" title="Delete"> <img alt="Edit" class="catEdit" title="Edit" src="'.WPBDP_PLUGIN_URL.'assets/images/edit.png"></a>';
					echo '<a href="'.get_bloginfo('url').'/wp-admin/admin.php?page=wpbdp-category&action=removecategory&cid='.$category->cid.'" title="Delete"><span style="color:red" class="glyphicon glyphicon-remove"></span><a/>';
					}?>
				</td>
			</tr>
		<?php }?>
	</table>
</div>


</div>

	</div>
</div>