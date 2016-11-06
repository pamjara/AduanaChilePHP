<?php
session_start();
if(!isset($_SESSION["Nombre"])){
     header("location:login.php");
}
?>