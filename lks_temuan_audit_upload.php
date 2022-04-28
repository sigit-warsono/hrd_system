<div class="section_1">
    <?php
$name=$_GET['name'];
$divisi=$_GET['divisi'];
$link=$_GET['link'];
// echo $name.'<br>';
// echo $divisi;
?>
    <h3>ISO SML9001:2015/<?php echo $name; ?></h3>


    <br>
    <br>
    <form action="admin.php?module=lks_temuan_audit_upload_action" method="post" enctype="multipart/form-data" name="form1"
        id="form1">
        <div class="form-group">
            <label for="#"><b>File type</b></label>
            <br>
            <select name="dokumen_type" style="width: 30% !important"
                class="form-control select2-container step2-select">

                <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                <?
        
              $sql15="SELECT * from `iso_type_file` WHERE NOT name_file='$name' AND id IN(11,12)"; //echo $sql15;
              $res15=mysql_query($sql15);
              while($row=mysql_fetch_array($res15))
              {
                
                 
                  $name_file=$row["name_file"];
                
                
                echo "<option id='option".$name_file."' value='$name_file'>$name_file</option>";
              }
          ?>
            </select>
        </div>
        <div class="form-group ">
            <label for="Size"><b>File Upload</b></label>
            <input type="file" class="form-control" name="file_cover" style="width: 30% !important" />
            <input type="hidden" class="form-control" name="link" value="<?php echo $link; ?>" />
        </div>


        <div class="form-group">
            <label><b>No.lks</b></label>
            <input type="text" class="form-control" name="no_lks" style="width: 30% !important" />
        </div>

        <div class="form-group">
            <label><b>Divisi</b></label>
              <select name="divisi" style="width: 30% !important"
                class="form-control select2-container step2-select">

                <option value="">Select options</option>
                <?
        
              $sql16="SELECT * FROM `iso_divisi_pdf` group by divisi"; //echo $sql15;
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
            <input type="text" class="form-control" name="tahun" style="width: 30% !important" />
        </div>

        <button type="submit" name="submit" value="fosa" class="btn btn-primary">Submit</button>
    </form>

</div>