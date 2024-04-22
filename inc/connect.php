<?php 


$username = "kali";
$password = 'Home123Test';

try {
  $con = new PDO("mysql:host=localhost;dbname=project", $username, $password);
  
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo  $e->getMessage();
}
