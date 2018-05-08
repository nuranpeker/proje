<?php
session_start();
require_once '../controller/sessionControl.php';
if($_SESSION['yetki']!=2){
    echo "Bu sayfayı görüntüleme yetkiniz yok";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hoşgeldiniz</title>
    <link rel="stylesheet" type="text/css" href="../Styles/style1.css" />
</head>
<body>
<div class="container" >
    <div id="header">
        <div class="header" >
            <div id="logo" align="left">
            </div>
            <div id="baslik">
                <p><br><br>
                    T.C.<br>
                    SAKARYA ÜNİVERSİTESİ<br>
                    ÖĞRENCİ BİLGİ SİSTEMİ
                </p>
            </div>
        </div>
    </div>
    <div id="home" align="center" >
        <form id="home" method="post" action="login.php" >
            <br><br>
            <input style="height: 40px" type="text" name="ders_ekle" id="ders_ekle" size="40" placeholder="Öğrenci Belgesi"><br><br>
            <input style="height: 40px" type="text" name="ders_cikar"  id="ders_cikar"  size="40" placeholder="Akademik Personel Görüntüle"><br><br>
            <input style="height: 40px" type="text" name="not_goruntule"  id="not_goruntule" size="40" placeholder="Yıllık Kayıtlar">

        </form>
    </div>


</body>
</html>
