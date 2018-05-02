<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 01:09
 */

session_start();
if(!isset($_SESSION['kullaniciAd']) || (time()-$_SESSION['sure'])>10*3)
{
    session_destroy();
    header("location:login.php");
}
$_SESSION['sure']=time();
?>