<?php 

	/**
	 * Environments
	 */
	 
	$config['environments']	= array(
		// 'staging.yourwebsite.co.uk' => 'staging'
	);

	/**
	 * Debug
	 */

	$config['debug']           = true;
	
	/**
	 * Error reporting
	 */
	
	$config['display_errors']  = true;
	$config['error_reporting'] = E_ALL ^ E_NOTICE;

	/**
	 * Database connection details
	 */

	$config['database']['host'] = 'localhost';
	$config['database']['user'] = 'root';
	$config['database']['pass'] = 'root';
	$config['database']['db']   = '';

	/**
	 * Defaults
	 */
	
	$config['defaults']['view']['header'] = STATIC_DIR.'/inc/header.php';
	$config['defaults']['view']['footer'] = STATIC_DIR.'/inc/footer.php';

?>