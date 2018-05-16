<?php
	require_once("../includePDO/modele.inc.php");
	$tabRes=array();
	function connecter(){
		global $tabRes;
		$emailC=$_POST['compte'];
		$passwordC=sha1($_POST['connexion_motdepasse']);
		try{
			$requete="SELECT * FROM membre m, connexion c WHERE m.id_membre = c.id_membre AND m.email=?";
			$membreModele=new modele($requete,array($emailC));
			$stmt=$membreModele->executer();
			$ligne = $stmt->fetch(PDO::FETCH_OBJ);
			if(!$ligne){
				$tabRes['action'] = "cannotConnecter";
				$tabRes['msg'] = "Membre ".$emailC." introuvable";
				exit;
			}
			$emailDB = $ligne->email;
			$passwordDB = $ligne->mot_de_passe;
			if($passwordC==$passwordDB){
				$tabRes['action']="connecter";
				$tabRes['username']=$emailC;
				chercheUserCreated($emailC);
				$tabRes['id_membre']=$_SESSION['u_id'];
				$tabRes['u_prenom']=$_SESSION['u_prenom'];
				$tabRes['u_nom']=$_SESSION['u_nom'];
				$tabRes['u_ville']=$_SESSION['u_ville'];
				$tabRes['u_texte']=$_SESSION['u_texte'];
				$tabRes['u_photo']=$_SESSION['u_photo'];
			}else{
				$tabRes['action']="cannotConnecter";
				$tabRes['msg']="Mauvais mot de passe ou email";
			}
		}catch(Exception $e){
			$tabRes['action']="cannotConnecter";
			$tabRes['msg']="Connexion a la base de donnée impossible";
		}finally{
			$membreModele->deconnecter();
			unset($membreModele);
		}
	}
	function inscription(){
		session_start();
		global $tabRes;	
		$courriel=$_POST['courriel'];
		$prenom=$_POST['prenom'];
		$nom=$_POST['nom'];
		$naissance=$_POST['naissance'];
		$motdepasse=sha1($_POST['motdepasse']);
		$profession=$_POST['profession'];
		$sexe=$_POST['sexe'];
		$codepostal=$_POST['codepostal'];
		$ville=$_POST['ville'];
		$province=$_POST['province'];
		$pays="Canada";
		$texte=$_POST['texte'];
		$type='membre';
		$statut=1;
		$nomPhoto=$courriel;
		$lat=$_POST['lat'];
		$lng=$_POST['lng'];
		try{
			/*$requette3="SELECT * FROM membre WHERE email=?";
			$modeleVerifieEmail = new modele($requette3,array($courriel));
			$stmt3=$modeleVerifieEmail->executer();
			$count = $stmt3->rowCount();*/
			$unModele=new modele();
			$photo=$unModele->verserFichier("PhotoMembre", "photo", "default.png",$nomPhoto);
			$requete="INSERT INTO membre VALUES(0,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$unModele=new modele($requete,array($prenom,$nom,$courriel,$type,$statut,$codepostal,$ville,$province,$pays,$lng,$lat,$naissance,$profession,$sexe,$texte,$photo));
			$stmt=$unModele->executer();
			$id_membre = $unModele->getId();
			$requete2="INSERT INTO connexion values(?,?)";
			$modeleConn = new modele($requete2,array($id_membre,$motdepasse));
			$stmt2=$modeleConn->executer();
			$tabRes['action']="inscript";
			$tabRes['msg']="membre bien enregistre";
			chercheUserCreated($courriel);
			$tabRes['id_membre']=$_SESSION['u_id'];//$id_membre = $_SESSION['u_id'];
			$tabRes['u_prenom']=$_SESSION['u_prenom'];
			$tabRes['u_nom']=$_SESSION['u_nom'];
			$tabRes['u_ville']=$_SESSION['u_ville'];
			$tabRes['u_texte']=$_SESSION['u_texte'];
			$tabRes['u_photo']=$_SESSION['u_photo'];
		}catch(Exception $e){
			$tabRes['msg']="membre invalid";
		}finally{
			$unModele->deconnecter();
			$modeleConn->deconnecter();
			unset($modeleConn);
			unset($unModele);
		}
	}
	function chercheUserCreated($courriel){
		try{
			$requette="SELECT * FROM membre WHERE email=?";
			$modeleSession = new modele($requette,array($courriel));
			$stmt3=$modeleSession->executer();
			$ligne = $stmt3->fetch(PDO::FETCH_OBJ);
			$_SESSION['u_id'] = $ligne->id_membre;
			$_SESSION['u_prenom'] = $ligne->prenom;
			$_SESSION['u_nom'] = $ligne->nom;
			$_SESSION['u_email'] = $ligne->email;
			$_SESSION['u_ville'] = $ligne->ville;
			$_SESSION['u_texte'] = $ligne->texte;
			$_SESSION['u_type'] = $ligne->type;
			$_SESSION['u_statut'] = $ligne->statut;
			$_SESSION['u_photo'] = $ligne->photo;
		}catch(Exception $e){
		}finally{
			unset($modeleSession);
		}
	}
	//******************************************************
	//Contrôleur
	$action=$_POST['action'];
	switch($action){
		case "connecter" :
			connecter();
		break;
		case "inscription" :
			inscription();
		break;
	}
   echo json_encode($tabRes);
?>