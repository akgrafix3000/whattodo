<?php

// Database configuration
$db_host = '127.0.0.1';
$db_port = '3400';
$db_name = 'tiffingerundthiel';
$db_user = 'root';
$db_pass = '';

// Create connection
$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);