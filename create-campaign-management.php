<?php

include('conf.php');
include('class/campaignmanagement.class.php');
include('class/advertiser.class.php');
include('class/categoryproduct.class.php');
include('class/country.class.php');

session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}

$objCampaignManagement = new CampaignManagement();
$resultCampaignManagement = $objCampaignManagement->getCampaignManagementsList();

$objAdvertiser = new Advertiser();
$resultAdvertiser = $objAdvertiser->getAdvertisers();

//$objCompany = new AffiliateCompany();
//$resultCompany = $objCompany->getAffiliateCompanyTable();

 $objCountry = new Country();
$resultCountry = $objCountry->getCountryList();

$objCategoryProduct = new CategoryProduct();
$result = $objCategoryProduct->getCategoriesList();

 if(isset($_POST['submit_campaign_management'])){
     
       $message = $objCampaignManagement->createCampaignManagement($_POST);
     
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
        	<h1>Create Campaigns Management</h1> <span><?php echo $_SESSION['login']; ?> , please enter all the details for the creation of the campaigns management.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
                
                <?php
                     if(isset($_POST['submit_campaign_management']))
                         {
                         ?>   <h4 class='confirmation' style="text-align: center" ">The Campaigns Management has been created </h4> </br> 
                         <p class="stdformbutton" style="text-align: center">
                             <a href="create-campaign-management.php"
                             <button type="button" name="create_campaign management_redirection" id="create_campaigns-management_redirection" class="btn btn-primary" >Create another campaign management </button>
                             </a>
                             <a href="view-campaigns-management.php"
                            <button type="button" name="view-campaigns-management" id="view-campaigns-management" class="btn btn-primary">View Campaigns Management </button>
                             </a>
                        </p>
                    <?php ;}
                Else { ?>
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed">Campaigns Management informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <form name="form_advertiser" class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                        <p>
                            <label> Name *</label>
                            <span class="field"><input type="text" name="name" class="input-xxlarge" required="required" /></span>
                        </p>
                         <p>
                            <label>Advertiser *</label>
                            <span class="field">
                                <select name="id_advertiser" id="id_advertiser" class="status">
                                        <?php 
                                        foreach($objAdvertiser->advertisers as $indAdvertiser => $valAdvertiser){?>
                                        
                                    <option value="<?php echo $valAdvertiser['id_advertiser']; ?>"  ><?php echo $valAdvertiser['company_name']; ?> </option>
                                            </option>
                                <?php } ?>
                                </select>
                            </span>
                            
                        </p>

                        <p>
                            <label>Payout for Affiliate *</label>
                        <span class="field"><input type="text" id="payout_affiliate"  name="payout_affiliate" class="status" required="required" /></span>
                        </p>
                        
                        <p>
                            <label>Payout for SMC *</label>
                            <span class="field">
                               <input type="text" id="email"  name="payout_smc" class="status" required="required" />
                            </span>
                            
                        </p>
                             <p>
                            <label>Type of Payout *</label>
                            <span class="field">
                                <select name="type_payout_management" id="type_payout" class="status">
                                        <option value="CPC"> CPC</option>
                                        <option value="CPM"> CPM</option>
                                        <option value="CPL">CPL</option>
                                        <option value="CPA">CPA</option>
                                        <option value="C2L">C2L</option>
                                        <option value="CPV">CPV</option>

                                </select>                        
                            </span>
                            
                        </p>                                 
                        <p>
                            <label> Allowed *</label>
                            <span class="field"><select name="allowed" id="type_payout" class="status">
                                        <option value=" Not Allowed"> Not Allowed</option>
                                        <option value="Allowed"> Allowed</option>
                                        <option value="Could be allowed in DOI">Could be allowed in DOI</option>
                                        

                                </select> </span>
                        </p>
                               <p>
                            <label> Conversion *</label>
                            <span class="field"><select name="conversion" id="type_payout" class="status">
                                        <option value="On Purchase"> On Purchase</option>
                                        <option value="Single Optin"> Single Optin</option>
                                        <option value="Double Optin">Double Optin</option>
                                          <option value="Single or Double Optin"> Single or Double Optin</option>

                                </select> </span>
                        </p>  
                         <p>
                            <label> Device *</label>
                            <span class="field"><select name="device" id="type_payout" class="status">
                                        <option value="Desktop"> Desktop</option>
                                        <option value="Mobile"> Mobile</option>
                                        <option value="Both">Both</option>
                                        

                                </select> </span>
                        </p>
			<p>
                            <label>Category</label>
                            
                           <span class="field">
                                <select name="id_category" id="id_category_product" class="status">
                                        <?php 
                                        foreach($objCategoryProduct->categories_list as $indCat => $valCat){?>
                                    
                                        
                                    <option value="<?php echo $valCat['id']; ?>" <?php if($valCat['type']==0){?> class="option"   style="color:black;" <?php } else {?> style="text-align:center; color:grey;" <?php }?> > <?php if($valCat['type']==0){} else { ?>&nbsp &nbsp &nbsp  <?php        } echo $valCat['name']; ?></option>
                                            </option>
                                <?php } ?>
                                </select>
                            </span>  
                            
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
                            <label> Thumbnail *</label>
                            <span class="field">
                                
                                <input type="text" name="thumbnail" class="status" required="required" />
                            </span>
                            </p>
                        
                        
                      
                        
                        <p class="stdformbutton">
                            <button type="submit" name="submit_campaign_management" id="submit_campaign_management" class="btn btn-primary">Create </button>
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