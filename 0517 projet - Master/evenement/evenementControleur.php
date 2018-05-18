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
	
	/*function afficherMsgAmi($destinataire){
		global $tabRes;
		$user=$_SESSION['u_id'];
		try{
			$requette = "SELECT message.id_convo id, prenom, nom, stamp, contenu FROM conversation, membre, message where id_destinateur=membre.id_membre and  membre_deux=? and membre_un=? and message.id_convo=conversation.id_convo";
			$unModele=new modele($requette,array($destinataire,$user));
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
		$user=$_SESSION['u_id'];
		$textAjoutMsg=$_POST['textAjoutMsg'];	
		try{
			$dest="SELECT membre_deux FROM conversation where id_convo=? AND membre_un=?";
			$unModele=new modele($dest,array($id,$user));
			$stmt=$unModele->executer();
			$ligne=$stmt->fetch(PDO::FETCH_OBJ);
			$dest=$ligne->membre_deux;
			$requete="INSERT INTO message VALUES(0,?,?,?,NOW(),?)";
			$unModeleInsert=new modele($requete,array($id,$user,$dest,$textAjoutMsg));
			$stmtInsert=$unModeleInsert->executer();
			$tabRes['action']="ajouterMsg";
			
			afficherMsgAmi($dest);
		}catch(Exception $e){
			echo $e;
		}finally{
			unset($unModele);
		}
	}*/
	
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
		case "afficherEvent" :
			afficherEvent();
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