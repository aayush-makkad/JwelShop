<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'id6910946_root_access');
   define('DB_PASSWORD', 'aayu@sh1');
   define('DB_DATABASE', 'id6910946_all_data');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE)or die("config faile!");
?>