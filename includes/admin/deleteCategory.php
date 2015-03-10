<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 
global $wpdb;
		
	$wpdb->delete($wpdb->prefix.'wpbdp_categories',array('cid'=>$_POST['cat_id']));?>