<?php
	require_once("../IncludePDO/modele.inc.php");
	$tabRes=array();
	
	function afficherMsg(){
		global $tabRes;
		try{
			$requette = "SELECT membre_deux, prenom, nom, MAX(stamp) temps FROM conversation, membre, message where membre_deux=id_membre and membre_un=1 and message.id_convo=conversation.id_convo group by prenom, nom";
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
			$requette = "SELECT message.id_convo id, prenom, nom, stamp, contenu FROM conversation, membre, message where id_destinateur = membre.id_membre and  membre_deux=? and membre_un=1 and message.id_convo=conversation.id_convo";
			$unModele=new modele($requette,array($destinataire));
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
	}
	
	function ajouterMsg($id){ 
		global $tabRes;
		$textAjoutMsg=$_POST['textAjoutMsg'];	
		try{
			$dest="SELECT membre_deux FROM conversation where id_convo=? AND membre_un=1";
			$unModele=new modele($dest,array($id));
			$stmt=$unModele->executer();
			$ligne=$stmt->fetch(PDO::FETCH_OBJ);
			$dest=$ligne->membre_deux;
			$requete="INSERT INTO message VALUES(0,?,?,?,NOW(),?)";
			$unModeleInsert=new modele($requete,array($id,'1',$dest,$textAjoutMsg));
			$stmtInsert=$unModeleInsert->executer();
			$tabRes['action']="ajouterMsg";
			
			afficherMsgAmi($dest);
		}catch(Exception $e){
			echo $e;
		}finally{
			unset($unModele);
		}
	}
	
	//******************************************************
	//Contrôleur
	$action=$_POST['action'];
	if(isset($_POST['id_destinataire'])){
		$destinataire=$_POST['id_destinataire'];	
	}
	if(isset($_POST['id'])){
		$id=$_POST['id'];	
	}
	
	switch($action){
		case "afficherMsg" :
			afficherMsg();
		break;
		case "afficherMsgAmi" :
			afficherMsgAmi($destinataire);
		break;
		case "ajouterMsg" :
			ajouterMsg($id);
		break;
	}
	//header("Content-type: application/json; charset=utf-8");
	echo json_encode($tabRes);
?>