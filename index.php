<?php

/**
 * lib Funções
 * 
 * File         index.php
 * Encoding     UTF-8
 * @package     block_mailchimp
 * @version     3.5.0
 * @author      Leonardo Barreiro
 */


function block_mailchimp_user_updated_handler($event) {
	global $CFG;

	$user = new \stdClass();
	$user->id = $event->userid;
    	
    // Nada acontecerá se o plugin estiver desconfigurado

	if (!isset($CFG->block_mailchimp_apicode) ||
    !isset($CFG->block_mailchimp_listid) ||
    !isset($CFG->block_mailchimp_linked_profile_field)) {
    print_error('missing_config_settings', 'block_mailchimp');
    return;
}

$mcprofiledata = block_mailchimp_get_profile_data($user);
$mcinternaldata = block_mailchimp_get_internal_user($user);

// Compara profile and internal status da inscrição
if (!$mcprofiledata->data == $mcinternaldata->registered) {
       $updateinternalstatus = block_mailchimp_update_subscription_internal($user, $mcprofiledata->data);
}

}
