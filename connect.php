<?php
$server = 'localhost';
$user = 'root';
$password = '';
$db = 'e_waste';

$connect = mysqli_connect($server,$user,$password,$db);
if(!$connect){
	echo "Connection unsuccessful";
}/*else{
	echo "Connection unsuccessful";
}
$sql = "CREATE DATABASE e_waste";
$result = mysqli_query($connect,$sql);
if($result){
	echo "Database created successfully";
}else{
	echo "Database not created succesfully";
}*/
?>