<?php
	require_once("../IncludePDO/modele.inc.php");
	session_start();
	$tabRes=array();
	
	function afficherEvent(){
		global $tabRes;
		$user=$_SESSION['u_id'];
		try{
			$requette = "SELECT * FROM evenement e, sport s,membre WHERE e.id_sport=s.id_sport AND ((id_destinateur=id_membre AND id_destinateur!=?) OR (id_destinataire=id_membre AND id_destinataire!=?)) AND (id_destinateur=? OR id_destinataire=?) ORDER BY date_ev";
			$unModele=new modele($requette,array($user,$user,$user,$user));
			$stmt=$unModele->executer();
			$tabRes['listeEvent']=array();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$tabRes['listeEvent'][]=$ligne;
			}
		}catch(Exception $e){
			echo $e;
		}finally{
			$tabRes['action']="afficherEvent";
			unset($unModele);
		}
	}
	
	function ajouterEvent($id){
		global $tabRes;
		$user=$_SESSION['u_id'];	
		try{
			$dest="SELECT id_membre, prenom, nom, photo FROM conversation, membre where membre_deux=id_membre and membre_un=? and id_convo=?";
			$unModele=new modele($dest,array($user,$id));
			$stmt=$unModele->executer();
			$ligne=$stmt->fetch(PDO::FETCH_OBJ);
			$tabRes['listeEvent'][]=$ligne;
			$tabRes['action']="ajouterEvent";

		}catch(Exception $e){
			echo $e;
		}finally{
			unset($unModele);
		}
	}
	
	function creerEvent($destinataire){
		global $tabRes;
		$user=$_SESSION['u_id'];
		$sport=$_POST['sport'];
		$endroit=$_POST['endroit'];
		$dateEvent=$_POST['dateEvent'];
		$heuredebut=$_POST['heuredebut'];
		$heurefin=$_POST['heurefin'];
		try{
			$requete="INSERT INTO evenement VALUES(0,?,?,?,?,?,1,?,?)";
			$unModele=new modele($requete,array($user,$destinataire,$dateEvent,$heuredebut,$heurefin,$sport,$endroit));
			$stmt=$unModele->executer();
			$tabRes['action']="creerEvent";
			afficherEvent();
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
		

	//******************************************************
	//Contrôleur
	$action=$_POST['action'];
	if(isset($_POST['destinataire'])){
		$destinataire=$_POST['destinataire'];	
	}
	if(isset($_POST['id'])){
		$id=$_POST['id'];	
	}
	
	switch($action){
		case "afficherEvent" :
			afficherEvent();
		break;
		case "ajouterEvent" :
			ajouterEvent($id);
		break;
		case "creerEvent" :
			creerEvent($destinataire);
		break;
		
	}
	//header("Content-type: application/json; charset=utf-8");
	echo json_encode($tabRes);
?>