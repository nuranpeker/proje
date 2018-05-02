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
//session_start();
if(isset($_POST['admin'])){

    $admin = $_POST['admin'];
    }
elseif(isset($_POST['akademik_per'])){

    $akademik_per = $_POST['akademik_per'];
}
elseif(isset($_POST['ogrenci'])){

    $ogrenci = $_POST['ogrenci'];
}

$kullaniciAdi = $_POST['kullaniciAdi'];
//$kullaniciAdi = filter_var($kullaniciAdi, FILTER_SANITIZE_ENCODED);

$sifre = $_POST['sifre'];
$sql= $pdo->prepare("select* from uyeler where kullaniciAdi = ? and sifre = ?");
$sql->execute(array($kullaniciAdi,md5($sifre)));
$islem=$sql->fetch();

foreach( $sql as $row ){
    $islem = $row;
}
        if ($islem && $akademik_per) {
            $_SESSION['kullaniciAdi'] = $islem['kullaniciAdi'];
            $_SESSION['sifre'] = $islem['sifre'];
            header('location:../View/Home.php');
        } elseif ($islem  && $admin) {
            $_SESSION['kullaniciAdi'] = $islem['kullaniciAdi'];
            $_SESSION['sifre'] = $islem['sifre'];
            header('location ""');
        } elseif ($islem  && $ogrenci) {
            $_SESSION['kullaniciAdi'] = $islem['kullaniciAdi'];
            $_SESSION['sifre'] = $islem['sifre'];
            header('location:../View/Home1.php');
        } else {
            $hata = $sql->errorInfo();
            //$hata = $query->errorInfo();
            echo "$hata[2]";
            //echo empty($hata[2]) ? "Başarılı Bir Şekilde Çalıştı." : $hata[2];
            echo"hata oluştu";
        }
//}
?>


