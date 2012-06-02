<?php

/**
 * Defines the PATH Constants that are required for the framework.
 */
$paths = array(
	'app'			=> '../application',	// The directory in which the application rescources are located
	'mod'			=> '../modules',		// The directory in which the modules are located
	'sys'			=> '../system',			// The directory in which the Kohana rescources are located
	'data'			=> '../data',			// The directory in which all files should be saved
	'cache'			=> '../cache',			// The directory in which the cache files will be saved
	'log'			=> '../logs',			// The directory in which the log files will be saved
);

/**
 * The default extension of resource files. If you change this, all resources
 * must be renamed to use the new extension.
 *
 * @see  http://kohanaframework.org/guide/about.install#ext
 */
define('EXT', '.php');

/**
 * Set the PHP error reporting level. If you set this in php.ini, you remove this.
 * @see  http://php.net/error_reporting
 *
 * When developing your application, it is highly recommended to enable notices
 * and strict warnings. Enable them by using: E_ALL | E_STRICT
 *
 * In a production environment, it is safe to ignore notices and strict warnings.
 * Disable them by using: E_ALL ^ E_NOTICE
 *
 * When using a legacy application with PHP >= 5.3, it is recommended to disable
 * deprecated notices. Disable with: E_ALL & ~E_DEPRECATED
 */
error_reporting(E_ALL | E_STRICT);

/**
 * End of standard configuration! Changing any of the code below should only be
 * attempted by those with a working knowledge of Kohana internals.
 *
 * @see  http://kohanaframework.org/guide/using.configuration
 */

// Set the full path to the docroot
define('DOCROOT', realpath(dirname(__FILE__)).DIRECTORY_SEPARATOR);

// Shorter version of the directory separator
define('DS', DIRECTORY_SEPARATOR);

// Make the paths relative to the docroot, for symlink'd index.php
foreach ($paths as $name => $path) {
	if ( ! is_dir($path) AND is_dir(DOCROOT.$path))
		$path = DOCROOT. $path;

	define(strtoupper($name) . 'PATH', realpath($path) . DS);
}


// Clean up the configuration vars
unset($paths);

/**
 * Define the start time of the application, used for profiling.
 */
if ( ! defined('KOHANA_START_TIME'))
{
	define('KOHANA_START_TIME', microtime(TRUE));
}

/**
 * Define the memory usage at the start of the application, used for profiling.
 */
if ( ! defined('KOHANA_START_MEMORY'))
{
	define('KOHANA_START_MEMORY', memory_get_usage());
}

// Bootstrap the application
require APPPATH.'bootstrap'.EXT;

