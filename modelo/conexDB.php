<?php

define('DB_HOST', 'localhost'); 
define('DB_NAME', 'nomina_db');
define('DB_USER', 'root'); 
define('DB_PASS', ''); 

try {
    $conexdb = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    $conexdb ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexdb ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

return $conexdb ;