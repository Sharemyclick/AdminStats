<?php
// On inclut la page de paramÃ¨tre de connection.
include('conf.php');
include('class/campaigncontract.class.php');



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

$viewCampaignShoot = new CampaignContract();
$viewresultCampaignShoot = $viewCampaignShoot->getCampaignShootsInfo($filters['value']);

$viewCampaignContract = new CampaignContract();
$viewresultCampaignContract = $viewCampaignContract->getCampaignContractsInfo($filters['value']);

if(isset($_POST['submitAddPopup'])){
     $createCampaignShoot = new CampaignContract();
       $message = $createCampaignShoot->createCampaignShoot($_POST);
     
 }

?>

<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Sharemyclick admin platform V1.0</title>
<link rel="stylesheet" href="css/style.default.css" type="text/css" />
<link rel="stylesheet" href="prettify/prettify.css" type="text/css" />
<link rel="stylesheet" href="css/datepicker.css" type="text/css" />



<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/bootstrap-editable.js"></script>
<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script src="js/main.js"></script>
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
        	<h1> Campaign Shoot's informations</h1> <span><?php echo $_SESSION['login']; ?> , here the informations of the campaign shoot.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
            <div class="contentinner">
			<div class="widgetcontent">
			
            	<h4 class="widgettitle nomargin shadowed"> Campaign Contract informations</h4>
					
                <div class="widgetcontent bordered shadowed nopadding">
                    <table class="table table-bordered" id="dbase">
					 <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        
                    </colgroup>
                    <thead>
                        <tr>
							<th class="centeralign">Date</th>
							<th class="centeralign">Database</th>
							<th class="centeralign">Price</th>
							<th class="centeralign">Type Of Payout</th>
							<th class="centeralign"> Campaign Management</th>
                                                       
						</tr>
                    </thead>
                    
					<tbody>
                                                <?php                                                 
                                                foreach($viewCampaignContract->campaign_contracts_info as $list => $affiliate){?> 
                                       
                                                         					
						
                                                        <tr>
                                                        <td class="centeralign">
                                                            <a href="#" id="date<?php echo $affiliate['id_campaign_contract']; ?>" data-type="date" data-title="Select Date">
                                                             <?php echo $affiliate['date_contract'] ;?>
                                                            </a>
                                                        </td>
                                                         <td class="centeralign">
                                                             <a href="#" id="db_name<?php echo $affiliate['id_campaign_contract']; ?>" data-type="select" data-title="Select Database Name">
                                                             <?php echo $affiliate['database_name'] ;?>  
                                                             </a>
                                                             </td>
                                                         <td class="centeralign" >
                                                             <a href="#" id="price<?php echo $affiliate['id_campaign_contract']; ?>" data-type="text" data-title="Enter Price">
                                                             <?php echo $affiliate['price'] ;?>  
                                                             </a>
                                                         </td>
                                                         <td class="centeralign">
                                                             <a href="#" id="type_payout<?php echo $affiliate['id_campaign_contract']; ?>" data-type="select" data-title="Select Payaout Type">
                                                             <?php echo $affiliate['type_payout']; ?>
                                                             </a>
                                                         </td>
                                                        
                                                        <td class="centeralign">
                                                            <a href="#" id="affiliate_name<?php echo $affiliate['id_campaign_contract']; ?>" data-type="select" data-title="Select Database Name">
                                                        <?php echo $affiliate['name'] ;?> 
                                                            </a>
                                                        </td> 
                                                       
						<?php }
					?>
                    </tbody>
				</table>
                    <!--=======================================================-->
                   	<h4 class="widgettitle nomargin shadowed"> Campaign Shoot informations</h4>
                        <table class="table table-bordered" id="dbase">
					 <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        
                    </colgroup>
                    <thead>
                        <tr>
							<th class="centeralign">Date</th>
							<th class="centeralign">Leads</th>
							<th class="centeralign">Clics</th>
							<th class="centeralign">Impression</th>
                                                       
						</tr>
                    </thead>
                    
					<tbody>
                                                <?php                                                 
                                                foreach($viewCampaignShoot->campaign_shoots_info as $list => $affiliate){
                                                   
                                                     ?>     					
                                      
                                                        <tr>
                                                        <td class="centeralign">
                                                            <a href="#" id="date_shoot<?php echo $affiliate['id_campaign_shoot']; ?>" data-type="date" data-title="Select Date">
                                                             <?php echo $affiliate['date_shoot'] ;?>
                                                            </a>
                                                        </td>
                                                         <td class="centeralign">
                                                             <a href="#" id="db_name<?php echo $affiliate['id_campaign_shoot']; ?>" data-type="select" data-title="Select Database Name">
                                                             <?php echo $affiliate['leads'] ;?>  
                                                             </a>
                                                             </td>
                                                         <td class="centeralign" >
                                                             <a href="#" id="clics<?php echo $affiliate['id_campaign_shoot']; ?>" data-type="text" data-title="Enter Price">
                                                             <?php echo $affiliate['clics'] ;?>  
                                                             </a>
                                                         </td>
                                                         <td class="centeralign">
                                                             <a href="#" id="impression<?php echo $affiliate['id_campaign_shoot']; ?>" data-type="select" data-title="Select Payaout Type">
                                                             <?php echo $affiliate['impressions']; ?>
                                                             </a>
                                                         </td>
                                                       
                                                       
						<?php }
					?>
                    </tbody>
				</table>
                        <h4 class="widgettitle nomargin shadowed"><center><img id="add_opener<?php echo $affiliate['id_campaign_contract'] ?>" title="viewshoot" src="img/icon/add.png"></center></h4>
                    </div>				
                </div><!--contentinner-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
	
