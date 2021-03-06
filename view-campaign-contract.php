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
$viewCampaignContract = new CampaignContract();
$viewresultCampaignContract = $viewCampaignContract->getCampaignContractsList();


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
   

<div class="mainwrapper">
	
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
        	<h1>View Campaign contract</h1> <span><strong><?php echo ucfirst($_SESSION['login']); ?></strong> , please see all the details for your existing Partners.</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
        	<div class="contentinner content-dashboard">
			
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
                                                        <th class="centeralign"> Total Leads</th>
                                                        <th class="centeralign"> Total Impressions</th>
                                                        <th class="centeralign"> Total Clics</th>
                                                        <th class="centeralign"> ECPM Aff</th>
                                                        <th class="centeralign"> Validated</th>
                                                        <th class="centeralign"> +</th>
                                                        <th class="centeralign"> V</th>
                                                  
						</tr>
                    </thead>
                    
					<tbody>
                                                   					
                                           <?php  foreach($viewCampaignContract->campaign_contracts_list as $list => $contract){ 
                                               $totlead="0"; 
                                                $totimpressions="0";
                                                $totclics="0";  ?>
                                                        <tr>
                                                        <td class="centeralign">
                                                            <a href="#" id="date<?php echo $contract['id_campaign_contract']; ?>" data-type="date" data-title="Select Date">
                                                             <?php echo $contract['date_contract'] ;?>
                                                            </a>
                                                        </td>
                                                         <td class="centeralign">
                                                             <a href="#" id="db_name<?php echo $contract['id_campaign_contract']; ?>" data-type="select" data-title="Select Database Name">
                                                             <?php echo $contract['database_name'] ;?>  
                                                             </a>
                                                             </td>
                                                         <td class="centeralign" >
                                                             <a href="#" id="price<?php echo $contract['id_campaign_contract']; ?>" data-type="text" data-title="Enter Price">
                                                             <?php echo $contract['price'] ;?>  
                                                             </a>
                                                         </td>
                                                         <td class="centeralign">
                                                             <a href="#" id="type_payout<?php echo $contract['id_campaign_contract']; ?>" data-type="select" data-title="Select Payaout Type">
                                                             <?php echo $contract['type_payout']; ?>
                                                             </a>
                                                         </td>
                                                        
                                                        <td class="centeralign">
                                                            <a href="#" id="affiliate_name<?php echo $contract['id_campaign_contract']; ?>" data-type="select" data-title="Select Database Name">
                                                        <?php echo $contract['name'] ;?> 
                                                            </a>
                                                        </td> 
                                                        
                                                        <td class="centeralign">
                                                           <?php   /*                                                
                                               
                                                          					
						$totlead="0"; 
                                                $totimpressions="0";
                                                $totclics="0";  
                                            $viewCampaignShoot = new CampaignContract();
$viewresultCampaignShoot = $viewCampaignShoot->getCampaignShootsInfo($affiliate['id_campaign_contract']);
                                                                                            
                                                foreach($viewCampaignShoot->campaign_shoots_info as $list => $affiliate){
                                                   $totlead=$totlead+$affiliate['leads'];
                                                   $totimpressions=$totimpressions+$affiliate['impressions'];
                                                $totclics=$totclics+$affiliate['clics'];}
                                                   */  ?> 
                                                            <?php echo $totlead ?></td>
                                                         <td class="centeralign"><?php echo $totimpressions ?></td>
                                                          <td class="centeralign"><?php echo $totclics ?></td>
                                                           <td class="centeralign">Soon</td>
                                                            <td class="centeralign"><img  src="img/icon/yes.png"/></td>
                                                            <td class="centeralign" ><img id="add_opener<?php echo $contract['id_campaign_contract'] ?>" title="viewshoot" src="img/icon/add.png"/></td>
                                                            <td class="centeralign" ><a  href="view-campaign-contract-information.php?id=<?php echo $contract['id_campaign_contract']; ?>"><img  title="viewshoot" src="img/icon/magnify.png"/></a></td>
                                                 
						<?php }
					?>
                    </tbody>
				</table>
				<script type="text/javascript">
				// dynamic table
				jQuery('#dbase').dataTable({
				   "sPaginationType": "full_numbers",
				   "aaSortingFixed": [[4,'asc']],
				   "fnDrawCallback": function(oSettings) {
					  jQuery.uniform.update();
				   }
				});
				</script>
                                
                                
                                <?php 
                                
                                if(isset($_POST['submitAddPopup'])){
     $createCampaignShoot = new CampaignContract();
       $message = $createCampaignShoot->createCampaignShoot($_POST);
     
 }
 ?>
 <div id="add_dialog" title="q1" >
<p>
<form name="form_campaign_contract" class="stdform stdform2" method="post" action="view-campaign-contract.php" enctype="multipart/form-data">
          <input type="hidden" name="id_management_contract" value="<?php echo $contract['id_campaign_contract']; ?>">
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
				
            </div><!--contentinner-->
			
        </div><!--maincontent-->
        
    </div><!--mainright-->
    <!-- END OF RIGHT PANEL -->
    
    <div class="clearfix"></div>
	
    <div style="height:80px;"></div>
	
    <div class="footer">
    	<div class="footerleft">Sharemyclick dashboard v1.0</div>
    	<div class="footerright">&copy; Sharemyclick with Themepixels - <a href="https://twitter.com/sharemyclick"><span class="iconsweets-twitter"></a> - <a href="https://www.facebook.com/sharemyclick"><span class="iconsweets-facebook"></a> - <a href="https://www.linkedin.com/company/sharemyclick">Followus on Linkedin</a></div>
    </div><!--footer-->
 
</div><!--mainwrapper-->

</body>
</html>