<div class="section_1">
<?php
$link=$_POST['link'];
$divisi=$_POST['divisi'];
$tahun=$_POST['tahun'];
$no_lks=$_POST['no_lks'];
$id=$_POST['id'];

$sql="UPDATE `iso_data_temuan` SET `no_lks`='$no_lks', `divisi`='$divisi', `tahun`='$tahun' WHERE id='$id'"; //echo $sql;
mysql_query($sql);

$_SESSION['pesan'] = 'Data file '.$dokumen_type.' berhasil di update';
?>


<script>
window.location = "admin.php?module=<?php echo $link; ?>";
</script>