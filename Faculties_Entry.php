<?php
$id="";
$opr="";
if(isset($_GET['opr']))
	$opr=$_GET['opr'];

if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
if(isset($_POST['btn_sub'])){
	$facuties_name=$_POST['fnametxt'];
	$note=$_POST['notetxt'];	
	

$sql_ins=mysql_query("INSERT INTO department_tbl 
						VALUES(
							NULL,
							'$facuties_name',
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
	$fac_name=$_POST['fnametxt'];
	$note=$_POST['notetxt'];	
	
	$sql_update=mysql_query("UPDATE department_tbl SET 
								department_name='$fac_name',
								note='$note'
							WHERE
								department_id=$id
							");
 if($sql_update)
    echo '<script type="text/javascript">alert("Record(s) updated")</script>';

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>::. IIITA.::</title>
<link rel="stylesheet" type="text/css" href="css/style_entry.css" />
</head>

<body>

<?php

if($opr=="upd")
{
	$sql_upd=mysql_query("SELECT * FROM department_tbl WHERE department_id=$id");
	$rs_upd=mysql_fetch_array($sql_upd);
	
?>

<div id="top_style">
        <div id="top_style_text">
        	Department Update
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_faculties"><input type="button" name="btn_view" value="Back" title="View_faculties" id="button_view" style="width:70px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	
            
            <tr>
            	<td>Department Name</td>
            	<td>
                	<input type="text" name="fnametxt" id="textbox" value="<?php echo $rs_upd['Department_name'];?>" />
                </td>
            </tr>
             <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="4"><?php  echo $rs_upd['note'];?></textarea>
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
        	Department Entry
        </div><!-- end of top_style_text-->
       <div id="top_style_button"> 
       		<form method="post">
            	<a href="?tag=view_faculties"><input type="button" name="btn_view" title="View_faculties" value="Department_name" id="button_view" style="width:150px;"  /></a>
             
       		</form>
       </div><!-- end of top_style_button-->
</div><!-- end of top_style-->

<div id="style_informations">
	<form method="post">
    	<div>
    	<table border="0" cellpadding="4" cellspacing="0">
        	
            
            <tr>
            	<td>Department Name</td>
            	<td>
                	<input type="text" name="fnametxt" id="textbox" />
                </td>
            </tr>
             <tr>
            	<td>Note</td>
                <td>
                	<textarea name="notetxt" cols="23" rows="4"></textarea>
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