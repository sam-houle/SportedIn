<?php
	require_once("../IncludePDO/modele.inc.php");
	$tabRes=array();
	
	function afficherMsg(){
		global $tabRes;
		try{
			$requette = "SELECT id_destinataire, prenom, nom, MAX(stamp) temps FROM message, membre WHERE id_membre=id_destinataire AND (id_destinateur=1 OR id_destinataire=1) GROUP BY id_destinataire";
			$unModele=new modele($requette,array());
			$stmt=$unModele->executer();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['listeMsg'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			$tabRes['action']="afficherMsg";
			unset($unModele);
		}
	}
	
	function afficherMsgAmi($destinataire){
		global $tabRes;
		try{
			$requette = "SELECT prenom, nom, stamp, contenu FROM message, membre WHERE id_destinataire=id_membre AND (id_destinateur=1 OR id_destinataire=1) AND (id_destinataire=? OR id_destinateur=?)";
			$unModele=new modele($requette,array($destinataire, $destinataire));
			$stmt=$unModele->executer();
			$tabRes['listeMsg']=array();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['listeMsg'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			$tabRes['action']="afficherMsgAmi";
			unset($unModele);
		}
		//print_r($tabRes);
	}
	
	//******************************************************
	//Contrôleur
	$action=$_POST['action'];
	if(isset($_POST['id_destinataire'])){
		$destinataire=$_POST['id_destinataire'];
	}

	switch($action){
		case "afficherMsg" :
			afficherMsg();
		break;
		case "afficherMsgAmi" :
			afficherMsgAmi($destinataire);
		break;
		case "ajouterMsg" :
			ajouterMsg();
		break;
		case "modifier" :
			modifier();
		break;
		case "acceuil" :
			acceuil();
		break;
		case "categorie" :
			categorie($categorie);
		break;
	}
	//header("Content-type: application/json; charset=utf-8");
	echo json_encode($tabRes);
?>