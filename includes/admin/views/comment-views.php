<?php
                $where="";
                $allcomment="";
                if(isset($_GET['listing_id'])){
                    $where=" AND c.listing_id=".$_GET['listing_id'];
                    $allcomment='<a href="'.get_permalink().'?page=wpbdp-comments"><span class="label label-success">View All Comments</span></a>';
                    $selectedlisting="&listing_id=".$_GET['listing_id'];
                }else{
                    $selectedlisting="";
                }
               
		global $wpdb;
		$listings = $wpdb->get_results( "SELECT c.comment,c.status,c.view_name,c.listing_id,c.create_date,c.id,c.status,l.business_name FROM {$wpdb->prefix}wpbdp_comment c,{$wpdb->prefix}wpbdp_listing l where c.listing_id=l.id $where" );                
                
                echo $allcomment; ?>
<div class="panel panel-primary wpsp_admin_panel" >
	<div class="panel-heading">
		    <h3 class="panel-title"><span class="glyphicon glyphicon-comment" aria-hidden="true"> <?php _e('Comments','wp-business-directroy-plugin');?></h3>
    </div>

    <div class="panel-body">
            <div class="form">
                               
                <div class="table-responsive">
                   <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                              
                                
                <table class="table table-striped table-bordered table-hover display" id="example">
                <thead>
		<tr>
     		<th style="text-align:center"><?php _e('Sr.No','wp-support-plus-responsive');?> </th>
			<th><?php _e('Listings Name & Comment','wp-support-plus-responsive');?>  </th>
			<th><?php _e('Status','wp-support-plus-responsive');?> </th>			
			<th><?php _e('Detail','wp-support-plus-responsive');?></th>
		</tr>
                </thead>
                 <tbody>
		<?php
		$i=0;
                $srno=1;
		foreach ($listings as $listing){?>
			<tr>
     			<td style="text-align:center"><?php _e($srno,'wp-business-directroy-plugin');++$i;?></td>
				<td>
                                    <a href="<?php echo "".$_SERVER['PHP_SELF']."?page=wpbdp-edit-listing&edit_listing_id=$listing->listing_id&edit=Edit"; ?>">
                                        <?php _e($listing->business_name,'wp-business-directroy-plugin');?></a><br>			                                    
                                        <?php _e($listing->comment,'wp-business-directroy-plugin');?>
                                        <br><br>
                                <a href="<?php echo "".$_SERVER['PHP_SELF']."?page=wpbdp-comments&edit_comment_id=$listing->id&edit=delete$selectedlisting"; ?>"><span style="color:red" class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span> Delete </a>
                                 <?php if($listing->status=="Pending"){ ?>
                                <a href="<?php echo "".$_SERVER['PHP_SELF']."?page=wpbdp-comments&edit_comment_id=$listing->id&edit=Publish$selectedlisting"; ?>"><span style="color:green" class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span> Approve </a>
                                 <?php } if($listing->status=="Publish"){ ?>
                                <a href="<?php echo "".$_SERVER['PHP_SELF']."?page=wpbdp-comments&edit_comment_id=$listing->id&edit=Pending$selectedlisting"; ?>"><span style="color:orange" class="glyphicon glyphicon-ban-circle" aria-hidden="true"></span> Unapprove </a>
                                 <?php } ?>
                                </td>				
				<td><?php _e($listing->status,'wp-business-directroy-plugin');?></td>
				<td style="text-align:center"><?php _e($listing->view_name,'wp-business-directroy-plugin');?>
                                    <br>
                                    <?php _e($listing->create_date,'wp-business-directroy-plugin');?>
                                </td>	
                               
                                 
				
			</tr>
		<?php
                $srno++;
		;
		}?>
                </tbody>
                 
	</table>
                        </div>
                     </div>
                       
</div>

	</div>

</div>

