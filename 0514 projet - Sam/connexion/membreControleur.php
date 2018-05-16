<?php
	require_once("../includePDO/modele.inc.php");
	$tabRes=array();
	function connecter(){
		session_start();
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
			$id_membre = $ligne->id_membre;
			if($passwordC==$passwordDB){
				$tabRes['action']="connecter";
				$tabRes['username']=$emailC;
				chercheUserCreated($emailC);
				updateAgeDB($id_membre);
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
			$tabRes['msg']="Connexion a la base de donn�e impossible";
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
		if(isset($_POST['region'])){
			$quartier=$_POST['region'];
		}else{
			$quartier=null;
		}
		try{
			/*$requette3="SELECT * FROM membre WHERE email=?";
			$modeleVerifieEmail = new modele($requette3,array($courriel));
			$stmt3=$modeleVerifieEmail->executer();
			$count = $stmt3->rowCount();*/
			$unModele=new modele();
			$photo=$unModele->verserFichier("PhotoMembre", "photo", "default.png",$nomPhoto);
			$requete="INSERT INTO membre VALUES(0,?,?,?,?,?,?,?,?,?,?,?,?,?,0,?,?,?,?)";
			$unModele=new modele($requete,array($prenom,$nom,$courriel,$type,$statut,$codepostal,$ville,$quartier,$province,$pays,$lng,$lat,$naissance,$profession,$sexe,$texte,$photo));
			$stmt=$unModele->executer();
			$id_membre = $unModele->getId();
			$requete2="INSERT INTO connexion values(?,?)";
			$modeleConn = new modele($requete2,array($id_membre,$motdepasse));
			$stmt2=$modeleConn->executer();
			$tabRes['action']="inscript";
			$tabRes['msg']="membre bien enregistre";
			chercheUserCreated($courriel);
			updateAgeDB($id_membre);
			$tabRes['id_membre']=$_SESSION['u_id'];
			$tabRes['u_prenom']=$_SESSION['u_prenom'];
			$tabRes['u_nom']=$_SESSION['u_nom'];
			$tabRes['u_ville']=$_SESSION['u_ville'];
			$tabRes['u_region']=$_SESSION['u_region'];
			$tabRes['u_texte']=$_SESSION['u_texte'];
			$tabRes['u_photo']=$_SESSION['u_photo'];
		}catch(Exception $e){
			$tabRes['msg']="membre invalid";
		}finally{
		/*	$unModele->deconnecter();
			$modeleConn->deconnecter();*/
		}
	}
	function updateAgeDB($idMembre){
		global $tabRes;
		try{
			$requette="SELECT DATE_FORMAT(FROM_DAYS(DATEDIFF(NOW(), naissance)), \"%Y\")+0 as age FROM membre WHERE id_membre=?";
			$modeleSession = new modele($requette,array($idMembre));
			$stmt3=$modeleSession->executer();
			$ligne = $stmt3->fetch(PDO::FETCH_OBJ);
			$age = $ligne->age;
			$_SESSION['u_age'] = $age;
			$requette="UPDATE membre SET age=? WHERE id_membre=?";
			$modInsertAge = new modele($requette,array($age,$idMembre));
			$stmt4=$modInsertAge->executer();
		}catch(Exception $e){
		}finally{
			$modeleSession->deconnecter();
			$modInsertAge->deconnecter();
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
			$_SESSION['u_region'] = $ligne->quartier;
			$_SESSION['u_province'] = $ligne->province;
			$_SESSION['u_texte'] = $ligne->texte;
			$_SESSION['u_type'] = $ligne->type;
			$_SESSION['u_statut'] = $ligne->statut;
			$_SESSION['u_photo'] = $ligne->photo;
		}catch(Exception $e){
		}finally{
			$modeleSession->deconnecter();
		}
	}
	//******************************************************
	//Contr�leur
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