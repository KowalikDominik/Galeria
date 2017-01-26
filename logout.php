<?php
session_start();
$_SESSION['auth'] = FALSE;
header("Location: index.php");
?>