<?php

   		 $serverName = "vidafeu.database.windows.net"; 
		$uid = "vidafeu";   
		$pwd = "sqlpassword";  
		$databaseName = "Vidainternational123"; 

		$connectionInfo = array( "UID"=>$uid,"PWD"=>$pwd,"Database"=>$databaseName); 

		/* Connect using SQL Server Authentication. */  
		$conn = new sqlsrv_connect( $serverName, $connectionInfo);  
?>