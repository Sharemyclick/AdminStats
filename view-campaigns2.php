<?php
// On inclut la page de paramÃ¨tre de connection.
include('conf.php');

// On vÃ©rifie que le user est connectÃ© sinon on le renvoie Ã  la page de connection
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
<link rel="stylesheet" href="css/ui.jqgrid.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/bootstrap-editable.css" type="text/css" />

<script type="text/javascript" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/bootstrap-editable.js"></script>
<!-- main.js -->
<script src="js/main.js"></script>
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
        	<h1>View Campaigns</h1> <span><strong><?php echo ucfirst($_SESSION['login']); ?></strong> , please see all the details for your existing Campaigns</span>
        </div><!--pagetitle-->
        
        <div class="maincontent">
		
        	<div class="contentinner content-dashboard">
			
            <table class="table table-bordered" id="list">
					<colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <!--<col class="con1" />-->
						<col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
						<col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
						<col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <!--<col class="con0" />-->
                    </colgroup>
					<thead>
                        <tr>
							<th class="centeralign">Campaign</th>
							<th class="centeralign">Type</th>
							<th class="centeralign">Partner</th>
							<th class="centeralign">Price</th>
							<th class="centeralign">Sent</th>
							<!--<th class="centeralign">Time</th>-->
							<th class="centeralign">Vol. Sent</th>
							<th class="centeralign">Vol. Deliv.</th>
							<th class="centeralign">Vol. %</th>
							<th class="centeralign">Opens</th>
							<th class="centeralign">Opens %</th>
							<th class="centeralign">Clicks</th>
							<th class="centeralign">Clicks %</th>
							<th class="centeralign">Bounced</th>
							<th class="centeralign">Bounced %</th>
							<th class="centeralign">Compl.</th>
							<th class="centeralign">Compl. %</th>
							<th class="centeralign">Unsubs.</th>
							<th class="centeralign">Unsubs. %</th>
							<th class="centeralign">Leads</th>
							<th class="centeralign">CR %</th>
							<th class="centeralign">Revenue</th>
							<th class="centeralign">Ecpm</th>
							<!--<th class="centeralign">Approval</th>-->
						</tr>
                    </thead>
                    
					<tbody style="font-size:10px;">
						<?php
					// On recupere tout le contenu de la table 'campaigns'
					$reponse = $bdd->query('SELECT c.*, t.name as type_name_, p.name as partner_name_ FROM campaigns c LEFT JOIN type t ON t.id = c.type_name LEFT JOIN partner p ON p.id = c.partner_name ') or die(print_r($bdd->errorInfo())); 
					// On affiche chaque entree une a  une et cela  tant qu'il y en a
					$total_price = 0;
					while ($donnees = $reponse->fetch())
						{
						$total_price += $donnees['leads']*$donnees['price'];
                        echo '<tr>';
                            echo '<td class="centeralign"><a href="#" id="name_'.$donnees['id'].'" data-type="text" data-title="Enter Name">'.$donnees['name'].'</a></td>';
							echo '<td class="centeralign"><a href="#" id="type_name'.$donnees['id'].'" data-type="select" data-title="Enter Acquisition Type">'.$donnees['type_name_'].'</a></td>';
                            echo '<td class="centeralign"><a href="#" id="partner_name'.$donnees['id'].'" data-type="select" data-title="Select Partner Name">'.$donnees['partner_name_'].'</a></td>';
							echo '<td class="centeralign"><a href="#" id="price'.$donnees['id'].'" data-type="text" data-title="Enter Price">'.$donnees['price'].'</a> €</td>';
							echo '<td class="centeralign">'.$donnees['sending_date'].'</td>';
							/*echo '<td class="centeralign"><a href="#" id="sending_time'.$donnees['id'].'" data-type="time" data-title="Enter Time">'.$donnees['sending_time'].'</a></td>';*/
							echo '<td class="centeralign">'.$donnees['volume'].'</td>';
							echo '<td class="centeralign">'.$donnees['volume_delivered'].'</td>';
							echo '<td class="centeralign">'.round (($donnees['volume_delivered']/$donnees['volume'])*100, 2).' %</td>';
							echo '<td class="centeralign">'.$donnees['opens'].'</td>';
							echo '<td class="centeralign">'.round (($donnees['opens']/$donnees['volume_delivered'])*100, 2).' %</td>';
							echo '<td class="centeralign">'.$donnees['clicks'].'</td>';
							echo '<td class="centeralign">'.round (($donnees['clicks']/$donnees['volume_delivered'])*100, 2).' %</td>';
							echo '<td class="centeralign">'.$donnees['bounced'].'</td>';
							echo '<td class="centeralign">'.round (($donnees['bounced']/$donnees['volume_delivered'])*100, 2).' %</td>';
							echo '<td class="centeralign">'.$donnees['complaints'].'</td>';
							echo '<td class="centeralign">'.round (($donnees['complaints']/$donnees['volume_delivered'])*100, 2).' %</td>';
							echo '<td class="centeralign">'.$donnees['unsubs'].'</td>';
							echo '<td class="centeralign">'.round (($donnees['unsubs']/$donnees['volume_delivered'])*100, 2).' %</td>';
							echo '<td class="centeralign"><a href="#" id="leads'.$donnees['id'].'" data-type="text" data-title="Enter Leads">'.$donnees['leads'].'</a></td>';
							echo '<td class="centeralign">'.round (($donnees['leads']/$donnees['clicks'])*100, 2).' %</td>';
							echo '<td class="centeralign">'.$donnees['leads']*$donnees['price'].' €</td>';
							echo '<td class="centeralign">'.round ((($donnees['leads']*$donnees['price'])/$donnees['volume'])*1000, 2).' €</td>';
							/*echo '<td class="centeralign"><a href="#" id="approval_name'.$donnees['id'].'" data-type="select" data-title="Select Validation Status">'.$donnees['approval_name'].'</a></td>';*/
                        echo '</tr>';
						}
					?>
                    </tbody>
					<tfoot>
						<?php
					// On recupere tout le contenu de la table 'campaigns'
					$reponse = $bdd->query('SELECT SUM(volume) AS volume, SUM(volume_delivered) AS volume_delivered, SUM(opens) AS opens, SUM(clicks) AS clicks, SUM(bounced) AS bounced, SUM(complaints) AS complaints, SUM(unsubs) AS unsubs, SUM(leads) AS leads FROM campaigns') or die(print_r($bdd->errorInfo())); 
					// On affiche chaque entree une a  une et cela  tant qu'il y en a
					while ($donnees = $reponse->fetch())
						{
						echo '<tr>';
							echo '<th class="centeralign">TOTAL</th>';
							echo '<th class="centeralign"></th>';
							echo '<th class="centeralign"></th>';
							echo '<th class="centeralign"></th>';
							echo '<th class="centeralign"></th>';
							/*echo '<th class="centeralign"></th>';*/
							echo '<th class="centeralign">'.$donnees['volume'].'</th>';
							echo '<th class="centeralign">'.$donnees['volume_delivered'].'</th>';
							echo '<th class="centeralign">'.round (($donnees['volume_delivered']/$donnees['volume'])*100, 2).' %</th>';
							echo '<th class="centeralign">'.$donnees['opens'].'</th>';
							echo '<th class="centeralign">'.round (($donnees['opens']/$donnees['volume_delivered'])*100, 2).' %</th>';
							echo '<th class="centeralign">'.$donnees['clicks'].'</th>';
							echo '<th class="centeralign">'.round (($donnees['clicks']/$donnees['volume_delivered'])*100, 2).' %</th>';
							echo '<th class="centeralign">'.$donnees['bounced'].'</th>';
							echo '<th class="centeralign">'.round (($donnees['bounced']/$donnees['volume_delivered'])*100, 2).' %</th>';
							echo '<th class="centeralign">'.$donnees['complaints'].'</th>';
							echo '<th class="centeralign">'.round (($donnees['complaints']/$donnees['volume_delivered'])*100, 2).' %</th>';
							echo '<th class="centeralign">'.$donnees['unsubs'].'</th>';
							echo '<th class="centeralign">'.round (($donnees['unsubs']/$donnees['volume_delivered'])*100, 2).' %</th>';
							echo '<th class="centeralign">'.$donnees['leads'].'</th>';
							echo '<th class="centeralign">'.round (($donnees['leads']/$donnees['clicks'])*100, 2).' %</th>';
							echo '<th class="centeralign">'.$total_price.' €</th>';
							echo '<th class="centeralign">'.round (($total_price/$donnees['volume'])*1000, 2).' €</th>';
							/*echo '<th class="centeralign"></th>*/
						echo '</tr>';
						}
					?>
					</tfoot>
				</table>
				<div id="pager"></div> 
				<script type="text/javascript">
				// dynamic table
				jQuery('#list').dataTable({
				   "sPaginationType": "full_numbers",
				   "aaSortingFixed": [[4,'asc']],
				   "fnDrawCallback": function(oSettings) {
					 // jQuery.uniform.update();
				   }<?php /*,
				    "fnRowCallback": function( nRow, mData, iDisplayIndex ) {console.log(iDisplayIndex);
					// create link
					//jQuery('td:eq(2)', nRow).html('<a class="editable editable-click" href="#">' + RoWContent + '</a>');
					// add x-editable
					jQuery('td:eq(2) a', nRow).editable({
					  //..
					  //.. x-ediable options here 
					  //..          
					  });
					return nRow;
					} */?>
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