<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 5.5.2018
 * Time: 17:29
 */
session_start();

session_destroy();
header("Location: ../login.html");
die();
?>