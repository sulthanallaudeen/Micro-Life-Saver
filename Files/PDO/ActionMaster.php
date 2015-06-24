<?php
	#Added Credentials
	$Credentials = "mysql:host=localhost;dbname=test";
	#Added Exceptions
	$Options = array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
	#Establishing Connection
	$Connection = new PDO($Credentials,'root','', $Options);
	#Declaring Table Name
	$TableName = 'sysaxiom';
	#Declaring Table Attributes and Creation of Table Creation Query
	$SQLQuery ="CREATE table $TableName(
	     ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY,
	     Name VARCHAR( 250 ) NOT NULL,
	     Email VARCHAR( 150 ) NOT NULL, 
	     City VARCHAR( 150 ) NOT NULL)";
	#Firing the Table Creation Query
	$Connection->exec($SQLQuery);
    #Preparing Statement
    $Trigger = $Connection->prepare("INSERT INTO sysaxiom (Name, Email, City) VALUES (?, ?, ?)");
    #Binding the Parameter
	$Trigger->bindParam(1, $Name);
	$Trigger->bindParam(2, $Email);
	$Trigger->bindParam(3, $City);
	$Name = 'Sulthan';
	$Email = 'sa@sysaxiom.com';
	$City = 'Chennai';
	#Executing the Trigger
	$Trigger->execute();
	#Selecting the Rows Created so far
	   foreach($Connection->query('SELECT * from sysaxiom') as $Row) {
	#Printing the Result
        print_r($Row);
    }
	#Disconnecting the DB Connection
	$Connection = null;
?>
