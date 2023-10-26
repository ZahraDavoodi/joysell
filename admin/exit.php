<?php
session_start();
session_destroy();
ob_start();
header('Location:index.php');    //this line works now
ob_end_flush();
?>