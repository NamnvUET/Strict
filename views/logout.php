<?php
session_start();
unset($_SESSION["LOGIN_USER"]);
header('Location: login.php');

?>