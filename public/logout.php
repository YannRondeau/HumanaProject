<?php
include '../bootstrap.php';

session_destroy();

header('Location: home.php');
