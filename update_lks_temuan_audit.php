<div class="section_1">
    <?php
$id=$_GET['id'];
$link=$_GET['link'];

$sql="SELECT * FROM `iso_data_temuan`  WHERE id='$id'"; //echo $sql;
$res=mysql_query($sql);
$data=mysql_fetch_array($res);
$divisi=$data['divisi'];
?>
<H4>Edit Data</h4>
    <form action="admin.php?module=update_lks_temuan_audit_action" method="post" enctype="multipart/form-data"
        name="form1" id="form1">
        <div class="form-group">
            <label><b>No.lks</b></label>
             <input type="text" class="form-control" name="no_lks" value="<?php echo $data['no_lks']; ?>" style="width: 30% !important"/>
        </div>

        
        <div class="form-group">
            <label><b>Divisi</b></label>
              <select name="divisi" style="width: 30% !important"
                class="form-control select2-container step2-select">

                <option value="<?php echo $divisi; ?>"><?php echo $divisi; ?></option>
                <?
        
              $sql16="SELECT * FROM `iso_divisi_pdf` WHERE NOT divisi='$divisi' group by divisi"; //echo $sql15;
              $res16=mysql_query($sql16);
              while($row1=mysql_fetch_array($res16))
              {
                
                 
                  $divisi=$row1["divisi"];
                
                
                echo "<option id='option".$divisi."' value='$divisi'>$divisi</option>";
              }
          ?>
            </select>
        </div>

        <div class="form-group">
            <label><b>Tahun</b></label>
             <input type="text" class="form-control" name="tahun" value="<?php echo $data['tahun']; ?>" style="width: 30% !important"/>
        </div>


        <input type="hidden" class="form-control" name="link" value="<?php echo $link; ?>" />
        <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>" />

        <button type="submit" name="submit" value="fosa" class="btn btn-primary">Submit</button>
    </form>

</div>