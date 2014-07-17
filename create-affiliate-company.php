<?php

include('conf.php');
include('class/affiliatecompany.class.php');
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

$objTraffic = new AffiliateCompany();
$resultTraffic = $objTraffic->getAffiliateCompanyTrafficList(); 

$objTypeAffiliate = new AffiliateCompany();
$resultTypeAffiliate = $objTypeAffiliate ->getTypeAffiliateList();

//$objCategory = new Category();
//$result = $objCategory->getCategoriesList();

 if(isset($_POST['submit_affiliate_company'])){
     
       $message = $objHeadquarter->createAffiliateCompany($_POST);
     
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
                     if(isset($_POST['submit_affiliate_company']))
                         {
                         ?>   <h4 class='confirmation' style="text-align: center" ">The Affiliate company has been created </h4> </br> 
                         <p class="stdformbutton" style="text-align: center">
                             <a href="create-affiliate-company.php"
                             <button type="button" name="create_affiliate_company_redirection" id="create_affiliate_company_redirection" class="btn btn-primary" >Create another affiliate company </button>
                             </a>
                             <a href="view-affiliate-company.php"
                            <button type="button" name="view_affiliate_company" id="view_affiliate_company" class="btn btn-primary">View affiliates companies </button>
                             </a>
                        </p>
                    <?php ;}
                Else { ?>
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
                                <select name="id_country" id="id_country" class="status">
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
                                <select name="id_hq" id="id_hq" class="status">
                                        
                                    <option value="" ></option>
                                                 
                                    
                                    <?php 
                                        foreach($objHeadquarter->affiliate_companies_list as $indCompany => $nameCompany){?>
                                                 <option value="<?php echo $nameCompany['id_affiliate_company']; ?>" ><?php  echo $nameCompany['company_name']; echo $nameCompany['id_affiliate_company'] ?></option>
                                                                         <?php }   ?>
                                </select>
                            </span>  
                            
                        </p>
                        
                        <p>
                            <label> Type of Affiliate *</label>
                            <span class="field">
                                
                                 <select name="id_type_affiliate" id="type_affiliate" class="status">
                                        <?php 
                                        foreach($objTypeAffiliate->type_affiliate_list as $indTypeAffiliate => $valTypeAffiliate){?>
                                        
                                    <option value="<?php echo $valTypeAffiliate['id_type_affiliate']; ?>"> <?php echo $valTypeAffiliate['type_affiliate']; ?> </option>
                                                                      <?php } ?>
                                </select>
                            </span>
                            </p>
                        
                        <p>
                            <label> Status</label>
                            <span class="field">
                                <select name="status" id="status" class="status">
                                        <option value="Opportunity"> Opportunity</option>
                                        <option value="Delete"> Delete</option>
                                        <option value="In contact"> In contact</option>
                                        <option value="In business"> In business</option>

                                </select>                        
                            </span>
                        </p>
                        
                        <p>
                            <label>Type of traffic *</label>
                            <span class="field">
                                <select name="id_traffic" id="id_traffic" class="status">
                                        <?php 
                                        foreach($objTraffic->affiliate_companies_traffic_list as $indTraffic => $valTraffic){?>
                                        
                                    <option value="<?php echo $valTraffic['id_traffic']; ?>"  ><?php echo $valTraffic['traffic']; ?> </option>
                                            </option>
                                <?php } ?>
                                </select>
                            </span>
                            
                        </p>
                        
                        <p class="stdformbutton">
                            <button type="submit" name="submit_affiliate_company" id="submit_affiliate_company" class="btn btn-primary">Create </button>
                            <button type="reset" class="btn">Reset </button>
                        </p>
                        
                        </form>
                    </div>				
                </div><!--contentinner-->
                </div><!--contentinner--> <?php }; ?>
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