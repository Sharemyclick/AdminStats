<?php


// On inclut la page de paramÃ¨tre de connection.
include('conf.php');
include('class/campaignmanagement.class.php');

// On vÃ©rifie que le user est connectÃ© sinon on le renvoie Ã  la page de connection
session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
}
$viewAffiliateManager = new AffiliateManager();
$viewAffiliateManager->getAffiliateManagersList();

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
        	<h1>View Affiliate Manager</h1> <span><strong><?php echo ucfirst($_SESSION['login']); ?></strong> , please see all the details for your existing Partners.</span>
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
							<th class="centeralign">Name</th>
							<th class="centeralign">Surname</th>
							<th class="centeralign">email</th>
							<th class="centeralign">Skype</th>
							<th class="centeralign"> Telephone</th>
                                                        <th class="centeralign"> Affiliate Company</th>
                                                        <th class="centeralign"> Status</th>
							
						</tr>
                    </thead>
                    
					<tbody>
                                                <?php                                                 
                                                foreach($viewAffiliateManager->affiliate_managers_list as $list => $affiliate){ ?>         					
						
                                                        <tr>
                                                        <td class="centeralign"><a href="view-affiliate-manager-information.php?id=<?php echo $affiliate['id_affiliate_manager']; ?>" ><?php echo $affiliate['name'] ?></a></td>
                                                        <td class="centeralign"><?php echo $affiliate['surname'] ;?>  </td>
                                                        <td class="centeralign"><?php echo $affiliate['email'] ?></td>
                                                        <td class="centeralign"><?php echo $affiliate['skype'] ?></td> 
                                                        <td class="centeralign"><?php echo $affiliate['telephone'] ?></td>
                                                        <td class="centeralign"><?php echo $affiliate['company_name'] ?> </td>
                                                        <td class="centeralign"><?php echo $affiliate['manager_status'] ?> </td>
</tr>
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