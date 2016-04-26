<!DOCTYPE html>
<html>
		<head>
		<meta charset="utf-8">	
		<title>Ecommerce Desgin</title>
		<link rel="stylesheet" href="css/styles.css">

		<link rel="stylesheet" href="css/bootstrap.css">
		<script type ="text/javascript" src="js/bootstrap.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/mycss.css">
		<meta name="description" content="feedBackBox Demo">
        <link href="css/jquery.feedBackBox.css" rel="stylesheet" type="text/css">
	    <script src="jquery.min.js"></script>
	    <link rel="stylesheet" href="css/contactcss.css">
	    <script src="js/jquery.feedBackBox.js"></script>
	  	<script type="text/javascript">
	  	
        //<![CDATA[    
        $(document).ready(function () {
            $('#test').feedBackBox();
        });
        // ]]>
    </script>

	</head>

<body>

	<div class="container" style="margin-top:10px">
    <div class="row">
        <div class="col-md-6">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="fname" name="name" type="text" placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back 
                                to you within 2 business days." rows="7">
                                </textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div class="panel panel-default">
                    <div class="text-center header">Our Location</div>
                    <div class="panel-body text-center">
                        <h4>Address</h4>
                        <div>
                        IIIT Allahabad<br />
                        Jhalwa Devghat, Allahabad<br />
                        Mob no: 8564931068<br />
                        @TechnoAlpha.com<br />
                        </div>
                        <hr />
                        <div id="map1" class="map">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<script type="text/javascript" src="js/contact.js">
   
</script>
<footer>
        <div class="bar">
            <div class="bar-wrap">
                <!-- <ul class="links">
                    <li><a href="index.html">Home</a></li>                   
                    <li><a href="?">Contact</a></li>
                    <li><a href="about.html">About Us</a></li>
                </ul>
                -->
                <div class="social">
                    <a href="https://www.facebook.com/shiv.singh.3781" class="fb">
                        <span data-icon="f" class="icon"></span>
                        <span class="info">
                            <span class="follow">
                            Become a fan Facebook</span>                       
                        </span>
                    </a>

                    <a href="#" class="tw">
                        <span data-icon="T" class="icon"></span>
                        <span class="info">
                            <span class="follow">Follow us Twitter</span>
                           
                        </span>
                    </a>

                    <a href="#" class="rss">
                        <span data-icon="R" class="icon"></span>
                        <span class="info">
                            <span class="follow">Subscribe RSS</span>
                            
                        </span>
                    </a>
                </div>
                <div class="clear"></div>
                <div class="copyright">&copy;  2016 All Rights Reserved</div>
            </div>
        </div>
    </footer>

</body>

</html>
