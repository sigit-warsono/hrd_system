<div class="section_1">
    <?php
echo 'SIGIT WARSONO';
if($_POST['submit']){
// echo $_POST['submit'];
// echo "<br>";
//echo "sigit"; 

$dokumen_type=$_POST['dokumen_type'];
$nama_dokumen=$_POST['nama_dokumen'];
$no_dokumen=$_POST['no_dokumen'];
$divisi=$_POST['divisi'];
$no_lks=$_POST['no_lks'];
$tahun=$_POST['tahun'];
$link=$_POST['link'];
$type_file= $_FILES['file_cover']['type']; //mendapatkan mime type
echo $type_file;
if ($type_file =="application/pdf") //mengecek apakah file tersebu pdf atau bukan
{


$nama_file = trim($_FILES['file_cover']['name']);




 //mengganti nama pdf

$nama_baru = $_FILES['file_cover']['name'];
$file_temp = $_FILES['file_cover']['tmp_name']; //data temp yang di upload
$folder    = "modul/iso_smm_9001:2015/upload_file"; //folder tujuan

 move_uploaded_file($file_temp, "$folder/$nama_baru"); //fungsi upload
 //update nama file di database

  date_default_timezone_set('Asia/Jakarta');
 $ddate=date('Y-m-d G:i:s');


 $sql1_cv="INSERT INTO `iso_data_temuan`(`id`, `dokumen_type`, `file_name`, `no_lks`, `divisi`, `tahun`, `datetime`)
  VALUES ('','$dokumen_type','$nama_baru','$no_lks','$divisi','$tahun','$ddate')"; //echo $sql1_cv;
  mysql_query($sql1_cv);

 $_SESSION['pesan'] = 'Data file '.$dokumen_type.' berhasil di input';
?>
    <script>
    window.location = "admin.php?module=<?php echo $link; ?>";
    </script>

    <?php


}else{

    $_SESSION['pesan'] = 'Data file '.$dokumen_type.' Not found';

    ?>
    <script>
    window.location = "admin.php?module=<?php echo $link; ?>";
    </script>
    <?php
}



?>




    <?php
}



?>


</div>
</div>