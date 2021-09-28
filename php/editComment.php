<?php
include 'db.php';

$field= $_POST['field'];
$value = $_POST['value'];
$id = $_POST['id'];

$query = mysqli_query($link,"update Itog set comment='".$value."' where idItog = ".$id.";");