<script>
        jQuery(document).ready(function (){
jQuery('[id=add_dialog]').dialog({ autoOpen: false });
jQuery('[id^=add_opener]').click(function() {
var id = jQuery(this).attr('id').substring(10);
jQuery('[id=add_dialog]').dialog( "open" );
jQuery('[id=add_dialog]').dialog( "option", "height", 280 );
jQuery('[id=add_dialog]').dialog( "option", "width", 700 );
jQuery('[id=contract_id]').val( id );
});
});
</script>

<!--==============================DIV POP UP DIALOG==============================-->
<div id="add_dialog" title="q1" >
<p>
<form name="form_campaign_contract" class="stdform stdform2" method="post" action="view-campaign-contract-information.php?id=<?php echo $affiliate['id_campaign_contract']; ?>" enctype="multipart/form-data">
          <input type="hidden" name="id_management_contract" value="<?php echo $affiliate['id_campaign_contract']; ?>">
           <label  class="col-lg-2 control-label" style="width:100px;" >Date</label>
			<div style="display:inline-block;float:left;" class="col-lg-3">
                            <input style="width:100px;" type="date" value=""  class="form-control" name="date_shoot" id="new_param_81" />
                        </div><br><br>
                        <label  class="col-lg-2 control-label" style="width:100px;" >Clics</label>
			<div style="display:inline-block;float:left;" class="col-lg-3">
                            <input style="width:100px;" type="text" value=""  class="form-control" name="clics" id="new_param_81" />
                        </div><br><br>
    <div style="display:inline-block;float:left;" class="col-lg-3">
                        <label  class="col-lg-2 control-label" style="width:100px;" >Impressions </label>
                       
                            <input style="width:100px;" type="text" value=""  class="form-control" name="impressions" id="new_param_81" />
                           </div><br><br>
    <div style="display:inline-block;float:left;" class="col-lg-3">  
                        <label  class="col-lg-2 control-label" style="width:100px;" >Leads </label>
                       
                            <input style="width:100px;" type="text" value=""  class="form-control" name="leads" id="new_param_81" />
                            
                            <input type="hidden" value=""  name="id_campaign_contract" id="contract_id" />
                                  <input type="submit" id="submitAddPopup" name="submitAddPopup" value="Validate"></input>
			</div></p>
							</div>
	
    <div class="footer">
    	<div class="footerleft">Sharemyclick dashboard v1.0</div>
    	<div class="footerright">&copy; Sharemyclick with Themepixels - <a href="https://twitter.com/sharemyclick"><span class="iconsweets-twitter"></a> - <a href="https://www.facebook.com/sharemyclick"><span class="iconsweets-facebook"></a> - <a href="https://www.linkedin.com/company/sharemyclick">Followus on Linkedin</a></div>
    </div><!--footer-->
 


</body>
</html>
