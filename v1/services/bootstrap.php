
<?php
/* +--------------------------------------------------------+
|   File: bootstrap.php   									|
|   Description: Initialization file for Zend Frame work    |
|                                                           |
|	Created On:                                             |
|     27-Jul-2015: by Venkat                      			|
|                                                           |
+-----------------------------------------------------------+ */
	error_reporting(-1);
	spl_autoload_unregister("AutoLoader::autoLoad");


	$include_dir[] = get_include_path();
	$include_dir[] = ".";
	$include_dir[] = "../";
    $include_dir[] = dirname(__FILE__);
    $include_dir[] = dirname(__FILE__) . DIRECTORY_SEPARATOR . "../";
    //$include_dir[] = dirname(__FILE__) . DIRECTORY_SEPARATOR . "models";
    $include_dir[] = dirname(__FILE__) . DIRECTORY_SEPARATOR . "../../ZendFramework-1.11.2/library";
    set_include_path(implode(PATH_SEPARATOR,  $include_dir));
	
	//echo get_include_path();

	require_once("Zend/Loader.php");

	//---------------------------------- DB
/*
	require_once(dirname(__FILE__)."/services/classes/db/dbconfig.php");
	
	Zend_Loader::loadClass("Zend_Db");
	Zend_Loader::loadClass("Zend_Db_Table");
	
	$params = array (
		'host'		=> DBSERVER,
		'username'	=> DBUSER,
		'password'	=> DBPASSWORD,
		'dbname'	=> DATABASE
	);


	$pregnancyDbParams = array (
		'host'		=> DBSERVER,
		'username'	=> DBUSER,
		'password'	=> DBPASSWORD,
		'dbname'	=> PREGNANCY_DATABASE
	);
*/
	try{
		/*
		$db = Zend_Db::factory('PDO_MYSQL', $params);
		$db->query("SET CHARACTER SET 'utf8'");
		Zend_Db_Table::setDefaultAdapter($db);
		$db->getProfiler()->setEnabled(true);
		$profiler = $db->getProfiler();
		*/
/*
		$pregnancyDb = Zend_Db::factory('PDO_MYSQL', $pregnancyDbParams);
		$pregnancyDb->query("SET CHARACTER SET 'utf8'");
		Zend_Db_Table::setDefaultAdapter($pregnancyDb);
		$pregnancyDb->getProfiler()->setEnabled(true);
		$pregnancyProfiler = $pregnancyDb->getProfiler();
*/
	}catch(Exception $e){
		echo "Exception: ". $e->getMessage();
	}
	
	//---------------------------------- Log
/*
	Zend_Loader::loadClass("Zend_Log");
	Zend_Loader::loadClass("Zend_Log_Writer_Stream");

	$logFilePath = dirname(__FILE__) .'/logs/services_'.date("Y-m-d").'.log';
	//$logLevel	 = Zend_Log::DEBUG; // ERR / WARN / NOTICE / INFO / DEBUG 
	$logLevel	 = Zend_Log::INFO; 


	$logger = new Zend_Log();
	$writer = new Zend_Log_Writer_Stream($logFilePath);  // log file path
	$logger->addWriter($writer);

	$format = date("Y-m-d H:i:s").' [%priorityName%]: %message%' . PHP_EOL;
	$formatter = new Zend_Log_Formatter_Simple($format);
	$writer->setFormatter($formatter);

	$filter = new Zend_Log_Filter_Priority($logLevel); 
	$logger->addFilter($filter);
	chmod($logFilePath, 0664);

	Zend_Loader::loadClass("Zend_Registry");
	Zend_Registry::set('LOGGER', $logger);
	Zend_Registry::set('DB', $db);
	Zend_Registry::set('PROFILER', $profiler);
*/

	//---------------------------------- config
