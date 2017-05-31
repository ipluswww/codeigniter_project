<?php
function asset_url(){
   return base_url().'assets/';
}

function is_logged_user() {
	$CI =& get_instance();
    	// We need to use $CI->session instead of $this->session
    	$user_id = $CI->session->userdata('user_id');
	
	if(empty($user_id))
		return false;
	
	return true;
}