<?php
function log_user_in($user_data){
	
	//print_r($user_data);
	print_r($this->session->all_userdata());
	$this->session->set_userdata("usr", "me");
	//redirect('users/def_page');
}
