<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 1.4.2018
 * Time: 00:59
 */
include '../classes/DataBaseConnection.php';
include '../classes/DBCrud.php';
$object = new DBCrud();
if(isset($_POST["action"]))
{
    if($_POST["action"] == "Yükle")
    {
        echo $object->get_data_in_table("SELECT* FROM ogrenciler ORDER BY id ");
    }
    if($_POST["action"] == "Ekle")
    {
        $ad = mysqli_real_escape_string($object->connect, $_POST["ad"]);
        $soyad =  mysqli_real_escape_string($object->connect, $_POST["soyad"]);
        $bolum =  mysqli_real_escape_string($object->connect, $_POST["bolum"]);
        $options = array('options'=> array('min_range'=>1, 'max_range'=>3));
        $bolum = filter_input(INPUT_POST, 'bolum', FILTER_VALIDATE_INT, $options);

        if (is_null($bolum)) {
            echo "Bölüm alanı boş bırakılamaz.<br />";
        } elseif ($bolum === FALSE) {
            echo "Bölüm 1 ile 3 arası bir tamsayı olmalıdır <br />";
        }
        $query = "INSERT INTO ogrenciler (ad, soyad, bolum) 
VALUES ('".$ad."', '".$soyad."', '".$bolum."')";
        $object->execute_query($query);

        echo 'Veri Eklendi';
    }
    if($_POST["action"] == "Veri Al")
    {
        $output = [];
        $query = "SELECT * FROM ogrenciler WHERE id = ".$_POST["user_id"];
        $result = $object->execute_query($query);
        while($row = mysqli_fetch_array($result))
        {
            $output["ad"] = $row["ad"];
            $output["soyad"] = $row["soyad"];
            $output["bolum"] = $row["bolum"];
        }

        //echo $object->get_data_in_table("SELECT* FROM ogrenciler WHERE id = '".$_POST["user_id"]."'");
        //echo $output;
        echo json_encode($output);
    }

    if($_POST["action"] == "Güncelle")

    {   $ad = mysqli_real_escape_string($object->connect, $_POST["ad"]);
        $soyad = mysqli_real_escape_string($object->connect, $_POST["soyad"]);
        $bolum = mysqli_real_escape_string($object->connect, $_POST["bolum"]);
        $query = "UPDATE ogrenciler SET ad = '".$ad."', soyad = '".$soyad."' ,bolum = '".$bolum."' where id = '".$_POST["user_id"]."'";
        $object->execute_query($query);
        echo 'Veri Güncellendi';
    }
    if($_POST["action"] == "Sil")
    {
        $query = "DELETE FROM ogrenciler WHERE id = '".$_POST["user_id"]."'";
        $object->execute_query($query);
        echo 'Veri Silindi';
    }
    if($_POST["action"] == "Ara")
    {
        $search =  mysqli_real_escape_string($object->connect, $_POST["query"]);
        $query = "SELECT* FROM ogrenciler WHERE ad LIKE '%".$search."%' OR soyad LIKE '%".$search."%' ORDER BY id ASC";
        echo $object->get_data_in_table($query);
    }
}
?>
