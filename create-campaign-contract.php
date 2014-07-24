<?php

include('conf.php');
include('class/campaigncontract.class.php');
include('class/database.class.php');
include('class/campaignmanagement.class.php');


session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}

$objCampaignContract = new CampaignContract();
$resultCampaignContract = $objCampaignContract->getCampaignContractsList();

$objDatabase = new Database();
$resultDatabase = $objDatabase->getDatabasesListSimple();

$viewCampaignManagement = new CampaignManagement();
$resultCampaignManagement = $viewCampaignManagement->getCampaignManagementsList();



 if(isset($_POST['submit_campaign_contract'])){
     $createCampaignContract = new CampaignContract();
       $message = $createCampaignContract->createCampaignContract($_POST);
     
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
        	<h1>Create Campaigns Contract</h1> <span><?php echo $_SESSION['login']; ?> , please enter all the details for the creation of the campaigns management.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
                
                <?php
                     if(isset($_POST['submit_campaign_contract']))
                         {
                         ?>   <h4 class='confirmation' style="text-align: center" ">The Campaigns Contract has been created </h4> </br> 
                         <p class="stdformbutton" style="text-align: center">
                             <a href="create-campaign-contract.php"
                             <button type="button" name="create_campaign contract_redirection" id="create_campaigns-contract_redirection" class="btn btn-primary" >Create another campaign contract </button>
                             </a>
                             <a href="view-campaign-contract.php"
                            <button type="button" name="view-campaign-contract" id="view-campaigns-contract" class="btn btn-primary">View Campaigns Contract </button>
                             </a>
                        </p>
                    <?php ;}
                Else { ?>
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed">Campaigns Contract informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <form name="form_advertiser" class="stdform stdform2" method="post" action="" enctype="multipart/form-data">
                        <p>
                            <label> Date *</label>
                            <span class="field"><input type="date" name="date_contract" id="date_contract" class="input-xxlarge" required="required" /></span>
                        </p>
                         <p>
                            <label>Database *</label>
                            <span class="field">
                                <select name="id_database" id="id_database" class="status">
                                        <?php 
                                        foreach($objDatabase->databases_list as $indAdvertiser => $valAdvertiser){?>
                                        
                                    <option value="<?php echo $valAdvertiser['id_database']; ?>"  ><?php echo $valAdvertiser['database_name']; ?> </option>
                                            </option>
                                <?php } ?>
                                </select>
                            </span>
                            
                        </p>

                        <p>
                            <label>Price *</label>
                        <span class="field"><input type="text" id="price"  name="price" class="status" required="required" /></span>
                        </p>
                        
                       <p>
                            <label>Campaign Management *</label>
                            <span class="field">
                                <select name="id_campaign_management" id="id_campaign_management" class="status">
                                        <?php 
                                        foreach($viewCampaignManagement->campaign_managements_list as $indAdvertiser => $valAdvertiser){?>
                                        
                                    <option value="<?php echo $valAdvertiser['id_campaign_management']; ?>"  ><?php echo $valAdvertiser['name']; ?> </option>
                                            </option>
                                <?php } ?>
                                </select>
                            </span>
                            
                        </p>
                             <p>
                            <label>Type of Payout *</label>
                            <span class="field">
                                <select name="type_payout" id="type_payout" class="status">
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
                            <label>Leads *</label>
                        <span class="field"><input type="text" id="leads"  name="leads" class="status" required="required" /></span>
                        </p>  <p>
                            <label>Impressions *</label>
                        <span class="field"><input type="text" id="impressions"  name="impressions" class="status" required="required" /></span>
                        </p>  <p>
                            <label>Clics *</label>
                        <span class="field"><input type="text" id="clics"  name="clics" class="status" required="required" /></span>
                        </p>
                        
                      
                        
                        <p class="stdformbutton">
                            <button type="submit" name="submit_campaign_contract" id="submit_campaign_contract" class="btn btn-primary">Create </button>
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
