<?php

require'class/sessions.php';
$objses = new Sessions();
$objses->init();

$objses->destroy();

header('Location:http://'.$_SERVER['HTTP_HOST'].'/hola/PROYECTO/index.php');

?>