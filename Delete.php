<?php
include("DBConnection.php");

$idBook=$_POST["id_book"];

//Define the query
$query = "DELETE FROM book_info WHERE id_book=$idBook";

mysqli_query($db,$query);

header('location:display.php');
?>
