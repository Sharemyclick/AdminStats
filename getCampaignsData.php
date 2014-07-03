<?php
include('conf.php');
if(isset($_GET['value']) && $_GET['value'] == 'type_name' ){
	$arVars = array();
	$i = 0;
	$req = $bdd->query('SELECT * FROM type');
	while($res = $req->fetch()){
		$arVars[$i]['value'] = $res['id'];
		$arVars[$i]['text'] = $res['name'];
		$i++;
	}
}
if(isset($_GET['value']) && $_GET['value'] == 'partner_name' ){
	$arVars = array();
	$i = 0;
	$req = $bdd->query('SELECT * FROM partner');
	while($res = $req->fetch()){
		$arVars[$i]['value'] = $res['id'];
		$arVars[$i]['text'] = $res['name'];
		$i++;
	}
}if(isset($_GET['value']) && $_GET['value'] == 'db_name' ){	$arVars = array();	$i = 0;	$req = $bdd->query('SELECT * FROM dbase');	while($res = $req->fetch()){		$arVars[$i]['value'] = $res['id'];		$arVars[$i]['text'] = $res['name'];		$i++;	}}
echo json_encode($arVars);

?>