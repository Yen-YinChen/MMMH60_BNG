<?php
session_start();

unset($_SESSION['user']);
$referPage = $_SERVER['HTTP_REFERER'];
header('Location: ' . $referPage);
?>