<?php
include("DBConnection.php");
session_start();
$idSession = $_SESSION["id"];
$id_user=$_POST["id_user"];
$brand=$_POST["brand"];
$model=$_POST["model"];
$reference=$_POST["reference"];
$variant=$_POST["variant"];
$price=$_POST["price"];
$current_price=$_POST["current_price"];
echo $idSession;

$query = "insert into book_info(id_user,brand,model,reference,variant,price,current_price) values('$idSession','$brand','$model','$reference','$variant','$price','$current_price')"; //Insert query to add book details into the book_info table
$result = mysqli_query($db,$query);
header('location:display.php');
?>
