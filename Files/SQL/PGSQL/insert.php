<?php
include('config/config.php');
$table_name = "airport_master";
for ($i=0; $i < ; $i++) { 
    $query = "INSERT INTO  ".$table_name."(id,code, name) VALUES (141,'abd','alpha')";
    $ret = pg_query($db, $query);
    if(!$ret) {
        echo pg_last_error($db);
        exit;
    } else {
        echo "Records created successfully\n";
    }
    pg_close($db);
}


?>