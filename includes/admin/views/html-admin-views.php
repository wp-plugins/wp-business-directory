   <div class="row">
        <div class="col-lg-12">
       
           <?php //listing status chart
		global $wpdb;
                $overview_html="";
                $status_chart="";
                $srcnt=1;
                $paidsrcnt=1;
		$listings_status = $wpdb->get_results("SELECT YEAR(created_date) as year,status,count(YEAR(created_date)) as count FROM {$wpdb->prefix}wpbdp_listing group by YEAR(created_date),status");       
		$status_chart="";                
                     $overview_html.="<table class='table table-bordered'><th class='info'><td class='info'>";
                     $overview_html.="Year";
                     $overview_html.="</td><td class='info'>";
                     $overview_html.="Count";
                     $overview_html.="</td><td class='info'>";
                     $overview_html.="Satus";
                     $overview_html.="</td></th>";
                    foreach ($listings_status as $new_listing_status){
                     $overview_html.="<tr><td>";
                     $overview_html.=$srcnt++;
                     $overview_html.="</td><td>";
                     $overview_html.="$new_listing_status->year";
                     $overview_html.="</td><td>";
                     $overview_html.="$new_listing_status->count";
                     $overview_html.="</td><td>";
                     $overview_html.="$new_listing_status->status";
                     $overview_html.="</td></tr>";                    
                    }
                 $overview_html.="</table>";                  
                ?>    
        <?php //paid listing status chart
		global $wpdb;
                $paid_list="";
                $paid_status_chart="";                
		$paid_listings_status = $wpdb->get_results("SELECT YEAR(created_date) as year ,is_paid,count(YEAR(created_date)) as count FROM {$wpdb->prefix}wpbdp_listing group by YEAR(created_date),is_paid");       
                $paid_status_chart.="data: ["; 
                
                $newary=array();
                foreach ($paid_listings_status as $paid_listings_status){
                     if($paid_listings_status->is_paid==1)
                     {                       
                        $newary[$paid_listings_status->year]['year']=$paid_listings_status->year;
                        $newary[$paid_listings_status->year]['paidcount']=$paid_listings_status->count;
                        
                     }  else {                        
                        $newary[$paid_listings_status->year]['year']=$paid_listings_status->year;
                        $newary[$paid_listings_status->year]['unpaidcount']=$paid_listings_status->count;
                     }
                 }
	       
                $chart_data="";
                $newary_html=array();
                $newary_html=$newary;
                foreach($newary as $newary){
                    $chart_data.="{";
                    $chart_data.="y: '".$newary['year']."',";
                    if(isset($newary['paidcount'])){
                        $chart_data.="a: ".$newary['paidcount'].",";
                    }else{
                         $chart_data.="a: 0,";
                    }
                    if(isset($newary['unpaidcount'])){
                        $chart_data.="b: ".$newary['unpaidcount'].",";
                    }else{
                         $chart_data.="b: 0,";
                    }                    
                    $chart_data.="},";
                }
                $paid_status_chart.=$chart_data;
                $paid_status_chart.="],";                
                
               
                $paid_overview_html="";
                $paid_overview_html.="<table class='table table-bordered'><th class='info'><td class='info'>";
                     $paid_overview_html.="Year";
                     $paid_overview_html.="</td><td class='info'>";
                     $paid_overview_html.=" Paid Count";
                     $paid_overview_html.="</td><td class='info'>";
                     $paid_overview_html.="Unpaid Count";
                     $paid_overview_html.="</td></th>";
                    foreach ($newary_html as $newary){
                     $paid_overview_html.="<tr><td>";
                     $paid_overview_html.=$paidsrcnt++;
                     $paid_overview_html.="</td><td>";
                     $paid_overview_html.=$newary['year'];
                     $paid_overview_html.="</td><td>";
                      if(isset($newary['paidcount'])){
                       $paid_overview_html.=$newary['paidcount'];
                      }else{
                           $paid_overview_html.=0;
                      }
                     $paid_overview_html.="</td><td>";
                     if(isset($newary['unpaidcount'])){
                     $paid_overview_html.=$newary['unpaidcount'];
                     }else{
                         $paid_overview_html.=0;
                     }
                     $paid_overview_html.="</td></tr>";                    
                    }
                 $paid_overview_html.="</table>"; 
         
    ?>
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-usd" data-placement="top" title="Show paid and unpaid listing graph(Pro Feature)" aria-hidden="true"></span> Paid Listing Chart                         </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">              
                            <div id="morris-bar-chart"></div>
                               <div>
                                Paid Listing Chart : Count(y-axis) and Year(x-axis).
                               </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
               
           
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-tag" data-placement="top" title="Show listing categories and count" aria-hidden="true"></span> Listing Categories
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="morris-donut-chart"></div>
                            <div>
                              Listing Categories : This chart show listing categories and it's count.
                               </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                 <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-plus-sign" data-placement="top" title="Show New added listing graph with respective year" aria-hidden="true"></span> New added listing
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div id="myfirstchart"></div>
                            <div>
                                    New added listing : This chart show new listing count(y-axis) and year(x-axis).
                               </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <?php
                $listings_highest_user = $wpdb->get_results("SELECT user_id, COUNT(user_id) as CustomerRowCount
                                                        FROM {$wpdb->prefix}wpbdp_listing
                                                        GROUP BY user_id
                                                        ORDER BY COUNT(user_id) DESC
                                                        LIMIT 1");       
                if(isset($listings_highest_user[0]->CustomerRowCount)){
		$CustomerRowCount=$listings_highest_user[0]->CustomerRowCount;
                }  else {
                  $CustomerRowCount=0;
                }
                if(isset($listings_highest_user[0]->user_id)){
		$CustomerId=$listings_highest_user[0]->user_id;
                }  else {
                  $CustomerId="No";
                }
                
                $listings_highest_cid = $wpdb->get_results("SELECT c.cid,lc.category_name, COUNT(c.cid) as cidRowCount
                                                            FROM {$wpdb->prefix}wpbdp_listing_categories c,{$wpdb->prefix}wpbdp_categories lc WHERE lc.cid=c.cid
                                                            GROUP BY c.cid
                                                            ORDER BY COUNT(c.cid) DESC
                                                            LIMIT 1");       
                if(isset($listings_highest_cid[0]->cidRowCount)){
		$cidRowCount=$listings_highest_cid[0]->cidRowCount;
                }  else {
                  $cidRowCount=0;
                }
                if(isset($listings_highest_cid[0]->user_id)){
		$CatId=$listings_highest_cid[0]->user_id;
                }  else {
                  $CatId="No";
                }
                
                if(isset($listings_highest_cid[0]->category_name)){
		$CatName=$listings_highest_cid[0]->category_name;
                }  else {
                  $CatName="No";
                }
                
                //comment count
                
                $listings_highest_user = $wpdb->get_results("SELECT listing_id, COUNT(listing_id) as listing_idRowCount
                                                        FROM {$wpdb->prefix}wpbdp_comment
                                                        GROUP BY listing_id
                                                        ORDER BY COUNT(listing_id) DESC
                                                        LIMIT 1");       
                if(isset($listings_highest_user[0]->listing_idRowCount)){
		$listing_idRowCount=$listings_highest_user[0]->listing_idRowCount;
                }  else {
                  $listing_idRowCount=0;
                }
                if(isset($listings_highest_user[0]->listing_id)){
		$listing_Id=$listings_highest_user[0]->listing_id;
                }  else {
                  $listing_Id="No";
                }
                ?>
                
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> Top Listings
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table class='table table-bordered'>
                                <th class='info'>                              
                                <td class='info'></td>
                                <td class='info'></td>
                                </th>
                                <tr>
                                <td><span class="glyphicon glyphicon-star" data-placement="top" title="Show Top rated listing and avarage rating (Pro Feature)" aria-hidden="true"></span></td>    
                                <td> Top Rated Listing </td>
                                <td>No</td>
                                </tr>
                                <tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-star-empty" data-placement="top" title="Show highest rated listing (Pro Feature)" aria-hidden="true"></span></td>    
                                <td> Highest Rating Listing </td>
                                <td>No</td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-comment" data-toggle="tooltip" data-placement="top" title="Show top commented listing count" aria-hidden="true"></span></td>
                                <td> Top Listing by comment </td>
                                <td><?php echo "Listing ID : $listing_Id (Count:$listing_idRowCount)" ?></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-user" data-placement="top" title="Show User ID and listing count who has submit Highest Listing" aria-hidden="true"></span></td>   
                                <td> Highest Listings (User ID) </td>
                                <td><?php echo "$CustomerId (Listing count:$CustomerRowCount)" ?></td>
                                </tr>
                                <tr>
                                <td><span class="glyphicon glyphicon-tag" data-placement="top" title="Show category name which has Highest Listing count" aria-hidden="true"></span></td>
                                <td> Top Category</td>
                                <td><?php echo "$CatName (Count:$cidRowCount)"?></td>
                                </tr>
                           </table>
                        
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
   </div>
   </div>
<div class="row">
<div class="col-lg-12">
    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Listing Overview
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
    <div class="col-lg-6">
        <h4><span class="label label-info">Listing Status</span></h4>
                            
                         <?php echo $overview_html ?>
                </div>
    <div class="col-lg-6">
        <h4><span class="label label-info">Listing Paid Status</span></h4>
                            
                        <?php echo $paid_overview_html ?>
                    <!-- /.panel -->
                </div>            
         </div>
                        <!-- /.panel-body -->
      </div>
   </div>
</div>
   <?php
		global $wpdb;
		$clistings = $wpdb->get_results("SELECT lc.category_name,count(c.cid) as lcat_count FROM  {$wpdb->prefix}wpbdp_listing as l , {$wpdb->prefix}wpbdp_listing_categories as c,{$wpdb->prefix}wpbdp_categories as lc WHERE c.cid=lc.cid AND l.id=c.listing_id group BY c.cid");       
		$chart="";
			
               			
			$chart=' Morris.Donut({
                                    element: "morris-donut-chart",
                                    data: [';
                                            foreach ($clistings as $clisting){
                                       $chart.='{label: "'.$clisting->category_name.'",
                                        value: '.$clisting->lcat_count.'
                                    },';
                                            }
                                            $chart.='],
                                    resize: true
                                });';

		?>
   
 <?php //new added listing chart
		global $wpdb;
                $new_added_chart="";
		$listings_added_count = $wpdb->get_results("SELECT YEAR(created_date) as year,count(YEAR(created_date)) as count FROM {$wpdb->prefix}wpbdp_listing group by YEAR(created_date)");       
		$new_added_chart="data: [";
                    foreach ($listings_added_count as $listings_added){
                   $new_added_chart.=" { year: '$listings_added->year', value: $listings_added->count },";
                    }
                   $new_added_chart.="],";
                ?>
 
<div style="clear:both"></div>
                <script>
                    $(function() {
new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'myfirstchart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  <?php echo $new_added_chart ?>
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['New listings']
});
   
   <?php echo $chart ?>

    Morris.Bar({
        element: 'morris-bar-chart',
        <?php echo $paid_status_chart ?>
        xkey: 'y',
        ykeys: ['a', 'b'],
        labels: ['Paid', 'Unpaid'],
        hideHover: 'auto',
        resize: true
    });

});

 $(function () {
  $('[data-toggle="tooltip"]').tooltip();
})

                </script>