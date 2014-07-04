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
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.smartWizard.min.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="js/jquery.alerts.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/slider.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
		// Smart Wizard 	
      	jQuery('#wizard2').smartWizard({onFinish: onFinishCallback});

		function onFinishCallback(){
			//alert('The COREG has been created');
                        jQuery('form').submit();
		} 
		
		jQuery(".inline").colorbox({inline:true, width: '60%', height: '500px'});
		
		jQuery('input:checkbox, input[type=radio]').uniform();
		jQuery("select").not(".skip_these").uniform();
	});
</script>

<!--------------- DATEPICKER STARTS --------------->
<script>
	jQuery(document).ready(function() {
	jQuery("#datepicker1").datepicker({showOn: "focus",showAnim: "fold",dateFormat: 'yyyy-mm-dd',altField: "#actualDate"});
	});
</script>
<script>
	jQuery(document).ready(function() {
	jQuery("#datepicker2").datepicker({showOn: "focus",showAnim: "fold",dateFormat: 'yyyy-mm-dd',altField: "#actualDate"});
	});
</script>
<!--------------- DATEPICKER ENDS --------------->

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>

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
        	<h1>Create Campaign</h1> <span><?php echo $_SESSION['login']; ?> , please enter all the details for the creation of the Campaign.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
        	<div class="contentinner">
			
            	<h4 class="widgettitle">Create Campaign Form</h4>
                <div class="widgetcontent">              	
                    <!-- START OF TABBED WIZARD -->
                    <form class="stdform" method="post" action="create_campaign.php" enctype="multipart/form-data" >
                    <div id="wizard2" class="wizard tabbedwizard">
                        <ul class="tabbedmenu">
                            <li>
                            	<a href="#wiz1step2_1">
                                	<span class="h2">STEP 1</span>
                                    <span class="label">Enter name</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2_2">
                                	<span class="h2">STEP 2</span>
                                    <span class="label">Select partner</span>
                                </a>
                            </li>
                            <li>
                            	<a href="#wiz1step2_3">
                                	<span class="h2">STEP 3</span>
                                    <span class="label">Select type</span>
                                </a>
                            </li>
							<li>
                            	<a href="#wiz1step2_4">
                                	<span class="h2">STEP 4</span>
                                    <span class="label">Enter price</span>
                                </a>
                            </li>
							<li>
                            	<a href="#wiz1step2_5">
                                	<span class="h2">STEP 5</span>
                                    <span class="label">Enter confirmation date</span>
                                </a>
                            </li>
							<li>
                            	<a href="#wiz1step2_6">
                                	<span class="h2">STEP 6</span>
                                    <span class="label">Enter sending date</span>
                                </a>
                            </li>
							<li>
                            	<a href="#wiz1step2_7">
                                	<span class="h2">STEP 7</span>
                                    <span class="label">Enter volume</span>
                                </a>
                            </li>
                        </ul>
                        	
                        <div id="wiz1step2_1" class="formwiz">
                        	<h4>Step 1: Enter Campaign name</h4>
                                <p>
                                    <label>Campaign name</label>
                                    <span class="field"><input type="text" name="name" class="input-xlarge" required="required" /></span>
                                </p>
                        </div><!--#wiz1step2_1-->
                        
                        <div id="wiz1step2_2" class="formwiz">
                        	<h4>Step 2: Select Partner name</h4> 
                                <p>
                                    <label>Partner name</label>
                                    <span class="field">
										<select class="select" name="partner_name" id="partner_name" >
											<?php 
											$req_jc = $bdd->query("SELECT id,name FROM partner");
											while ($val_jc = $req_jc->fetch()){?>
											<option value="<?php echo $val_jc['name']; ?>"><?php echo $val_jc['name']; ?></option>
											<?php }?>
										</select>
                                    </span>
                                </p>
                        </div><!--#wiz1step2_2-->
                        
                        <div id="wiz1step2_3">
                        	<h4>Step 3: Select campaign type</h4>
								<p>
                                    <label>Campaign type</label>
                                    <span class="field">
										<select class="select" name="type_name" id="type_name" >
											<?php 
											$req_jc = $bdd->query("SELECT id,name FROM type");
											while ($val_jc = $req_jc->fetch()){?>
											<option value="<?php echo $val_jc['name']; ?>"><?php echo $val_jc['name']; ?></option>
											<?php }?>
										</select>
                                    </span>
                                </p>
                        </div><!--#wiz1step2_4-->
						<div id="wiz1step2_4">
                        	<h4>Step 4: Enter campaign price</h4>
								<p>
                                    <label>Campaign price</label>
                                    <span class="field"><input type="text" name="price" class="input-xlarge" required="required" /></span>
                                </p>
                        </div><!--#wiz1step2_5-->
						<div id="wiz1step2_5">
                        	<h4>Step 5: Enter confirmation date</h4>
								<p>
                                    <label>Campaign confirmation date</label>
                                    <input id="datepicker1" type="date" name="date_conf" class="input-xlarge hasDatepicker" required="required" />
                                </p>
                        </div><!--#wiz1step2_6-->
						<div id="wiz1step2_6">
                        	<h4>Step 6: Enter sending date</h4>
								<p>
                                    <label>Campaign sending date</label>
                                    <input id="datepicker2" type="date" name="sending_date" class="input-xlarge hasDatepicker" required="required" />
                                </p>
                        </div><!--#wiz1step2_7-->
						<div id="wiz1step2_7">
                        	<h4>Step 7: Enter Campaign volume</h4>
								<p>
                                    <label>Campaign volume</label>
                                    <span class="field"><input type="text" name="volume" class="input-xlarge" required="required" /></span>
                                </p>
                        </div><!--#wiz1step2_3-->
                    </div><!--#wizard-->
                    </form>               
                    <!-- END OF TABBED WIZARD -->  
                </div><!--widgetcontent-->        
				
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