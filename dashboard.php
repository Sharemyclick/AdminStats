<?php
// On inclut la page de paramètre de connection.
include('conf.php');

// On vérifie que le user est connecté sinon on le renvoie à la page de connection
session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sharemyclick admin platform V1.0</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />

<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/jquery.flot.min.js"></script>
<script type="text/javascript" src="js/jquery.flot.resize.min.js"></script>
<script type="text/javascript" src="js/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/jquery.flot.pie.resize_update.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="/js/flot/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="js/jquery.flot.time.js"></script>    
<script type="text/javascript" src="js/jshashtable-2.1.js"></script>
<script type="text/javascript" src="js/jquery.numberformatter-1.2.4.min.js"></script>
<script type="text/javascript" src="js/jquery.flot.symbol.js"></script>
<script type="text/javascript" src="js/jquery.flot.axislabels.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/json2.js"></script>
<script type="text/javascript" src="js/jquery.json-2.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>
Hello buddy
<div class="mainwrapper">
	
	<?php include ('./menu/menu-left.php');?>
    
    <!-- START OF RIGHT PANEL -->
    <div class="rightpanel">
    	<div class="headerpanel">
        	<a href="" class="showmenu"></a>
            
            <div class="headerright">
                
    			<div class="dropdown userinfo">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#" href="/page.html">Hi, <?php echo $_SESSION['login']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php"><span class="icon-off"></span> Sign Out</a></li>
                    </ul>
                </div><!--dropdown-->
    		
            </div><!--headerright-->
            
    	</div><!--headerpanel-->
        <div class="breadcrumbwidget">
        	<ul class="skins">
                <li><a href="default" class="skin-color default"></a></li>
                <li><a href="orange" class="skin-color orange"></a></li>
				<li><a href="green" class="skin-color green"></a></li>
                <li><a href="dark" class="skin-color dark"></a></li>
                <li>&nbsp;</li>
                <li class="fixed"><a href="" class="skin-layout fixed"></a></li>
                <li class="wide"><a href="" class="skin-layout wide"></a></li>
            </ul><!--skins-->
        	<ul class="breadcrumb">
                <li><a href="dashboard.html">Home</a> <span class="divider">/</span></li>
                <li class="active">Dashboard</li>
            </ul>
        </div><!--breadcrumbwidget-->
      <div class="pagetitle">
        	<h1>Dashboard</h1> <span>This is your private dashboard.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
        	<div class="contentinner content-dashboard">
			
            	<div class="alert alert-info" style="height:20px;">
					<MARQUEE DIRECTION="left" SCROLLAMOUNT="2" style="float:left;" >
                    <strong>Welcome <?php echo ucfirst($_SESSION['login']); ?>!</strong> to your Sharemyclick Dashboard.
					</MARQUEE>
					<button type="button" class="close" data-dismiss="alert" style="float:right;margin-top:-10px;" >×</button>
                </div><!--alert-->
                
                <div class="row-fluid">
                	<div class="span12">                    	
						<ul class="widgeticons row-fluid">
                        	<!--<li class="one_fifth"><a href=""><img src="img/gemicon/location.png" alt="" /><span>Maps</span></a></li>
                            <li class="one_fifth"><a href=""><img src="img/gemicon/image.png" alt="" /><span>Media</span></a></li>
                            <li class="one_fifth"><a href="reports.php"><img src="img/gemicon/reports.png" alt="" /><span>Reports</span></a></li>
                            <li class="one_fifth"><a href=""><img src="img/gemicon/edit.png" alt="" /><span>New Article</span></a></li>
                            <li class="one_fifth last"><a href=""><img src="img/gemicon/mail.png" alt="" /><span>Check Mail</span></a></li>
                        	<li class="one_fifth"><a href=""><img src="img/gemicon/calendar.png" alt="" /><span>Events</span></a></li>
                            <li class="one_fifth"><a href="manage-user.php"><img src="img/gemicon/users.png" alt="" /><span>Manage Users</span></a></li>
							<li class="one_fifth"><a href=""><img src="img/gemicon/settings.png" alt="" /><span>Settings</span></a></li>
                            <li class="one_fifth"><a href=""><img src="img/gemicon/archive.png" alt="" /><span>Archives</span></a></li>
                            <li class="one_fifth last"><a href=""><img src="img/gemicon/notify.png" alt="" /><span>Notifications</span></a></li>-->
                        </ul>
                    </div><!--span12-->
                </div><!--row-fluid-->
				
            </div><!--contentinner-->
			
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
	
    <div style="height:80px;"></div>
	
    <div class="footer">
    	<div class="footerleft">Sharemyclick dashboard v1.0</div>
    	<div class="footerright">&copy; Sharemyclick with Themepixels - <a href="https://twitter.com/sharemyclick"><span class="iconsweets-twitter"></a> - <a href="https://www.facebook.com/sharemyclick"><span class="iconsweets-facebook"></a> - <a href="https://www.linkedin.com/company/sharemyclick">Followus on Linkedin</a></div>
    </div><!--footer-->
 
</div><!--mainwrapper-->

</body>
</html>