<?php
session_start();
include 'services/tools.php';
include 'services/server.php';


foreach ($_POST as $key => $value) {
    $_POST[$key] = htmlspecialchars($value, ENT_QUOTES,"UTF-8");
}

?>