<<?php 
session_start();

isset($_SESSION['login']) ? header('Location: home.php') : header('Location: login.php');

?>