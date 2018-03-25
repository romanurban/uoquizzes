<?php

class Connection {
	private static $instance = NULL;

	public static function getInstance() {
		if (!isset(self::$instance)) {
			define("root",$_SERVER['DOCUMENT_ROOT']);
			$config = parse_ini_file(root."/api-server/dbConfig.ini");

			self::$instance = new PDO("mysql:host={$config['db_host']}; dbname={$config['db_name']}", $config['db_user'], $config['db_pass']);
			self::$instance->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
		return self::$instance;
	}
}

?>