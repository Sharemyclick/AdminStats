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
<link rel="stylesheet" type="text/css" media="screen" href="css/ui.jqgrid.css" />

<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="prettify/prettify.js"></script>
<script type="text/javascript" src="js/jquery.cookie.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script src="js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script src="js/jquery.jqGrid.min.js" type="text/javascript"></script>
<script src="js/grid.common.js" type="text/javascript"></script>
<script src="js/grid.celledit.js" type="text/javascript"></script>
<script src="js/grid.inlinedit.js" type="text/javascript"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->

<script type="text/javascript">
jQuery(function () {
	var lastsel;
    jQuery("#list").jqGrid({
        url: "getCampaignsData.php",
		editurl: "setCampaignsData.php",
        datatype: "xml",
        mtype: "GET",
        colNames: ["Campaign", "Partner", "Type", "Price", "Confirmation Date", "Sending Date", "Approval", "Volume", "Volume Delivered", "Deliverability", "Unique opens", "Opens %", "Unique Clicks", "Clicks %", "Leads","Approved Leads","CR %","Revenue","Ecpm"],
        colModel: [
            { name: "name", width: 55 },
            { name: "partner_name", width: 90 },
            { name: "type_name", width: 50, align: "right" },
            { name: "price", width: 50, align: "right" },
            { name: "date_conf", width: 150, align: "right" },
            { name: "sending_date", width: 150, sortable: false },
			{ name: "approval_name", width: 55, editable: true, edittype:"text"},
			{ name: "volume", width: 55, editable: true, edittype:"text" },
			{ name: "volume_delivered", width: 90, editable: true, edittype:"text" },
			{ name: "deliverability", width: 55 },
			{ name: "opens", width: 55, editable: true, edittype:"text" },
			{ name: "opens_percent", width: 55 },
			{ name: "clicks", width: 55, editable: true, edittype:"text" },
			{ name: "clicks_percent", width: 55 },
			{ name: "leads", width: 50, editable: true, edittype:"text" },
			{ name: "approved_leads", width: 50, editable: true, edittype:"text" },
			{ name: "cr", width: 55 },
			{ name: "revenue", width: 55 },
			{ name: "ecpm", width: 55 }
        ],
        pager: "#pager",
        rowNum: 10,
        rowList: [10, 20, 30],
        sortname: "name",
        sortorder: "desc",
        viewrecords: true,
        gridview: true,
        autoencode: true,
		'cellEdit': true,
		'cellsubmit' : 'remote',
		'cellurl' : 'http://campaigns.sharemyclick.com/setCampaignsData.php',
        caption: "Campaigns list",
		/*beforeSaveCell: function(rowid,celname,value,iRow,iCol) {
			alert('New cell value: "'+value+'"');
		},*/
		onSelectRow: function(id){
                    if(id && id!==lastsel){
                        jQuery('#list').restoreRow(lastsel);
                        jQuery('#list').editRow(id,true);
                        lastsel=id;
                    }                       
                }
    }); 
}); 
</script>

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
				<tr><td></td></tr>
                  <?php /*.  <thead>
                        <tr>
							<th class="centeralign">Campaign</th>
							<th class="centeralign">Partner</th>
							<th class="centeralign">Type</th>
							<th class="centeralign">Price</th>
							<th class="centeralign">Confirmation Date</th>
							<th class="centeralign">Sending Date</th>
							<th class="centeralign">Approval</th>
							<th class="centeralign">Volume</th>
							<th class="centeralign">Volume Delivered</th>
							<th class="centeralign">Deliverability</th>
							<th class="centeralign">Unique opens</th>
							<th class="centeralign">Opens %</th>
							<th class="centeralign">Unique Clicks</th>
							<th class="centeralign">Clicks %</th>
							<th class="centeralign">Leads</th>
							<th class="centeralign">Approved Leads</th>
							<th class="centeralign">CR %</th>
							<th class="centeralign">Revenue</th>
							<th class="centeralign">Ecpm</th>
							<th class="centeralign">Edit campaign</th>
						</tr>
                    </thead>
                    
					<tbody>
						<?php
					// On recupere tout le contenu de la table 'campaigns'
					$reponse = $bdd->query('SELECT * FROM campaigns') or die(print_r($bdd->errorInfo())); 
					// On affiche chaque entree une a  une et cela  tant qu'il y en a
					while ($donnees = $reponse->fetch())
						{
                        echo '<tr>';
                            echo '<td class="centeralign">'.$donnees['name'].'</td>';
                            echo '<td class="centeralign">'.$donnees['partner_name'].'</td>';
                            echo '<td class="centeralign">'.$donnees['type_name'].'</td>';
							echo '<td class="centeralign">'.$donnees['price'].' €</td>';
							echo '<td class="centeralign">'.$donnees['date_conf'].'</td>';
							echo '<td class="centeralign">'.$donnees['sending_date'].'</td>';
							echo '<td class="centeralign">'.$donnees['approval_name'].'</td>';
							echo '<td class="centeralign">'.$donnees['volume'].'</td>';
							echo '<td class="centeralign">'.$donnees['volume_delivered'].'</td>';
							echo '<td class="centeralign">'.round (($donnees['volume_delivered']/$donnees['volume'])*100, 2).' %</td>';
							echo '<td class="centeralign">'.$donnees['opens'].'</td>';
							echo '<td class="centeralign">'.round (($donnees['opens']/$donnees['volume_delivered'])*100, 2).' %</td>';
							echo '<td class="centeralign">'.$donnees['clicks'].'</td>';
							echo '<td class="centeralign">'.round (($donnees['clicks']/$donnees['volume_delivered'])*100, 2).' %</td>';
							echo '<td class="centeralign">'.$donnees['leads'].'</td>';
							echo '<td class="centeralign">'.$donnees['approved_leads'].'</td>';
							echo '<td class="centeralign">'.round (($donnees['approved_leads']/$donnees['clicks'])*100, 2).' %</td>';
							echo '<td class="centeralign">'.$donnees['approved_leads']*$donnees['price'].' €</td>';
							echo '<td class="centeralign">'.round ((($donnees['approved_leads']*$donnees['price'])/$donnees['volume_delivered'])*1000, 2).' €</td>';
							echo '<td class="centeralign">'.'<i class="icon-edit"></i>'.'</td>';
                        echo '</tr>';
						}
					?>
                    </tbody>
					<tfoot>
						<tr>
							<th class="centeralign">TOTAL</th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
							<th class="centeralign"></th>
						</tr>
					</tfoot>*/?>
				</table>
				<div id="pager"></div> 
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