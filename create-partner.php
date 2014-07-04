<?php
// On inclut la page de paramètre de connection.
include('conf.php');
include('class/advertizer.class.php');
include('class/category.class.php');

$objAdvertizer= new Advertizer();
$objCategory = new Category();
$categoriesList = $objCategory->getCategoriesList();

//$objAdvertizer->createAdvertiser($_REQUEST);

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
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="js/charCount.js"></script>
<script type="text/javascript" src="js/targeting.js"></script>

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
        	<h1>Create Advertiser</h1> <span><?php echo $_SESSION['login']; ?> , please enter all the details for the creation of the Partner.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed">Create Advertiser Form</h4>
				
				
				
				<div class="widgetcontent bordered shadowed nopadding">
                    <form class="stdform stdform2" method="post" action="forms.html">
                            <p>
                                <label>Company name</label>
                                <span class="field"><input type="text" name="company_name" class="input-xxlarge" required="required" /></span>
                            </p>
                            
                            <p>
                                <label>Adresse</label>
                            <span class="field"><input type="text" name="adresse" class="input-xxlarge" required="required" /></span>
                            </p>
                            
                            <p>
                                <label>Country</label>
                                <select class="select" name="country" id="country" >
                                <?php 
                                    $req_jc = $bdd->query("SELECT name_country FROM country ORDER BY name_country ASC");
                                    while ($val_jc = $req_jc->fetch()){?>
                                    <option value="<?php echo $val_jc['name_country']; ?>"><?php echo $val_jc['name_country']; ?></option>
                                <?php }?>

                                </select>
                            </p>
                            
                                                            
                            <p>
                            <label> Websites</label>
                            <span class="field"><input type="text" name="websites" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label> Logo</label>
                            faire champ pour upload photo
                        </p>
                       
                        <p>
                            <label> Category</label>
                            <span class="field"><input type="text" name="category" class="input-xxlarge" required="required" /></span>
                        </p>
                        
						<p>
                            <label>Category Product</label>
                            <select class="select" name="category_product" id="category_product">
                                <?php foreach($categoriesList as $indCat => $valCat){?>
                                <option value="<?php echo $indCat; ?>"><?php echo $valCat; ?></option>
                                <?php } ?>
                            </select>
                        </p>
                        
						<p>
                            <label>Subcategory</label>
                            <select class="select" name="subcategory" id="subcategory" >
                                <option value="sdfg"> dfsg</option>
                            </select>                               
                        </p>
                        
                        <h4> Stats validation </h4></br>
                        
						<p>
                            <label>URL of the platform</label>
                            <span class="field"><input type="text" name="url" class="input-xxlarge" required="required" /></span>
                        </p>
                        
						<p>
                            <label>Username</label>
                            <span class="field"><input type="text" name="username" class="input-xxlarge" required="required" /></span>
                        </p>
							
						<p>
                            <label>Password</label>
                            <span class="field"><input type="text" name="password" class="input-xxlarge" required="required" /></span>
                        </p>
						
						<p>
                            <label>Validation delay</label>
                            <span class="field"><input type="text" name="validation_delay" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <h4> Invoice contact </h4></br>
						
						<p>
                            <label>Name</label>
                            <span class="field"><input type="text" name="name_invoice_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
						<p>
                            <label>Email</label>
                            <span class="field"><input type="text" name="email_invoice_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
						<p>
                            <label>VAT</label>
                            <span class="field"><input type="text" name="vat" class="input-xxlarge" required="required" /></span>
                        </p>
                        
						<p>
                            <label>IBAN</label>
                            <span class="field"><input type="text" name="iban" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>SWIFT</label>
                            <span class="field"><input type="text" name="SWIFT" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Invoicing period </label>                                    
                            <select class="select" name="invoicing_period" id="invoicing_period" >
                                <option value="15"> 15</option>
                                <option value="30"> 30</option>
                                <option value="45"> 45</option>
                                <option value="60"> 60</option>
                                <option value="75"> 75</option>
                                <option value="90"> 90</option>
                            </select>
                        </p>
                        
                        <h4> Management contact </h4></br>
                        
                        <p>
                            <label>Name</label>
                            <span class="field"><input type="text" name="name_management_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Email</label>
                            <span class="field"><input type="text" name="email_management_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Telephone</label>
                            <span class="field"><input type="text" name="telephone" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Skype</label>
                            <span class="field"><input type="text" name="skype" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Language</label>
                            <select class="select" name="partner_name" id="partner_name" >
                                    <?php 
                                    $req_jc = $bdd->query("SELECT language FROM language ORDER BY language ASC");
                                    while ($val_jc = $req_jc->fetch()){?>
                                    <option value="<?php echo $val_jc['language']; ?>"><?php echo $val_jc['language']; ?></option>
                                    <?php }?>
                            </select>
                        </p>
                        
                        <p>
                            <label>Status</label>
                            <select class="select" name="status" id="status" >
                                <option value="active"> active</option>
                                <option value="non active"> non active</option>
                                <option value="prospect adviser"> prospect adviser</option>
                            </select> 
                        </p>
                            
                            
                            
                            
                            <p class="stdformbutton">
                                <button class="btn btn-primary">Submit Button</button>
                                <button type="reset" class="btn">Reset Button</button>
                            </p>
                        </form>
                    </div>				
				
