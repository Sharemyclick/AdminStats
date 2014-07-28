<?php
// On inclut la page de paramÃ¨tre de connection.
include('conf.php');
include('class/database.class.php');
include('class/affiliatemanager.class.php');
include('class/country.class.php');


// On vÃ©rifie que le user est connectÃ© sinon on le renvoie Ã  la page de connection
session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}
$filters['field'] = 'id_database';

if(isset($_POST['id']) || isset($_GET['id']))
{$filters['value'] = (isset($_GET['id']))?$_GET['id']:$_POST['id'];}
/*
 if($_GET['id']) 
    $filters['value'] = $_GET['id'];
 else
  $filters['value'] = $_POST['id'];
 */



$viewAffiliateManager = new AffiliateManager();
$viewAffiliateManager->getAffiliateManagersList();


$objCountry = new Country();
$resultCountry = $objCountry->getCountryList();

$objDatabase = new Database();
$resultDatabase = $objDatabase->getDatabaseInformation($filters['value']);


if(isset($_POST['submit_update']))
    {
         $updateDatabase= new Database();
        $updateDatabase->updateDatabase($filters['value'],$_POST);
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
        	<h1> Database's information</h1> <span><?php echo $_SESSION['login']; ?> , here the informations of the database.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
                
                <?php
                     if(isset($_POST['submit_update'])){
                         ?>   <h4 class='confirmation' style="text-align: center" ">Informations have been updated. </h4> </br> 
                
                         <span class="field" >
                             <div class="widgetcontent">
                                 
                                 <p class="stdformbutton" style="text-align: center">
                                     <a href="update-affiliate-manager-globalview.php" >
                                        <button type="button" name="return_all_advertiser" id="return_all_affiliate_manager" class="btn btn-primary" >Update another database </button>
                                      </a>
                                     <a href="view-affiliate-manager.php" >
                                        <button type="button" name="view_all_affiliate" id="view_all_affiliate_manager" class="btn btn-primary" >View all database </button>
                                      </a>
                                </p>
                                
                                
                                 
                            </div>
                         </span>
                <?php ;}
                else {?>
                
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed">Database informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <form name="form_affiliate_manager" class="stdform stdform2" method="post" action="update-affiliate-manager.php" enctype="multipart/form-data">
                        
                        <input type="hidden" name="id" value="<?php echo $filters['value'] ;?>">
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
                            <label> Email *</label>
                            <span class="field"><input type="email" name="email" class="input-xxlarge" value="<?php echo $viewAffiliateManager->affiliate_manager['email']; ?>" /></span>
                        </p>
                         <p>
                            <label> Skype *</label>
                            <span class="field"><input type="text" name="skype" class="input-xxlarge" value="<?php echo $viewAffiliateManager->affiliate_manager['skype']; ?>" /></span>
                        </p>
                         <p>
                            <label> Telephone *</label>
                            <span class="field"><input type="tel" name="telephone" class="input-xxlarge" value="<?php echo $viewAffiliateManager->affiliate_manager['telephone']; ?>" /></span>
                        </p>
                         <p>
                            <label> Affiliate_company</label>
                          <span class="field">
                              <select name="id_affiliate_company" id="id_affiliate_company" class="status">
                                        <?php 
                                        if(($viewAffiliateManager->affiliate_manager['id_affiliate_company'] === NULL)){ echo '<option value="" selected></option>' ;} 
                                       
                                        foreach($objCompany->affiliate_company_table as $indHq => $valHq){?>
                                    <option value="<?php echo $valHq['id_affiliate_company']; ?>" <?php if($viewAffiliateManager->affiliate_manager['id_affiliate_company'] === $valHq['id_affiliate_company']){?> selected <?php } ?>  ><?php echo $valHq['company_name']; ?> </option>
                                            </option>
                                <?php }; ?>
                                </select>
                          </span>
                              
                        </p>
                        <p>
                            <label>Country *</label>
                            
                            <span class="field">
                            
                            <select name="id_country" id="country" class="status">
                                        <?php 
                                        foreach($objCountry->countryselect as $indCountry => $valCountry){?>
                                        
                                    <option value="<?php echo $valCountry['id_country']; ?>" <?php if($viewAffiliateManager->affiliate_manager['id_country'] == $valCountry['id_country']){?> selected <?php } ?>  ><?php echo $valCountry['name_country']; ?> </option>
                                            </option>
                                <?php }; ?>
                                </select>
                            
                            </span>
                            
                        </p>
                            
                                                            
                        <p>
                            <label> Date of Birth *</label>
                            <span class="field"><input type="date" name="date_birth" class="status" value="<?php echo $viewAffiliateManager->affiliate_manager['date_birth']; ?>" /></span>
                        </p>
                        
                        
                        
                        <p>
                            <label>Status</label>
                            
                            <span class="field">
                            
                            <select name="manager_status" id="manager_status" class="status">
                                        <option value="Opportunity" <?php if($viewAffiliateManager->affiliate_manager['manager_status']==='Opportunity'){ echo 'selected';}  ?>> Opportunity</option>
                                        <option value="Delete" <?php if($viewAffiliateManager->affiliate_manager['manager_status']==='Delete'){ echo 'selected';}  ?>> Delete</option>
                                        <option value="In contact"<?php if($viewAffiliateManager->affiliate_manager['manager_status']==='In contact'){ echo 'selected';}  ?>> In contact</option>
                                        <option value="In business"<?php if($viewAffiliateManager->affiliate_manager['manager_status']==='In business'){ echo 'selected';}  ?>> In business</option>

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

