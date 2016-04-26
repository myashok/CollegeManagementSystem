<?php
	session_start();	
	require("conection/connect.php");
	
	$msg="";
	$_SESSION['admin'] = '';
	$_SESSION['visitor'] = '';
	if(isset($_POST['btn_log'])){
		$uname=$_POST['unametxt'];
		$pwd=$_POST['pwdtxt'];
		
		$sql=mysql_query("SELECT * FROM users_tbl
								WHERE username='$uname' AND password='$pwd' 
								
							");
						
		$cout=mysql_num_rows($sql);
			if($cout>0){
				$row=mysql_fetch_array($sql);
				 /*if($row['type']=='visitor'){
						$_SESSION['visitor'] = 'visitor';	
						#header("location: everyone.php");
						echo $_SESSION['visitor']." ".$_SESSION['admin'];
					}
					else{
						$_SESSION['admin'] = 'admin';
						echo $_SESSION['visitor']." ".$_SESSION['admin'];
						#header("location: everyone.php");
					}*/
				if($row['type']=='creator'){
						$_SESSION['admin'] = 'admin';
						#echo $_SESSION['visitor']." ".$_SESSION['admin'];
						header("location: everyone.php");
				}
				else if($row['type']=='visitor'){
					$_SESSION['visitor'] = 'visitor';
					#echo $_SESSION['visitor']." ".$_SESSION['admin'];
					header("location: everyone.php");
				}					
			}
			
			else
					$msg="Login Failed!......";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>::.IIITA Login.::</title>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
	<script type="text/javascript" src="js/javasrc.js"></script>

</head>

<body style="background-image:url('picture/background.jpg')"> 
	<form method="post">
    	
                    <div class="login-page" style="margin-top: 150px">
					  <div class="form">
					      <form class="login-form">
					      <input type="text" name="unametxt" required="required" placeholder="username"/>
					      <input type="password" name="pwdtxt" required="required" placeholder="password"/>
					      <button name="btn_log">login</button>
					      
					    </form>
					  </div>
					</div>

                   <!-- <div id="login_form" style=" border-radius: 30px; border: thick outset #000080; padding-left:40px; margin-top:80px; width: 450px; height: 450px; z-index: 100; background-color: #FFFFFF;" >
                         <span style="font-family: 'Comic Sans MS'; ; font-size:70px; font-weight: bold; margin-left:90px;quot: 200px; color: #0033CC;">LOGIN</span><br><br><br>
                    	<input type="text" placeholder="Username" name="unametxt" title="Enter username here"   required="required" style="border-radius: 15px; width: 400px; height: 50px; text-align: center;font-size: x-large;"/><br><br>
                        <input type="password" placeholder="Password" name="pwdtxt"  title="Enter Password here"  required="required" style="border-radius: 15px; width: 400px; height: 50px; text-align: center;font-size: x-large;"autocomplete="off"/><br><br><br>
                        <input type="image" value="submit" name="btn_log" src="picture/login.png" alt="submit Button" style="width: 200px; margin-left:190px; height: 90px" />
        		   </div>
					-->   
    </form>
	<h2 style="color:#00F;" align="center">
	<?php echo $msg; ?>
	</h2>
</body>
</html>