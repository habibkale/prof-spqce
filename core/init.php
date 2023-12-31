<?php
session_start();

// Configuration settings
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'school'
    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => '604800'
    ),
    'session' => array(
        'session_name' => 'students',
        'token_name' => 'token'
    )
);

// Autoload classes
spl_autoload_register(function ($class) {
    // Update the path to match your actual directory structure
    // Use DIRECTORY_SEPARATOR for cross-platform compatibility
    $classPath = '..' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . $class . '.php';
    
    if (file_exists($classPath)) {
        require_once $classPath;
    }
});

// Include sanitize functions
require_once '../functions/sanitize.php';

?>
