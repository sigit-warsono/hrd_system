<div class="section_1">
<a class="btn btn-primary btn-social"
        href="admin.php?module=upload_lks_temuan_audit&name=EXSTERNAL&link=lks_temuan_audit_exsternal" title="Tambah Data"
        data-toggle="tooltip">
        <i class="fa fa-pencil-square-o"></i> Upload file PDF
    </a>
    <br />
    <div style="height:55px;">
        <?php
                    if (isset($_SESSION['pesan']) && $_SESSION['pesan'] <> '') {
                    echo '<div id="pesan" class="alert alert-success" >'.$_SESSION['pesan'].'</div>';
                    }
                    $_SESSION['pesan'] = '';
                ?>
    </div>

    <script>
    // $(document).ready(function() {
    //     setTimeout(function() {
    //         $("#pesan").fadeIn('slow');
    //     }, 500);
    // });
    setTimeout(function() {
        $("#pesan").fadeOut('slow');
    }, 3000);
    </script>


    <h3>Data upload file lks/temuan audit exsternal</h3>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th style='width:50px;'>No</th>
                    <th style='width:50px;'>Action</th>
                    <th style='width:150px;'>No.lks</th>
                    <th style='width:150px;'>Dokumen type</th>
                    <th style='width:150px;'>Divisi</th>
                    <th style='width:150px;'>Tahun</th>
                    <th style='width:150px;'>View file</th>

                   

                </tr>
            </thead>
            <tbody>
                <?php


if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
	$result_count = mysql_query("SELECT COUNT(*) As total_records FROM `iso_data_temuan` WHERE `file_name` like '%".$cari."%'");
}else{
	$result_count = mysql_query("SELECT COUNT(*) As total_records FROM `iso_data_temuan` WHERE dokumen_type='EXSTERNAL' ORDER BY `no_lks` ASC ");
}
	$total_records = mysql_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1
	if(isset($_GET['cari'])){
		$cari = $_GET['cari'];
    $result = mysql_query("SELECT * FROM `iso_data_temuan` WHERE `file_name` like '%".$cari."%' ");
	}else{
		$result = mysql_query("SELECT * FROM `iso_data_temuan` WHERE dokumen_type='EXSTERNAL' ORDER BY `no_lks` ASC");
	}

  $no=1;
    while($row = mysql_fetch_array($result)){

        $id=$row['id'];
		?>
                <tr>
                    <td><?php $id_driver=$row['id']; echo $no++; ?></td>
                    <td>

                        <div class="dropdown show">
                            <a class="btn btn-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Options
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <!-- <a class="dropdown-item"
                                href="admin.php?module=update_data_divisi&id=<?php echo $id; ?>">Update</a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item"
                                    href="admin.php?module=update_lks_temuan_audit&id=<?php echo $id; ?>&link=lks_temuan_audit_exsternal">Update</a>
                                <a class="dropdown-item"
                                    href="admin.php?module=delete_lks_temuan_audit&id=<?php echo $id; ?>&link=lks_temuan_audit_exsternal">Delete</a>
                            </div>
                        </div>
    </div>

    </td>
    <td><?php echo $row['no_lks'] ?></td>
    <td><?php echo $row['dokumen_type'] ?></td>
    <td><?php echo $row['divisi'] ?></td>
    <td><?php echo $row['tahun'] ?></td>
        <td><a target="_blank" class="btn btn-primary btn-social"
            href="modul/iso_smm_9001:2015/lks_temuan_audit_internal/view_pdf.php?id=<?php echo $row['id']; ?>" title="Lihat Data"
            data-toggle="tooltip">
            <i class="fa fa-eye"></i> Lihat PDF
        </a></td>
 
    </tr>

    <?php
        }

    ?>
    </tbody>
    </table>
</div>
<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
    <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
</div>
<nav aria-label="Page navigation example" class="table-responsive mb-2">
    <ul class="pagination">
        <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

        <li <?php if($page_no <= 1){ echo "class='page-link' class='disabled'"; } ?>>
            <a
                <?php if($page_no > 1){ echo "class='page-link' href='?module=dashboard&page_no=$previous_page'"; } ?>>Previous</a>
        </li>

        <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
				}else{
           echo "<li class='page-item'><a class='page-link' href='?module=dashboard&page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
				}else{
           echo "<li class='page-item'><a class='page-link' href='?module=dashboard&page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li class='page-item'><a class='page-link' href='?module=dashboard&page_no=$second_last'>$second_last</a></li>";
		echo "<li class='page-item'><a class='page-link' href='?module=dashboard&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li class='page-item'><a class='page-link' href='?module=dashboard&page_noo=1'>1</a></li>";
		echo "<li class='page-item'><a class='page-link' href='?module=dashboard&page_no=2'>2</a></li>";
        echo "<li class='page-item'><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
				}else{
           echo "<li class='page-item'><a class='page-link' href='?module=dashboard&page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li class='page-item'><a class='page-link' href='?module=dashboard&page_no=$second_last'>$second_last</a></li>";
	   echo "<li class='page-item'><a class='page-link' href='?module=dashboard&page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a class='page-link' href='?module=dashboard&page_no=1'>1</a></li>";
		echo "<li><a class='page-link' href='?module=dashboard&page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='page-item active'><a class='page-link'>$counter</a></li>";	
				}else{
           echo "<li class='page-item'><a class='page-link' href='?module=dashboard&page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>

        <li <?php if($page_no >= $total_no_of_pages){ echo "class='page-link disabled'"; } ?>>
            <a
                <?php if($page_no < $total_no_of_pages) { echo "class='page-link' href='?module=dashboard&page_no=$next_page'"; } ?>>Next</a>
        </li>
        <?php if($page_no < $total_no_of_pages){
		echo "<li><a class='page-link' href='?module=dashboard&page_no=$total_no_of_pages'>Last &rsaquo;&rsaquo;</a></li>";
		} ?>
    </ul>
</nav>




<br /><br />

<script>
$('.table-responsive').on('show.bs.dropdown', function() {
    $('.table-responsive').css("overflow", "inherit");
});

$('.table-responsive').on('hide.bs.dropdown', function() {
    $('.table-responsive').css("overflow", "auto");
})
</script>
</div>