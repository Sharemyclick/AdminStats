<?php
// On inclut la page de paramÃƒÂ¨tre de connection.
include('conf.php');

// On vÃƒÂ©rifie que le user est connectÃƒÂ© sinon on le renvoie ÃƒÂ  la page de connection
session_start();  
if(!isset($_SESSION['login'])) {  
  echo '<script>document.location.href="dashboard.php"</script>';  
  exit;  
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
        	<h1>View Partners</h1> <span><strong><?php echo ucfirst($_SESSION['login']); ?></strong> , please see all the details for your existing Partners.</span>
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
							<th class="centeralign">Affiliate</th>
							<th class="centeralign">Address</th>
							<th class="centeralign">Postal Code</th>
							<th class="centeralign">City</th>
							<th class="centeralign">Country</th>
							<th class="centeralign">Iban</th>
							<th class="centeralign">Swift_bic</th>
							<th class="centeralign">Email finance</th>
							<th class="centeralign">Nº VAT</th>
							<th class="centeralign">Telephone</th>
						</tr>
                    </thead>
                    
					<tbody>
						<?php
					// On recupere tout le contenu de la table 'dbase'
					$reponse = $bdd->query('SELECT * FROM affiliates ORDER BY name') or die(print_r($bdd->errorInfo())); 
					// On affiche chaque entree une aÂ  une et celaÂ  tant qu'il y en a
					while ($donnees = $reponse->fetch())
						{
                        echo '<tr>';
                            echo '<td class="centeralign">'.$donnees['name'].'</td>';
                            echo '<td class="centeralign">'.$donnees['address'].'</td>';
							echo '<td class="centeralign">'.$donnees['cp'].'</td>';
							echo '<td class="centeralign">'.$donnees['city'].'</td>';
							echo '<td class="centeralign">'.$donnees['country'].'</td>';
                            echo '<td class="centeralign">'.$donnees['iban'].'</td>';
							echo '<td class="centeralign">'.$donnees['swift_bic'].'</td>';
							echo '<td class="centeralign">'.$donnees['email_finance'].'</td>';
							echo '<td class="centeralign">'.$donnees['vat_number'].'</td>';
							echo '<td class="centeralign">'.$donnees['telephone'].'</td>';
                        echo '</tr>';
						}
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