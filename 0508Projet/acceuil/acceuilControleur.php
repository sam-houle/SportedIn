<?php
	require_once("../includePDO/modele.inc.php");
	$tabRes=array();
	function afficherAcceuil(){
		global $tabRes;
		try{
			$requette = "SELECT * FROM sport LIMIT 20";
			$unModele=new modele($requette,array());
			$stmt=$unModele->executer();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['listSports'][]=$ligne;
			}
			$tabRes['action']="afficherAcceuil";
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	//******************************************************
	//Contrôleur
	$action=$_POST['action'];
	switch($action){
		case "afficherAcceuil" :
			afficherAcceuil();
		break;
	}
    echo json_encode($tabRes);
?>