<?php
	
	  try
	  {
		  $servername = "localhost";
		  $user = "root";
		  $pass = "";
		  $dbname = "hacka";
		  $dns="mysql:host=$servername;dbname=$dbname;charset=utf8";
		  $connect = new PDO($dns,$user,$pass);
		  
		  return $connect;		 
	  }
	  catch(PDOException $error)
	  {
		 $connect = "errorinconnecttodatabase";
		 return $connect;
	  }	  	  	
?>