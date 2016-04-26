<?php
	$msg="";
	$opr="";
	if(isset($_GET['opr']))
	$opr=$_GET['opr'];
	
if(isset($_GET['rs_id']))
	$id=$_GET['rs_id'];
	
	if($opr=="del")
{
	$del_sql=mysql_query("DELETE FROM stu_score_tbl WHERE ss_id=$id");
	if($del_sql) {
		$msg="1 Record Deleted... !";
		echo '<script type="text/javascript">alert("Record(s) Deleted")</script>';

		}
	else
		$msg="Could not Delete :".mysql_error();	
			
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style_view.css" />
<title>Untitled Document</title>
</head>

<body>
<div id="style_div" >
<form method="post">
<table width="755">
	<tr>
    	<td width="190px" style="font-size:18px; color:#006; text-indent:30px;">View Scores</td>
        <?php
                if($_SESSION['visitor'] != "visitor"){

        ?>
        <td><a href="?tag=score_entry"><input type="button" title="Add new Scores" name="butAdd" value="Add New" id="button-search" /></a></td>
        <?php } ?>
        <td><input type="text" name="searchtxt" title="Enter name for search " class="search" autocomplete="off"/></td>
        <td style="float:right"><input type="submit" name="btnsearch" value="Search" id="button-search" title="Search Score" /></td>
    </tr>
</table>
</form>
</div>
<br />

<div id="content-input">
	 <table border="1" width="1050px" align="center" cellpadding="3" class="mytable" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Student Name </th>
            <th>Department Name</th>
            <th>Subject Name </th>
            <th>Midterm</th>
            <th>Final</th>
            <th>Note</th>
            <?php
                if($_SESSION['visitor'] != "visitor"){

             ?>
            <th colspan="2">Operation</th>
            <?php } ?>
        </tr>
        
        <?php
		
		$key="";
	if(isset($_POST['searchtxt']))
		$key=$_POST['searchtxt'];
	
	if($key !="")
		$sql_sel=mysql_query("SElECT * FROM stu_score_tbl WHERE stu_id  like '%$key%' ");
	else
        $sql_sel=mysql_query("SELECT * FROM stu_score_tbl");
		
    $i=0;
    while($row=mysql_fetch_array($sql_sel)){
    $i++;
    $color=($i%2==0)?"lightblue":"white";
    ?>
      <tr bgcolor="<?php echo $color?>">
      <?php $query = mysql_query("SELECT Department_name FROM Department_tbl WHERE Department_id = "
      									.$row['Department_id']);
      			  $row1 = mysql_fetch_array($query); ?>
      			  
      <?php $query = mysql_query("SELECT f_name, l_name FROM stu_tbl WHERE stu_id = "
      									.$row['stu_id']);
      			  $row2 = mysql_fetch_array($query); ?>
      <?php $query = mysql_query("SELECT sub_name FROM sub_tbl WHERE sub_id = "
      									.$row['sub_id']);
      			  $row3 = mysql_fetch_array($query); ?>

            <td><?php echo $i;?></td>
            <td><?php echo $row2["f_name"]." ".$row2['l_name'];?></td>
            <td><?php echo $row1['Department_name'];?></td>
            <td><?php echo $row3['sub_name'];?></td>
            <td><?php echo $row['miderm'];?></td>
            <td><?php echo $row['final'];?></td>
            <td><?php echo $row['note'];?></td>
            <?php
                if($_SESSION['visitor'] != "visitor"){

             ?>
            <td align="center"><a href="?tag=score_entry&opr=upd&rs_id=<?php echo $row['ss_id'];?>"><img src="picture/update.png" /></a></td>
            <td align="center"><a href="?tag=view_scores&opr=del&rs_id=<?php echo $row['ss_id'];?>"><img src="picture/delete.png" /></a></td>
            <?php } ?>
        </tr>
        
    <?php
		
    }
    ?>
    </table>
</div>
</body>
</html>