<?php
include('conf.php');

if(isset($_GET['value']) && $_GET['value'] == 'db_name' ){	
	$arVars = array();
	$i = 0;	
	$req = $bdd->query('SELECT * FROM dbase');
	while($res = $req->fetch()){
		$arVars[$i]['value'] = $res['id_database'];
		$arVars[$i]['text'] = $res['database_name'];	
		$i++;
	}
}
if(isset($_GET['value']) && $_GET['value'] == 'affiliate_name' ){	
	$arVars = array();
	$i = 0;	
	$req = $bdd->query('SELECT * FROM campaign_management');
	while($res = $req->fetch()){
		$arVars[$i]['value'] = $res['id_campaign_management'];
		$arVars[$i]['text'] = $res['name'];	
		$i++;
	}
}
if(isset($_GET['value']) && $_GET['value'] == 'type_payout' ){	
	$arVars = array();
	
	
		$arVars[0]['value'] = 'CPC';
		$arVars[0]['text'] = 'CPC';	
		$arVars[1]['value'] = 'CPM';
		$arVars[1]['text'] = 'CPM';
                $arVars[2]['value'] = 'CPL';
		$arVars[2]['text'] = 'CPL';
                $arVars[3]['value'] = 'CPA';
		$arVars[3]['text'] = 'CPA';
                $arVars[4]['value'] = 'C2L';
		$arVars[4]['text'] = 'C2L';
                $arVars[5]['value'] = 'CPV';
		$arVars[5]['text'] = 'CPV';
}
	

echo json_encode($arVars);

?>