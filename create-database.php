<?php

include('conf.php');
include('class/database.class.php');
include('class/categoryproduct.class.php');
include('class/country.class.php');
include('class/affiliatemanager.class.php');

session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}

$objDatabase= new Database();

$objCategoryProduct = new CategoryProduct();
$result = $objCategoryProduct->getCategoriesList();

$objCountry = new Country();
$resultCountry = $objCountry->getCountryList();

$objManager = new AffiliateManager();
$resultManager = $objManager->getAffiliateManagersList();

$objType = new Database();
$resultType = $objType->getDatabaseTypesList();

if(isset($_POST['submit_database'])){
    
    
    $message = $objDatabase->createDatabase($_POST);
}
//$objAdvertiser->createAdvertiser($_REQUEST);



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
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/charCount.js"></script>
<script type="text/javascript" src="js/targeting.js"></script>

<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>


	
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
        	<h1>Create Database</h1> <span><?php echo $_SESSION['login']; ?> , please enter all the details for the creation of the Database.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
                
                <?php
                     if(isset($_POST['submit_database'])){
                         ?>   <h4 class='confirmation' style="text-align: center" ">The Database has been created </h4> </br> <?php ;}
                ?>
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed">Database informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <form name="form_advertiser" class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                        <p>
                            <label>Database name *</label>
                            <span class="field"><input type="text" name="name" class="input-xxlarge" required="required" /></span>
                        </p>

                        <p>
                            <label>Collect URL *</label>
                        <span class="field"><input type="url" id="collect_url"  name="collect_url" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Volume</label>
                        <span class="field"><input type="text" name="volume" class="input-xxlarge" /></span>
                        </p>
                        <p>
                            <label>Type *</label>
                        <span class="field">
                                <select name="type_database" id="type_database" class="status">
                                        <?php 
                                        foreach($objType->database_types_list as $indType => $valType){?>
                                        
                                    <option value="<?php echo $indType['id_type']; ?>"  ><?php echo $valType['type']; ?> </option>
                                            </option>
                                <?php } ?>
                                </select>
                            </span>
                        </p>

                        <p>
                            <label>Manager *</label>
                            <span class="field">
                                <select name="affiliate_manager" id="manager" class="status">
                                        <?php 
                                        foreach($objManager->affiliate_managers_list as $indManager => $valManager){?>
                                        
                                    <option value="<?php echo $indManager['id_affiliate_manager']; ?>"  ><?php echo $valManager['name']; ?> </option>
                                            </option>
                                <?php } ?>
                                </select>
                            </span>
                            
                        </p>
                         
                         <p>
                            <label>Campaign Performance</label>
                        <span class="field"><input type="text" name="campaign_performance" class="input-xxlarge" /></span>
                        </p>
                        <p>
                            <label>Country *</label>
                            <span class="field">
                                <select name="country" id="country" class="status">
                                        <?php 
                                        foreach($objCountry->countryselect as $indCountry => $valCountry){?>
                                        
                                    <option value="<?php echo $valCountry['id_country']; ?>"  ><?php echo $valCountry['name_country']; ?> </option>
                                            </option>
                                <?php } ?>
                                </select>
                            </span>
                            
                        </p>                              
                        <p>
                            <label>Status *</label>
                            <span class="field">
                                <select name="status" id="status" class="status" required="required">
                                        <option value="active"> Active</option>
                                        <option value="non active"> Non active</option>
                                        <option value="prospect adviser"> Prospect adviser</option>
                                </select>
                            </span>                            
                        </p>
                            
                        <p class="stdformbutton">
                            <button type="submit" name="submit_database" id="submit_advertiser" class="btn btn-primary">Create </button>
                            <button type="reset" class="btn">Reset </button>
                        </p>
                        
                        </form>
                    </div>				
                </div><!--contentinner-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
	

	
    <div class="footer">
    	<div class="footerleft">Sharemyclick dashboard v1.0</div>
    	<div class="footerright">&copy; Sharemyclick with Themepixels - <a href="https://twitter.com/sharemyclick"><span class="iconsweets-twitter"></a> - <a href="https://www.facebook.com/sharemyclick"><span class="iconsweets-facebook"></a> - <a href="https://www.linkedin.com/company/sharemyclick">Followus on Linkedin</a></div>
    </div><!--footer-->
 


</body>
</html>
