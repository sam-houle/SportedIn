<?php
	require_once("../IncludePDO/modele.inc.php");
	$tabRes=array();
	
	function afficherMsg(){
		global $tabRes;
		try{
			$requette = "SELECT * FROM message WHERE id_destinateur=1";
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
	function ajoutez(){
		global $tabRes;	
		$titre=$_POST['titre'];
		$cat=$_POST['cat'];
		$res=$_POST['res'];
		$prix=$_POST['prix'];
		$duree=$_POST['duree'];
		$preview=$_POST['preview'];
		$nomPochette=sha1($titre.time());
		try{
			$unModele=new modele();
			$pochete=$unModele->verserFichier("pochettes", "pochette", "default.jpg",$nomPochette);
			$requete="INSERT INTO films VALUES(0,?,?,?,?,?,?,?)";
			$unModele=new modele($requete,array($titre,$res,$cat,$duree,$prix,$pochete,$preview));
			$stmt=$unModele->executer();
			$tabRes['action']="ajoutez";
			$tabRes['msg']="Film bien enregistre";
			//affFilmAcceuil();
		}catch(Exception $e){
		}finally{
			unset($unModele);
			acceuil();
		}
	}
	function supprimez(){
		global $tabRes;	
		$idf=$_POST['idF'];
		try{
			$requete="SELECT * FROM films WHERE idF=?";
			$unModele=new modele($requete,array($idf));
			$stmt=$unModele->executer();
			if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
				$unModele->enleverFichier("pochettes",$ligne->pochette);
				$requete="DELETE FROM films WHERE idf=?";
				$unModele=new modele($requete,array($idf));
				$stmt=$unModele->executer();
				$tabRes['action']="enlever";
				$tabRes['msg']="Film ".$idf." bien enleve";
			}
			else{
				$tabRes['action']="enlever";
				$tabRes['msg']="Film ".$idf." introuvable";
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
			acceuil();
		}
	}
	function categorie($cat){
		global $tabRes;
		$tabRes['action']="lister";
		$tabRes['isCat']=true;
		$tabRes['categorie']=$cat;
		$requete="SELECT * FROM films WHERE cat='$cat'";
		try{
			 $unModele=new Modele($requete,array());
			 $stmt=$unModele->executer();
			 $tabRes['listFilms']=array();
			 while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listFilms'][]=$ligne;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	function fiche(){
		global $tabRes;
		$idf=$_POST['idF'];
		$tabRes['action']="fiche";
		$requete="SELECT * FROM films WHERE idF=?";
		try{
			 $unModele=new modele($requete,array($idf));
			 $stmt=$unModele->executer();
			 $tabRes['fiche']=array();
			 if($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['fiche']=$ligne;
				$tabRes['OK']=true;
			}
			else{
				$tabRes['OK']=false;
			}
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	function modifier(){
		global $tabRes;	
		$titre=$_POST['titre'];
		$duree=$_POST['duree'];
		$res=$_POST['res'];
		$idf=$_POST['idF']; 
		$cat=$_POST['cat']; 
		$prix=$_POST['prix']; 
		$preview=$_POST['preview']; 
		$nomPochette=sha1($titre.time());
		try{
			//Recuperer ancienne pochette
			$requette="SELECT pochette FROM films WHERE idf=?";
			$unModele=new modele($requette,array($idf));
			$stmt=$unModele->executer();
			$ligne=$stmt->fetch(PDO::FETCH_OBJ);
			$anciennePochette=$ligne->pochette;
			$pochette=$unModele->verserFichier("pochettes", "pochette",$anciennePochette,$nomPochette);	
			
			$requete="UPDATE films SET titre=?,cat=?,prix=?,preview=?,duree=?, res=?, pochette=? WHERE idf=?";
			$unModele=new modele($requete,array($titre,$cat,$prix,$preview,$duree,$res,$pochette,$idf));
			$stmt=$unModele->executer();
			$tabRes['action']="modifier";
			$tabRes['msg']="Film $idf bien modifie";
		}catch(Exception $e){
		}finally{
			unset($unModele);
			acceuil();
		}
	}
	//******************************************************
	//Contrôleur
	$action=$_POST['action'];
	if(isset($_POST['categorie'])){
		$categorie=$_POST['categorie'];
	}
	switch($action){
		case "afficherMsg" :
			afficherMsg();
		break;
		case "supprimez" :
			supprimez();
		break;
		case "fiche":
			fiche();
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
    echo json_encode($tabRes);
?>