<?php
// On inclut la page de paramÃ¨tre de connection.
include('conf.php');
include('class/campaignmanagement.class.php');
include('class/country.class.php');
include('class/categoryproduct.class.php');

// On vÃ©rifie que le user est connectÃ© sinon on le renvoie Ã  la page de connection
session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}
$filters['field'] = 'id_manager';
$filters['value'] = $_GET['id'];
$id_affiliate_manager = $_GET['id'];




//echo $filters['value'];

$viewCampaignManagement = new CampaignManagement();
$viewresultCampaignManagement = $viewCampaignManagement->getCampaignManagementsInfo($filters['value']);

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
        	<h1> Campaign Management's informations</h1> <span><?php echo $_SESSION['login']; ?> , here the informations of the campaign management.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed"> Campaign Management informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <form name="form_affiliate_company" class="stdform stdform2" method="post" action="update-campaign-management.php" enctype="multipart/form-data">
                        
                        <input type="hidden" name="id" value="<?php echo $filters['value'] ;?>">
                      
                        
                        <p>
                            <label> Campaign Management Name </label>
                            <span class="field"><input type="text" name="name" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['name']; ?>" /></span>
                        </p>

                        <p>
                            <label>Payout For Affiliate</label>
                        <span class="field"><input type="text" id="payout_affiliate"  name="payout_affiliate" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['payout_affiliate']; ?>" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                            <label>Payout For Sharemyclick</label>
                            
                            <span class="field">
                            <input type="text" name="payout_smc" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['payout_smc'] ?>" readonly="readonly"/>
                            </span>
                            
                        </p>
                            
                                                            
                        <p>
                            <label> Advertiser </label>
                            <span class="field"><input type="text" name="company_name" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['company_name']; ?>" readonly="readonly"/></span>
                        </p>
                        
                        <p>
                            <label> Type Payout</label>
                              <span class="field"> <input type="text" name="type_payout" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['type_payout_management']; ?>" readonly="readonly"/>     </span>
                            
                        </p>
                          
                        <p>
                            <label>Country</label>
                            
                            <span class="field">
                               <input type="text" name="company_name" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['name_country'] ?>" readonly="readonly"/>
                            </span>  
                            
                        </p>
                        <p>
                            <label>Allowed</label>
                            
                            <span class="field">
                               <input type="text" name="allowed" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['allowed'] ?>" readonly="readonly"/>
                            </span>  
                            
                        </p>
                          <p>
                            <label>Conversion</label>
                            
                            <span class="field">
                               <input type="text" name="conversion" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['conversion'] ?>" readonly="readonly"/>
                            </span>  
                            
                        </p>
                        <p>
                            <label>Device</label>
                            
                            <span class="field">
                               <input type="text" name="device" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['device'] ?>" readonly="readonly"/>
                            </span>  
                            
                        </p>
                        <p>
                            <label>Thumbnail</label>
                            
                            <span class="field">
                               <input type="text" name="thumbnail" class="input-xxlarge" value="<?php echo $viewCampaignManagement->campaign_managements_info['thumbnail'] ?>" readonly="readonly"/>
                            </span>  
                            
                        </p>
                        
                      
                        
                        <p class="stdformbutton">
                            <button type="submit" name="update_affiliate_manager" id="update_advertiser" class="btn btn-primary"> Update informations</button>
                            
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
