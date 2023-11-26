<?php 
session_start();
if(isset($_SESSION['account']) && isset($_SESSION['password'])){
    session_unset();
    header("location:../index.php");
}
?>