<?php

include('conf.php');
include('class/affiliatecompany.class.php');
include('class/category.class.php');
include('class/country.class.php');

session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}

$objHeadquarter = new AffiliateCompany();
$resultHeadquarter = $objHeadquarter->getAffiliateCompanyList();
$objCountry = new Country();
$resultCountry = $objCountry->getCountryList();

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
        	<h1>Create Affiliate Company</h1> <span><?php echo $_SESSION['login']; ?> , please enter all the details for the creation of the affiliate company.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
                
                <?php
                     if(isset($_POST['submit_advertiser'])){
                         ?>   <h4 class='confirmation' style="text-align: center" ">The Affiliate company has been created </h4> </br> <?php ;}
                ?>
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed">Affiliate Company informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <form name="form_advertiser" class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                        <p>
                            <label>Company name *</label>
                            <span class="field"><input type="text" name="company_name" class="input-xxlarge" required="required" /></span>
                        </p>

                        <p>
                            <label>Address *</label>
                        <span class="field"><input type="text" id="address"  name="address" class="input-xxlarge" required="required" /></span>
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
                            <label> Website *</label>
                            <span class="field"><input type="url" name="websites" class="input-xxlarge" required="required" /></span>
                        </p>
                                         
			<p>
                            <label>Headquarter</label>
                            
                            <span class="field">
                                <select name="headquarter" id="headquarter" class="status">
                                        <?php 
                                        foreach($objHeadquarter->affiliate_companiesSql as $indCompany => $nameCompany){?>
                                                 <option value="<?php echo $nameCompany['id_affiliate_company']; ?>" ><?php  echo $nameCompany['company_name']; ?></option>
                                                 </option>
                                <?php } ?>
                                </select>
                            </span>  
                            
                        </p>
                        
                        <p>
                            <label> Type of Affiliate *</label>
                            <span class="field"><input type="url" name="type_affiliate" class="input-xxlarge" required="required" /></span>
                        </p>
                        
                        <p>
                            <label> Status</label>
                            <span class="field">
                                
                                <?php 
                                        foreach($objHeadquarter->categories_list as $indCompany => $nameCompany){?>
                                                 <option value="<?php echo $nameCompany['id_affiliate_company']; ?>" ><?php  echo $nameCompany['company_name']; ?></option>
                                                 </option>
                                <?php } ?>
                                
                            </span>
                        </p>
                        
                        <p class="stdformbutton">
                            <button type="submit" name="submit_affiliate_company" id="submit_affiliate_company" class="btn btn-primary">Create </button>
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
}