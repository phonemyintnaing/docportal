<?php
if (!defined('ACCESS')) die('No direct script access allowed!');

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'phone');
define('DB_NAME', 'wms');

$conn = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
if (!$conn)	die('Server not connected');

$db = mysql_select_db(DB_NAME);
if (!$db)	die('Database not exist');