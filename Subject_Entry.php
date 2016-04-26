<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$fa_name=$_POST['factxt'];
	$teach_name=$_POST['techtxt'];
	$semester=$_POST['semestertxt'];
	$sub_name=$_POST['subtxt'];
	$note=$_POST['notetxt'];	
	
	

$sql_ins=mysql_query("INSERT INTO sub_tbl 
						VALUES(
							NULL,
							'$fa_name',
							'$teach_name' ,
							'$semester',
							'$sub_name' ,
							'$note'
							)
					");
	
if($sql_ins==true) {
	$msg="1 Row Inserted";
	echo '<script type="text/javascript">alert("Record(s) Added")</script>';

	}
else
	$msg="Insert Error:".mysql_error();
	
}

//------------------uodate data----------
if(isset($_POST['btn_upd'])){
	$fac_id=$_POST['factxt'];
	$tea_id=$_POST['techtxt'];
	$semester=$_POST['semestertxt'];
	$sub_name=$_POST['subtxt'];
	$note=$_POST['notetxt'];
	
	
	$sql_update=mysql_query("UPDATE sub_tbl SET
							Department_id='$fac_id' ,
							teacher_id='$tea_id' ,
							semester='$semester' ,
							sub_name='$sub_name' ,
							note='$note' 
						WHERE sub_id=$id

					");
	 if($sql_update)
    echo '<script type="text/javascript">alert("Record(s) updated")</script>';

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::.IIIT-A.::</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>


<?php

if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM sub_tbl WHERE sub_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
    //echo $rs_upd['Department_id'];
	
?>
<div id="top_style">
        <div id="top_style_text">
        Subjects Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_subjects" ><input type="button" name="btn_view" title="Back" value="Back" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
        	<table border="0" cellpadding="5" cellspacing="0">
        	<tr>
            	<td>Department Name</td>
            	<td>
                	<select name="factxt" id="textbox">
                    	<option>---- Department Name   ------</option>
                            <?php
                               $value;
                               $fac_name=mysql_query("SELECT * FROM department_tbl");
							   while($row=mysql_fetch_array($fac_name)){
                                    // echo "<option>".$row['Department_id']."</option>";
                                    // echo "<option>".$rs_upd['Department_id']."</option>";
								   if($row['Department_id']==$rs_upd['Department_id'])
                                   {
                                        // echo "<option>"." both are equal "."</option>";
                                        $value = $row['Department_name'];
								   		$iselect="selected";
                                        break;
                                   }
								   else
								        $iselect="";
								}
                            ?>
                            <option value="<?php echo $row['Department_id'];?>" <?php echo $iselect;?> > <?php echo $value ?> </option>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Teacher's Name</td>
            	<td>
                	<select name="techtxt" id="textbox">
                    	<option>---- Teachers's Name   ----</option>
                            <?php
                                $te_name=mysql_query("SELECT * FROM teacher_tbl");
								while($row=mysql_fetch_array($te_name)){
									if($row['teacher_id']==$rs_upd['teacher_id'])
								   		$iselect="selected";
									else
										$iselect="";
								?>
                                <option value="<?php echo $row['teacher_id'];?>" <?php echo $iselect?> > <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                	
								<?php	
									}
                            ?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Semester</td>
            	<td>
                	<input type="text" name="semestertxt" id="textbox" value="<?php echo $rs_upd['semester'];?>"  />
                </td>
            </tr>
            
            <tr>
            	<td>Subject name</td>
                <td>
                	<input type="text" name="subtxt"  id="textbox" value="<?php echo $rs_upd['sub_name'];?>" />
                </td>
            </tr>
            
            <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="3"><?php echo $rs_upd['note'];?></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_upd" value="Update" id="button-in"  />
                </td>
            </tr>
		</table>

    	</div>
    </form>

</div><!-- end of style_informatios -->
<?php
}
else
{
?>

<div id="top_style">
        <div id="top_style_text">
        Subjects Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_subjects" ><input type="button" name="btn_view" title="View Subjects" value="View_Subjects" id="button_view" style="width:120px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->


<div id="style_informations">
	<form method="post">
    	<div>
        	<table border="0" cellpadding="5" cellspacing="0">
        	<tr>
            	<td>Department</td>
            	<td>
                	<select name="factxt" id="textbox">
                    	<option>---- Department Name   ------</option>
                            <?php
                               $fac_name=mysql_query("SELECT * FROM department_tbl");
							   while($row=mysql_fetch_array($fac_name)){
								?>
                        		<option value="<?php echo $row['Department_id'];?>"> <?php echo $row['Department_name'];?> </option>
                                <?php 
							   }
                            ?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Teacher's Name</td>
            	<td>
                	<select name="techtxt" id="textbox">
                    	<option>---- Teachers's Name   ----</option>
                            <?php
                                $te_name=mysql_query("SELECT * FROM teacher_tbl");
								while($row=mysql_fetch_array($te_name)){
								?>
                                <option value="<?php echo $row['teacher_id'];?>"> <?php echo $row['f_name'] ; echo " "; echo $row['l_name'];?> </option>
                                	
								<?php	
									}
                            ?>
                    </select>
                </td>
            </tr>
            
            <tr>
            	<td>Semester</td>
            	<td>
                	<input type="text" name="semestertxt" id="textbox"  />
                </td>
            </tr>
            
            <tr>
            	<td>Subjects's name</td>
                <td>
                	<input type="text" name="subtxt"  id="textbox" />
                </td>
            </tr>
            
            <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="3"></textarea>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                	<input type="reset" value="Cancel" id="button-in"/>
                	<input type="submit" name="btn_sub" value="Add Now" id="button-in"  />
                </td>
            </tr>
		</table>

    	</div>
    </form>

</div><!-- end of style_informatios -->

<?php
}
?>
</body>
</html>