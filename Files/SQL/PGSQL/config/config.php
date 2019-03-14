<?php
   $host        = "host = localhost";
   $port        = "port = 5432";
   $dbname      = "dbname = ijk";
   $credentials = "user = abc password=xyz";

   $db = pg_connect( "$host $port $dbname $credentials"  );
   if(!$db) {
      echo "Error : Unable to open database\n";
      exit;
   } else {
      echo "1. Opened database successfully\n";
   }
?>