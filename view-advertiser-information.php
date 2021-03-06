<?php
// On inclut la page de paramÃ¨tre de connection.
include('conf.php');
include('class/advertiser.class.php');
include('class/categoryproduct.class.php');

// On vÃ©rifie que le user est connectÃ© sinon on le renvoie Ã  la page de connection
session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}
$filters['field'] = 'id_advertiser';
$filters['value'] = $_GET['id'];
$id_adv = $_GET['id'];
$viewAdvertiser = new Advertiser();
$viewAdvertiser->getAdvertisers($filters);
$viewCategory = new CategoryProduct();
$viewCategory->getCategory($id_adv);
?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sharemyclick admin platform V1.0</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->
</head>

<body>


	
	<?php include ('./menu/menu-left.php');
        if(isset($_POST['submit_advertiser'])){
        echo  "Result : ".$message;
     }
        ?>
    
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
        	<h1> Advertiser's information</h1> <span><?php echo $_SESSION['login']; ?> , here the informations of the company.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed">Advertiser informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <form name="form_advertiser" class="stdform stdform2" method="post" action="update-advertiser.php" enctype="multipart/form-data">
                        
                        <input type="hidden" name="id_advertiser" value="<?php echo $filters['value'] ;?>">
                        
                        <p>
                            <label>Company name *</label>
                            <span class="field"><input type="text" value="<?php echo $viewAdvertiser->advertisers[0]['company_name']; ?>" name="company_name" class="input-xxlarge" readonly="readonly" /></span>
                        </p>

                        <p>
                            <label>Address *</label>
                        <span class="field"><input type="text" id="address"  name="address" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['address']; ?>" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                            <label>Telephone Company</label>
                        <span class="field"><input type="text" name="telephone_company" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['telephone_company']; ?>" readonly="readonly"/></span>
                        </p>

                        <p>
                            <label>Country *</label>
                            
                            <span class="field">
                                
                                    <input type="text" name="country" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['country']; ?>" readonly="readonly"/>
                            </span>
                            
                        </p>
                            
                                                            
                        <p>
                            <label> Website *</label>
                            <span class="field"><input type="url" name="websites" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['websites']; ?>" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                           <label>Logo</label>
                           <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
                           <span class="field"><img src="<?php echo 'http://localhost/campaigns/img/logo/'.$viewAdvertiser->advertisers[0]['logo'] ?>" height="180" width="98"></span>
			</p>
                        
                        <p>
                            <label> Company type</label>
                                <span class="field"><input type="url" name="company_type" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['company_type']; ?>" readonly="readonly"/></span>
                            </span>  
                        </p>
                        
						<p>
                            <label>Category Product</label>
                            
                            <span class="field">
                               <input type="text" name="id_company_product" class="input-xxlarge" value="<?php echo $viewCategory->categoryselect['name_category']."-".$viewCategory->categoryselect['mother_category'] ?>" readonly="readonly"/>
                            </span>  
                            
                        </p>
                        
                                               
                        <h4 class="widgettitle nomargin shadowed"> Stats validation </h4>
                        
                        <p>
                            <label>URL of the platform *</label>
                            <span class="field"><input type="url" name="url" id="url" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['url']; ?>" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                            <label>Username *</label>
                            <span class="field"><input type="text" name="username" id="username" class="input-xxlarge"  value="<?php echo $viewAdvertiser->advertisers[0]['username']; ?>" readonly="readonly"/></span>
                        </p>
							
                        <p>
                            <label>Password *</label>
                            <span class="field"><input type="text" name="password" id="password" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['password']; ?>" readonly="readonly"/></span>
                        </p>
                        
                         <p>
                            <label>Validation delay</label>
                            <span class="field"><input type="text" name="validation_delay" id="validation_delay" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['validation_delay']; ?>" readonly="readonly"/></span>
                        </p>
						
                        <h4 class="widgettitle nomargin shadowed">Invoice contact </h4>
						
                        <p>
                            <label>Name</label>
                            <span class="field"><input type="text" name="name_invoice_contact" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['invoice_name']; ?>" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                            <label>Email</label>
                            <span class="field"><input type="email" name="email_invoice_contact" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['invoice_email']; ?>" readonly="readonly" /></span>
                        </p>
                        
                        <p>
                            <label>VAT *</label>
                            <span class="field"><input type="text" name="vat" class="input-xxlarge" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                            <label>IBAN *</label>
                            <span class="field"><input type="text" name="iban" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['iban']; ?>" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                            <label>SWIFT *</label>
                            <span class="field"><input type="text" name="swift" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['swift']; ?>" readonly="readonly" /></span>
                        </p>
                        
                        <p>
                            <label>Invoicing period *</label>    
                            
                            <span class="field"><input type="text" name="skype" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['invoicing_contact']; ?>" readonly="readonly"/></span>
                            
                        </p>
                        
                        <h4 class="widgettitle nomargin shadowed">Management contact</h4>
                        
                        
                        <p>
                            <label>Name *</label>
                            <span class="field"><input type="text" name="name_management_contact" class="input-xxlarge"value="<?php echo $viewAdvertiser->advertisers[0]['management_name']; ?>" readonly="readonly" /></span>
                        </p>
                        
                        <p>
                            <label>Email *</label>
                            <span class="field"><input type="email" name="email_management_contact" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['management_email']; ?>" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                            <label>Telephone Management contact *</label>
                            <span class="field"><input type="tel" name="telephone_management_contact" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['telephone']; ?>" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                            <label>Skype</label>
                            <span class="field"><input type="text" name="skype" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['skype']; ?>" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                            <label>Language</label>
                           
                            
                           <span class="field"><input type="text" name="skype" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['conversation_language']; ?>" readonly="readonly"/></span>
                            
                        </p>
                        
                        <p>
                            <label>Status *</label>
                           <span class="field"><input type="text" name="skype" class="input-xxlarge" value="<?php echo $viewAdvertiser->advertisers[0]['status']; ?>" readonly="readonly"/></span>                        
                        </p>
                            
                        <p class="stdformbutton" style="text-align: center">
                            <button type="submit" name="update_advertiser" id="update_advertiser" class="btn btn-primary"> Update informations</button>
                            
                            <a href="view-advertiser.php"
                                <button type="button" name="view_all_advertiser" id="view_all_advertiser" class="btn btn-primary"> View all advertisers</button>
                            </a>
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
