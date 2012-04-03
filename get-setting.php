<?php
function get_setting($name) {
	static $settings;
	if ( !empty($settings) ) {
	if ( array_key_exists($name, $settings) ) {
		return $settings[$name];
	} else {
	return null;
	}
}

$settings['dsn'] = array(
	'phptype' 	=> 'mysql',
	'hostspec' 	=> 'localhost',
	'database'	=> 'te-12-kristoffer',
	'username'	=> 'te-12-kristoffer',
	'password' 	=> 'bbc3d30897'
);
	$settings['dbtime'] = 'Europe/Stockholm';
	return $settings[$name];
}
?>
