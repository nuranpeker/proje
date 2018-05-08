<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 01:00
 */

require_once '../classes/DataBaseConnection.php';
include '../Model/DBConnection.php';
$object = new DataBaseConnection();
session_start();

if(isset($_POST['admin'])){

    // $admin = $_POST['admin'];
    $kullanici= $_POST['admin'];
}
elseif(isset($_POST['akademik_per'])){
    $kullanici= $_POST['akademik_per'];
    //$akademik_per = $_POST['akademik_per'];
}
elseif(isset($_POST['ogrenci'])){
    $kullanici = $_POST['ogrenci'];
    //$ogrenci = $_POST['ogrenci'];
}

$kullaniciAdi = $_POST['kullaniciAdi'];
$sifre = $_POST['sifre'];
$sql= $pdo->prepare("select* from uyeler where kullaniciAdi = ? and sifre = ?");
$sql->execute(array($kullaniciAdi,md5($sifre)));
$islem=$sql->fetch();

    switch ($kullanici) {
        case $_POST['akademik_per']:
            if ($islem) {
                $_SESSION['yetki'] = 1;
                $_SESSION['baglanti'] = true;
                $_SESSION['baslangicZamani'] = time();
                // $_SESSION['kullaniciAdi'] = $kullaniciAdi;
                header('location:../View/Home.php');
                break;
            } else {

                header('location:sessionControl.php');
                break;
            }
        case $_POST['admin']:
            if ($islem) {
                $_SESSION['yetki'] = 2;
                $_SESSION['baglanti'] = true;
                $_SESSION['baslangicZamani'] = time();
                //$_SESSION['kullaniciAdi'] = $kullaniciAdi;
                header('location:../View/Home1.php');
                break;
            } else {

                header('location:sessionControl.php');
                break;
            }
        case $_POST['ogrenci']:
            if ($islem) {
                $_SESSION['yetki'] = 3;
                $_SESSION['baglanti'] = true;
                $_SESSION['baslangicZamani'] = time();
                //$_SESSION['kullaniciAdi'] = $kullaniciAdi;
                header('location:../View/kontrolPaneli.php');
                break;
            } else {

                header('location:sessionControl.php');
                break;
            }
    }


?>
