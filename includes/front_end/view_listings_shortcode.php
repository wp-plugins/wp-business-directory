
<?php 
            $return.='<div class="panel panel-primary wpsp_admin_panel" >
                    <div class="panel-heading">
                                <h3 class="panel-title">My Listings</h3>
                   </div>

                <div class="panel-body">';
		 
		
		global $wpdb;
                $current_user_id=get_current_user_id();
		$listings = $wpdb->get_results( "SELECT * FROM {$wpdb->prefix}wpbdp_listing WHERE user_id=$current_user_id");                
                
		
            $return.='<div class="form">
                               
                <div class="table-responsive">
                   <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline" role="grid">
                              
                                
                <table class="table table-striped table-bordered table-hover display" id="example">
                <thead>
		<tr>';
            
     		$return.='<th style="text-align:center">ID</th>
			<th>Listings Name</span></th>
			<th style="width:35%">Category</th>
                        <th style="width:18%">Status</th>			
		</tr>
                </thead>
                 <tbody>';
		
		$i=0;
		foreach ($listings as $listing){
			$return.='<tr>
     			<td style="text-align:center">'.$listing->id.'</td>';
				$return.='<td><a href="'.$permalinksymbolt.'edit_listing=edit_listing&edit_listing_id='.$listing->id.'&edit=Edit">'.$listing->business_name.'</a></td>';
				$return.='<td style="width:35%">';
                                     
                                global $wpdb;
		                $listing_categorys = $wpdb->get_results( "SELECT c.category_name FROM {$wpdb->prefix}wpbdp_listing_categories lc,{$wpdb->prefix}wpbdp_categories c where c.cid=lc.cid AND listing_id=$listing->id" );                                
                                $listing_categorys_count=count($listing_categorys);
                                $cidcnt=1;
                                foreach ($listing_categorys as $listing_category){                                    
                                    if($listing_categorys_count>1 && $cidcnt>1){
                                         $return.=", ";
                                    }
                                     $return.=$listing_category->category_name;                                     
                                    $cidcnt++;
                                }                                
                                
                                $return.='</td>';
				$return.='<td style="width:18%">'.$listing->status.'</td>';				
                                
                                 
				
			$return.='</tr>';;
		$i++;}
                $return.='</tbody>
                 
	</table>
                        </div>
                     </div>
                       
</div>

	</div>

</div>';