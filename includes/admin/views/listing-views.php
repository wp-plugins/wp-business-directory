
<?php echo '<div><a href="'.get_permalink().'?page=wpbdp-add-new-listing"
		    ><span class="btn btn-success">';
			_e('Create New Listing','wp-business-directroy-plugin');
			echo '</span></a></div><hr>';?>

<div class="panel panel-primary wpsp_admin_panel" >
	<div class="panel-heading">
		    <h3 class="panel-title"><?php _e('Listings','wp-business-directroy-plugin');?></h3>
    </div>

    <div class="panel-body">
		 
		<?php
		global $wpdb;
		$listings = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_listing" );                
                
		?>
            <div class="form">
                               
                <div class="table-responsive">
                   <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                              
                                
                <table class="table table-striped table-bordered table-hover display" id="example">
                <thead>
		<tr>
     		<th style="text-align:center"><?php _e('Listing ID','wp-support-plus-responsive');?> <span class="glyphicon glyphicon-sort" aria-hidden="true"></span></th>
			<th><?php _e('Listings Name','wp-support-plus-responsive');?>  <span class="glyphicon glyphicon-sort" aria-hidden="true"></span></th>
			<th><?php _e('Category','wp-support-plus-responsive');?> <span class="glyphicon glyphicon-sort" aria-hidden="true"></span></th>
			<th><?php _e('Status','wp-support-plus-responsive');?> <span class="glyphicon glyphicon-sort" aria-hidden="true"></span></th>
			<th style="text-align:center"><?php _e('User id','wp-support-plus-responsive');?> <span class="glyphicon glyphicon-sort" aria-hidden="true"></span></th>
			<th><?php _e('Action','wp-support-plus-responsive');?></th>
		</tr>
                </thead>
                 <tbody>
		<?php
		$i=0;
		foreach ($listings as $listing){?>
			<tr>
     			<td style="text-align:center"><?php _e($listing->id,'wp-business-directroy-plugin');++$i;?></td>
				<td><?php _e($listing->business_name,'wp-business-directroy-plugin');?></td>
				<td><?php 
                                global $wpdb;
		                $listing_categorys = $wpdb->get_results( "SELECT c.category_name FROM {$wpdb->prefix}wpbdp_listing_categories lc,{$wpdb->prefix}wpbdp_categories c where c.cid=lc.cid AND listing_id=$listing->id" );                                
                                $listing_categorys_count=count($listing_categorys);
                                $cidcnt=1;
                                foreach ($listing_categorys as $listing_category){                                    
                                    if($listing_categorys_count>1 && $cidcnt>1){
                                         echo ", ";
                                    }
                                     _e($listing_category->category_name,'wp-business-directroy-plugin');                                     
                                    $cidcnt++;
                                }
                                ?>
                                
                                </td>
				<td><?php _e($listing->status,'wp-business-directroy-plugin');?></td>
				<td style="text-align:center"><?php _e($listing->user_id,'wp-business-directroy-plugin');?></td>	
                                <td><a href="<?php echo "".get_permalink()."?page=wpbdp-edit-listing&edit_listing_id=$listing->id&edit=Edit"; ?>">EDIT</a></td>
                                 
				
			</tr>
		<?php
		;
		}?>
                </tbody>
                 
	</table>
                        </div>
                     </div>
                       
</div>

	</div>

</div>

