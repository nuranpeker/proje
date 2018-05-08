<?php

session_start();

if(!isset($_SESSION['baglanti']))
{

    echo "Yetkili kullanıcı değilsiniz....Giriş yapmanız gerekiyor
				<a href=\"../login.html\" >Giriş</a>";

    exit();

}

$oturumOmru = 10*60; // Oturum süresi 10 dk.

if (isset($_SESSION['baslangicZamani']))
{
    $oturumSuresi = time() - $_SESSION['baslangicZamani'];
    if ($oturumSuresi > $oturumOmru)
    {
        echo "Oturum süreniz dolmuştur...";
        header("Location: logout.php");
    }
}
$_SESSION['baslangicZamani'] = time();
