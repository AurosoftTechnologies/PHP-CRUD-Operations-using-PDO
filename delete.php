<?php
require_once("include/config.php");
$pdo_statement=$conn->prepare("delete from books where id=" . $_GET['id']);
$pdo_statement->execute();
header('location:book_list.php');
?>