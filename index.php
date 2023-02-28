<?php

/**
 * lib Funções
 * 
 * File         index.php
 * Encoding     UTF-8
 * @package     block_mailchimp
 * @version     3.0.0
 * @author      Leonardo Barreiro
 */


function block_mailchimp_user_updated_handler($event) {
	global $CFG;

	$user = new \stdClass();
	$user->id = $event->userid;