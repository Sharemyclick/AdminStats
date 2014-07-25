<?php
// On inclut la page de paramÃ¨tre de connection.
include('conf.php');
include('class/campaignmanagement.class.php');
include('class/advertiser.class.php');
include('class/categoryproduct.class.php');
include('class/country.class.php');


// On vÃ©rifie que le user est connectÃ© sinon on le renvoie Ã  la page de connection
session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}
$filters['field'] = 'id_affiliate_manager';

if(isset($_POST['id']) || isset($_GET['id']))
{$filters['value'] = (isset($_GET['id']))?$_GET['id']:$_POST['id'];}
/*
 if($_GET['id']) 
    $filters['value'] = $_GET['id'];
 else
  $filters['value'] = $_POST['id'];
 */



$viewCampaignManagement = new CampaignManagement();
$resultCampaignManagement = $viewCampaignManagement->getCampaignManagementsInfo($filters['value']);

$objAdvertiser = new Advertiser();
$resultAdvertiser = $objAdvertiser->getAdvertisers();


$objCountry = new Country();
$resultCountry = $objCountry->getCountryList();

$objCategoryProduct = new CategoryProduct();
$result = $objCategoryProduct->getCategoriesList();


if(isset($_POST['submit_update']))
    {
         $updateCampaignManagement= new CampaignManagement();
        $updateCampaignManagement->updateCampaignManagement($filters['value'],$_POST);
    }


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
        	<h1> Manager's information</h1> <span><?php echo $_SESSION['login']; ?> , here the informations of the manager.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
                
                <?php
                     if(isset($_POST['submit_update'])){
                         ?>   <h4 class='confirmation' style="text-align: center" ">Informations have been updated. </h4> </br> 
                
                         <span class="field" >
                             <div class="widgetcontent">
                                 
                                 <p class="stdformbutton" style="text-align: center">
                                     <a href="update-campaign-management-globalview.php" >
                                        <button type="button" name="return_all_advertiser" id="return_all_affiliate_manager" class="btn btn-primary" >Update another campaign </button>
                                      </a>
                                     <a href="view-campaigns-management.php" >
                                        <button type="button" name="view_all_affiliate" id="view_all_affiliate_manager" class="btn btn-primary" >View all campaigns </button>
                                      </a>
                                </p>
                                
                                
                                 
                            </div>
                         </span>
                <?php ;}
                else {?>
                
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed">Campaign informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <form name="form_affiliate_manager" class="stdform stdform2" method="post" action="update-campaign-management.php" enctype="multipart/form-data">
                        
                        <input type="hidden" name="id" value="<?php echo $filters['value'] ;?>">
                         <?php //echo '<pre>', var_dump($viewAffiliateCompany->affiliate_company), '</pre>'; ?>
                        <p>
                            <label>name *</label>
                            <span class="field"><input type="text" value="<?php echo $viewCampaignManagement->campaign_managements_info['name']; ?>" name="name" class="input-xxlarge" /></span>
                        </p>

                        <p>
                            <label>Advertiser *</label>
                        <span class="field"><select name="id_advertiser" id="id_category_product" class="status">
                                        <?php 
                                        foreach($objAdvertiser->advertisers as $indAdv => $valAdv){?>
                                    
                                        
                                    <option value="<?php echo $valAdv['id_advertiser']; ?>" <?php if($viewCampaignManagement->campaign_managements_info['id_advertiser'] == $valAdv['id_advertiser']){?> selected <?php } ?>  ><?php echo $valAdv['company_name']; ?> </option>
                                            </option>
                                <?php } ?>
                                </select></span>
                        </p>
                         <p>
                             <label>Payout for Affiliate *</label>
                            <span class="field"><input type="text" name="payout_affiliate" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['payout_affiliate']; ?>" /></span>
                        </p>
                         <p>
                            <label>Payout for SMC *</label>
                            <span class="field"><input type="text" name="payout_smc" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['payout_smc']; ?>" /></span>
                        </p>
                         <p>
                            <label>Type of Payout *</label>
                             <span class="field">
                            <select name="type_payout_management" id="conversion" class="status">
                                        <option value="CPC" <?php if($viewCampaignManagement->campaign_managements_info['type_payout_management']==='CPC'){ echo 'selected';}  ?>> CPC</option>
                                       <option value="CPM" <?php if($viewCampaignManagement->campaign_managements_info['type_payout_management']==='CPM'){ echo 'selected';}  ?>> CPM</option>
                                       <option value="CPL" <?php if($viewCampaignManagement->campaign_managements_info['type_payout_management']==='CPL'){ echo 'selected';}  ?>> CPL</option>
                                       <option value="CPA" <?php if($viewCampaignManagement->campaign_managements_info['type_payout_management']==='CPA'){ echo 'selected';}  ?>> CPA</option>
                                       <option value="C2L" <?php if($viewCampaignManagement->campaign_managements_info['type_payout_management']==='C2L'){ echo 'selected';}  ?>> C2L</option>
                                       <option value="CPV" <?php if($viewCampaignManagement->campaign_managements_info['type_payout_management']==='CPV'){ echo 'selected';}  ?>> CPV</option>

                            </select>
                             </span>
                        </p>
                         <p>
                            <label> Allowed *</label>
                          <span class="field">
                             <select name="allowed" id="conversion" class="status">
                                        <option value="Not Allowed" <?php if($viewCampaignManagement->campaign_managements_info['allowed']==='Not Allowed'){ echo 'selected';}  ?>> Not Allowed</option>
                                        <option value="Allowed" <?php if($viewCampaignManagement->campaign_managements_info['allowed']==='Allowed'){ echo 'selected';}  ?>> Allowed</option>
                                        <option value="Could be allowed in DOI"<?php if($viewCampaignManagement->campaign_managements_info['allowed']==='Could be allowed in DOI'){ echo 'selected';}  ?>> Could be allowed in DOI</option>
                                       

                            </select>
                          </span>
                              
                        </p>
                        
                        <p>
                            <label> Conversion *</label>
                            
                            <span class="field">
                            
                            <select name="conversion" id="conversion" class="status">
                                        <option value="Single Optin" <?php if($viewCampaignManagement->campaign_managements_info['conversion']==='Single Optin'){ echo 'selected';}  ?>> Single Optin</option>
                                        <option value="Double Optin" <?php if($viewCampaignManagement->campaign_managements_info['conversion']==='Double Optin'){ echo 'selected';}  ?>> Double Optin</option>
                                        <option value="Single or Double Optin"<?php if($viewCampaignManagement->campaign_managements_info['conversion']==='Single or Double Optin'){ echo 'selected';}  ?>> Single or Double Optin</option>
                                       

                            </select>  
                            
                            </span>  
                            
                        </p>
                        
                        <p>
                            <label> Device *</label>
                            
                            <span class="field">
                            
                            <select name="device" id="manager_status" class="status">
                                        <option value="Desktop" <?php if($viewCampaignManagement->campaign_managements_info['device']==='Desktop'){ echo 'selected';}  ?>> Desktop</option>
                                        <option value="Mobile" <?php if($viewCampaignManagement->campaign_managements_info['device']==='Mobile'){ echo 'selected';}  ?>> Mobile</option>
                                        <option value="Both"<?php if($viewCampaignManagement->campaign_managements_info['device']==='Both'){ echo 'selected';}  ?>> Both</option>
                                        

                            </select>  
                            
                            </span>  
                            
                        </p>
                        
                        <p>
                            <label>Category</label>
                            
                           <span class="field">
                                <select name="id_category" id="id_category_product" class="status">
                                        <?php 
                                        foreach($objCategoryProduct->categories_list as $indCat => $valCat){?>
                                    
                                        
                                    <option value="<?php echo $indCat; ?>" <?php if($viewCampaignManagement->campaign_managements_info['id_category_product'] == $indCat){?> selected <?php } ?> ><?php echo $valCat['name']; ?></option>
                                <?php } ?>
                                </select>
                            </span>  
                            
                        </p>
                        
                        <p>
                            <label>Country *</label>
                            
                            <span class="field">
                            
                            <select name="id_country" id="country" class="status">
                                        <?php 
                                        foreach($objCountry->countryselect as $indCountry => $valCountry){?>
                                        
                                    <option value="<?php echo $valCountry['id_country']; ?>" <?php if($viewCampaignManagement->campaign_managements_info['id_country'] == $valCountry['id_country']){?> selected <?php } ?>  ><?php echo $valCountry['name_country']; ?> </option>
                                            </option>
                                <?php }; ?>
                                </select>
                            
                            </span>
                            
                        </p>
                            
                                                            
                        <p>
                            <label> Thumbnail *</label>
                            <span class="field"><input type="text" name="thumbnail" class="status" value="<?php echo $viewCampaignManagement->campaign_managements_info['thumbnail']; ?>" /></span>
                        </p>
                        
                        
                        
                      
                        
                    
                        
                        <p class="stdformbutton" style="text-align: center">
                            <button type="submit" name="submit_update" id="submit_update" class="btn btn-primary"> Update informations</button>
                            
                        </p>
                <?php }; ?>
                                        
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
