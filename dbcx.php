<?php
if ( get_magic_quotes_runtime() ) {
	throw new Exceptions('Magic quotes runtime är på. Applikationens databasfunktioner kräver att de är av.');
}
require_once "get-setting.php";

function dbcx() {
	/**
	* Felmedelanden
	*/
	$E_BAD_PARAMETER = 'dbcx anropad med felaktig parameter: %s.';
	$E_UNSUP_DRIVER = 'Stöd saknas ännu i applikationen för denn driver %s';
	/**	
	*PDO-objekt för uppkoppling
	*/
static $db;
	if ( !is_null($db) ) {
		return $db;
}
$dsn = get_setting("dsn");

$dbuser = $dsn['username'];
$dbpass = $dsn['password'];
$dsn = "{$dsn['phptype']}:host={$dsn['hostspec']};dbname={$dsn['database']}";
try {
	$db = new PDO ($dsn, $dbuser, $dbpass);
	if ( empty($db) ) {
		throw new Exception("PDO kunde inte instansieras, uppkoppling misslyckad");
}
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if ( $db->getAttribute(PDO::ATTR_DRIVER_NAME) != 'mysql' ) {
	throw new Exception(sprintf($E_USDUP_DRIVER, $db->getAttribute(PDO::ATTR_DRIVER_NAME)));
}


$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

$charset_sql = " SET NAMES 'UTF8' COLLATE 'utf8_swedish_ci'";
$db->query($charset_sql);

$dbtime = get_setting('dbtime');
$ts_sql = "SET time_zone = '$dbtime'";
$svar 	= $db->query($ts_sql);

$mode_sql = "SET SESSION sql_mode = 'STRICT_ALL_TABLES,NO_ZERO_DATE,NO_ZERO_IN_DATE'";
	$svar = $db->query($mode_sql);
}
catch(Exception $e) {
	echo "<pre>";
	var_dump($e);
	echo "<hr />";
	var_dump($db);
	echo "<hr />";
	var_dump($dsn);
	echo "<hr />";
	exit;
}
	return $db;
}















?>
