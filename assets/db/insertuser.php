<?php
require 'dbConnect.php';
$conn = OpenCon();
$hashPass = password_hash($_POST['password'],PASSWORD_DEFAULT);
$insertusersql = "INSERT INTO  nhif_userdetails(name,email,phonenumber,password,usertype) VALUES('$_POST[fullname]','$_POST[emailaddress]', '$_POST[phonenumber]','$hashPass','$_POST[selectionx]')";
$conn->query($insertusersql);
session_start();
$_SESSION['newAccount'] = 'TRUE';
header("Location: ../../login.php");
die();
 ?>
