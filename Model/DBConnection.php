<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 00:53
 */

$sunucu="localhost";
$veritabani="personel";
$kullaniciAdi="root";
$sifre="1234";

try{
    $pdo= new PDO("mysql:host=$sunucu;dbname=$veritabani;charset=UTF8",$kullaniciAdi,$sifre);
    // echo "veri tabanına bağlandı";
}catch (PDOException $e){
    echo $e->getMessage();
}

/*$connection= mysqli_connect($sunucu, $kullaniciAdi, $sifre, $veritabani);
	// Bağlantıyı doğrula
	if (mysqli_connect_errno())
    {
        echo "bağlantı başarısız... " . mysqli_connect_error();
    }
	mysqli_set_charset($connection,"utf8");
*/
?>