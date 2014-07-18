<?php
// On inclut la page de paramÃ¨tre de connection.
include('conf.php');
include('class/affiliatemanager.class.php');
include('class/country.class.php');


// On vÃ©rifie que le user est connectÃ© sinon on le renvoie Ã  la page de connection
session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}
$filters['field'] = 'id_affiliate_manager';
$filters['value'] = '';
if(isset($_POST['id_affiliate_manager']) || isset($_GET['id']))
{$filters['value'] = (isset($_GET['id']))?$_GET['id']:$_POST['id_affiliate_manager'];}
/*
 if($_GET['id']) 
    $filters['value'] = $_GET['id'];
 else
  $filters['value'] = $_POST['id'];
 */

//echo $filters['value'];

$viewAffiliateManager = new AffiliateManager();
$viewAffiliateManager->getAffiliateManagerInformation($filters['value']);


$objCountry = new Country();
$resultCountry = $objCountry->getCountryList();




if(isset($_POST['submit_update']))
    {
         $updateAffiliateManager= new AffiliateManager();
        $updateAffiliateManager->updateAffiliateManager($filters['value'],$_POST);
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
                                     <a href="update-affiliate-company-globalview.php" >
                                        <button type="button" name="return_all_advertiser" id="return_all_affiliate_company" class="btn btn-primary" >Update another affiliate manager </button>
                                      </a>
                                     <a href="view-affiliate-company.php" >
                                        <button type="button" name="view_all_affiliate" id="view_all_affiliate_company" class="btn btn-primary" >View all affiliate manager </button>
                                      </a>
                                </p>
                                
                                
                                 
                            </div>
                         </span>
                <?php ;}
                else {?>
                
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed">Manager informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <form name="form_affiliate_manager" class="stdform stdform2" method="post" action="update-affiliate-manager.php" enctype="multipart/form-data">
                        
                        <input type="hidden" name="id_affiliate_manager" value="<?php echo $filters['value'] ;?>">
                         <?php //echo '<pre>', var_dump($viewAffiliateCompany->affiliate_company), '</pre>'; ?>
                        <p>
                            <label>Affiliate Manager name *</label>
                            <span class="field"><input type="text" value="<?php echo $viewAffiliateManager->affiliate_manager['name']; ?>" name="name" class="input-xxlarge" /></span>
                        </p>

                        <p>
                            <label>Affiliate Manager surname *</label>
                        <span class="field"><input type="text" id="surname"  name="surname" class="input-xxlarge" value="<?php echo $viewAffiliateManager->affiliate_manager['surname']; ?>" /></span>
                        </p>
                        
                        <p>
                            <label>Country *</label>
                            
                            <span class="field">
                            
                            <select name="id_country" id="country" class="status">
                                        <?php 
                                        foreach($objCountry->countryselect as $indCountry => $valCountry){?>
                                        
                                    <option value="<?php echo $valCountry['id_country']; ?>" <?php if($viewAffiliateManager->affiliate_manager['name_country'] == $valCountry['name_country']){?> selected <?php } ?>  ><?php echo $valCountry['name_country']; ?> </option>
                                            </option>
                                <?php }; ?>
                                </select>
                            
                            </span>
                            
                        </p>
                            
                                                            
                        <p>
                            <label> Website *</label>
                            <span class="field"><input type="url" name="websites" class="input-xxlarge" value="<?php echo $viewAffiliateManager->affiliate_manager['websites']; ?>" /></span>
                        </p>
                        
                        <p>
                            <label> Headquarter</label>
                          <span class="field">
                              <select name="id_hq" id="hq" class="status">
                                        <?php 
                                        if(($viewAffiliateCompany->affiliate_manager['hq_company_name'] === NULL)){ echo '<option value="" selected></option>' ;} 
                                        Else { echo '<option value="" ></option>' ;}
                                        foreach($objHq->affiliate_companies_list as $indHq => $valHq){?>
                                    <option value="<?php echo $valHq['id_affiliate_company']; ?>" <?php if($viewAffiliateManager->affiliate_manager['hq_company_name'] === $valHq['company_name']){?> selected <?php } ?>  ><?php echo $valHq['company_name']; ?> </option>
                                            </option>
                                <?php }; ?>
                                </select>
                          </span>
                              
                        </p>
                        
                        <p>
                            <label>Status</label>
                            
                            <span class="field">
                            
                            <select name="status" id="status" class="status">
                                        <option value="Opportunity" <?php if($viewAffiliateManager->affiliate_manager['status']==='Opportunity'){ echo 'selected';}  ?>> Opportunity</option>
                                        <option value="Delete" <?php if($viewAffiliateManager->affiliate_manager['status']==='Delete'){ echo 'selected';}  ?>> Delete</option>
                                        <option value="In contact"<?php if($viewAffiliateManager->affiliate_manager['status']==='In contact'){ echo 'selected';}  ?>> In contact</option>
                                        <option value="In business"<?php if($viewAffiliateManager->affiliate_manager['status']==='In business'){ echo 'selected';}  ?>> In business</option>

                            </select>  
                            
                            </span>  
                            
                        </p>
                        
                        <p>
                            <label>Traffic</label>
                            
                            <span class="field">
                               <select name="id_traffic" id="id_traffic" class="status">
                                        <?php 
                                        foreach($objTraffic->affiliate_companies_traffic_list as $indTraffic => $valTraffic){?>
                                        
                                    <option value="<?php echo $valTraffic['id_traffic']; ?>" <?php if($viewAffiliateManager->affiliate_manager['traffic'] == $valTraffic['traffic']){?> selected <?php } ?>  ><?php echo $valTraffic['traffic']; ?> </option>
                                            </option>
                                <?php } ?>
                                </select>
                            
                            </span>  
                            
                        </p>
                        
                        <p>
                            <label>Type of Affiliate</label>
                            
                            <span class="field">
                                                           
                               <select name="id_type_affiliate" id="type_affiliate" class="status">
                            
                                        <?php foreach($objTypeAffiliate->type_affiliate_list as $indTypeAffiliate => $valTypeAffiliate){?>
                                                                          
                                        <option value="<?php echo $valTypeAffiliate['id_type_affiliate']; ?>" <?php if($viewAffiliateManager->affiliate_manager['type_affiliate'] == $valTypeAffiliate['type_affiliate']){?> selected <?php } ?>  ><?php echo $valTypeAffiliate['type_affiliate']; ?> </option> <?php } ?>
                                </select>
                            
                            </span>  
                            
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