<!--Partie Romain ------------------------------------------------------------------------>				
				
                <div class="widgetcontent bordered shadowed nopadding">              	
                    <!-- START OF TABBED WIZARD -->
                    <form class="stdform stform2" method="post" action="">
                            <h4> Company information </h4></br>
                        <p>
                            <label>Company name</label>
                            <span class="field"><input type="text" name="company_name" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Adresse</label>
                            <span class="field"><input type="text" name="adresse" class="input-xxlarge" required="required" /></span>
                        </p>
                  
                        <p>
                            <label>Country</label>
                            <select class="select" name="country" id="country" >
                                <?php 
                                    $req_jc = $bdd->query("SELECT name_country FROM country ORDER BY name_country ASC");
                                    while ($val_jc = $req_jc->fetch()){?>
                                    <option value="<?php echo $val_jc['name_country']; ?>"><?php echo $val_jc['name_country']; ?></option>
                                <?php }?>

                            </select> 
                        </p>  
                        
                        <p>
                            <label> Websites</label>
                            <span class="field"><input type="text" name="websites" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label> Logo</label>
                            faire champ pour upload photo
                        </p>
                       
                        <p>
                            <label> Category</label>
                            <span class="field"><input type="text" name="category" class="input-xxlarge" required="required" /></span>
                        </p>
                        
						<p>
                            <label>Category Product</label>
                            <select class="select" name="category_product" id="category_product">
                                <?php foreach($categoriesList as $indCat => $valCat){?>
                                <option value="<?php echo $indCat; ?>"><?php echo $valCat; ?></option>
                                <?php } ?>
                            </select>
                        </p>
                        
						<p>
                            <label>Subcategory</label>
                            <select class="select" name="subcategory" id="subcategory" >
                                <option value="sdfg"> dfsg</option>
                            </select>                               
                        </p>
                        
                        <h4> Stats validation </h4></br>
                        
						<p>
                            <label>URL of the platform</label>
                            <span class="field"><input type="text" name="url" class="input-xxlarge" required="required" /></span>
                        </p>
                        
						<p>
                            <label>Username</label>
                            <span class="field"><input type="text" name="username" class="input-xxlarge" required="required" /></span>
                        </p>
							
						<p>
                            <label>Password</label>
                            <span class="field"><input type="text" name="password" class="input-xxlarge" required="required" /></span>
                        </p>
						
						<p>
                            <label>Validation delay</label>
                            <span class="field"><input type="text" name="validation_delay" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <h4> Invoice contact </h4></br>
						
						<p>
                            <label>Name</label>
                            <span class="field"><input type="text" name="name_invoice_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
						<p>
                            <label>Email</label>
                            <span class="field"><input type="text" name="email_invoice_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
						<p>
                            <label>VAT</label>
                            <span class="field"><input type="text" name="vat" class="input-xxlarge" required="required" /></span>
                        </p>
                        
						<p>
                            <label>IBAN</label>
                            <span class="field"><input type="text" name="iban" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>SWIFT</label>
                            <span class="field"><input type="text" name="SWIFT" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Invoicing period </label>                                    
                            <select class="select" name="invoicing_period" id="invoicing_period" >
                                <option value="15"> 15</option>
                                <option value="30"> 30</option>
                                <option value="45"> 45</option>
                                <option value="60"> 60</option>
                                <option value="75"> 75</option>
                                <option value="90"> 90</option>
                            </select>
                        </p>
                        
                        <h4> Management contact </h4></br>
                        
                        <p>
                            <label>Name</label>
                            <span class="field"><input type="text" name="name_management_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Email</label>
                            <span class="field"><input type="text" name="email_management_contact" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Telephone</label>
                            <span class="field"><input type="text" name="telephone" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Skype</label>
                            <span class="field"><input type="text" name="skype" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Language</label>
                            <select class="select" name="partner_name" id="partner_name" >
                                    <?php 
                                    $req_jc = $bdd->query("SELECT language FROM language ORDER BY language ASC");
                                    while ($val_jc = $req_jc->fetch()){?>
                                    <option value="<?php echo $val_jc['language']; ?>"><?php echo $val_jc['language']; ?></option>
                                    <?php }?>
                            </select>
                        </p>
                        
                        <p>
                            <label>Status</label>
                            <select class="select" name="status" id="status" >
                                <option value="active"> active</option>
                                <option value="non active"> non active</option>
                                <option value="prospect adviser"> prospect adviser</option>
                            </select> 
                        </p>
                        
                        
                        <p class="stdformbutton">
                            <button class="btn btn-primary">Submit Button</button>
                            <button type="reset" class="btn">Reset Button</button>
                        </p>	
                        
                    </form>               
                    
                </div><!--widgetcontent-->        
				
            </div><!--contentinner-->
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
