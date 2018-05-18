<?php
	require_once("../includePDO/modele.inc.php");
	$tabRes=array();
	function rechercheAv(){
		global $tabRes;
		session_start();
		$distance=$_POST['distance'];
		$id_membre=$_SESSION['u_id'];
		if($_SESSION['u_region'] =="" && $distance=="Quartier"){
			$distance="Ville";
		}
		$quartier=$_SESSION['u_region'];
		$ville=$_SESSION['u_ville'];
		$province=$_SESSION['u_province'];
		$id_membre=$_SESSION['u_id'];
		$sport=$_POST['sport'];
		$requette="SELECT m.id_membre, m.prenom, m.nom as nomMembre,m.ville, m.texte, m.photo, m.longitude, m.latitude, s.nom as nomSport, ns.niveau, s.icone FROM membre m, niveau_sport ns, sport s WHERE ns.id_sport=s.id_sport AND m.id_membre = ns.id_membre AND ns.id_sport=? AND m.id_membre!=?";
		$tabRequestComp=array($sport,$id_membre);
		switch($distance){
			case "Quartier":
				$requette.=" AND m.quartier=?";
				$tabRequestComp[]=$quartier;
			break;
			case "Ville":
				$requette.=" AND m.ville=?";
				$tabRequestComp[]=$ville;
			break;
			case "Province":
				$requette.=" AND m.province=?";
				$tabRequestComp[]=$province;
			break;
		}
		if($_POST['sexe']!='default'){
			$sexe=$_POST['sexe'];
			$requette.=" AND m.sexe=?";
			$tabRequestComp[]=$sexe;
		}
		if($_POST['niveau']!='default'){
			$niveau =$_POST['niveau'];
			$requette.=" AND ns.niveau=?";
			$tabRequestComp[]=$niveau;
		}
		if($_POST['profession']!='default'){
			$profession =$_POST['profession'];
			$requette.=" AND m.profession=?";
			$tabRequestComp[]=$profession;
		}
		if($_POST['ageMin']!="" && $_POST['ageMax']==""){
			$ageMin=$_POST['ageMin'];
			$requette.=" AND m.age>=?";
			$tabRequestComp[]=$ageMin;
		}else if($_POST['ageMin']=="" && $_POST['ageMax']!=""){
			$ageMax=$_POST['ageMax'];
			$requette.=" AND m.age<=?";
			$tabRequestComp[]=$ageMax;
		}else if($_POST['ageMin']!="" && $_POST['ageMax']!=""){
			$ageMin=$_POST['ageMin'];
			$ageMax=$_POST['ageMax'];
			$requette.=" AND m.age BETWEEN ? AND ?";
			$tabRequestComp[]=$ageMin;
			$tabRequestComp[]=$ageMax;
		}
		try{
			//Recuperer ancienne pochette
			$unModele=new modele($requette,$tabRequestComp);
			$stmt=$unModele->executer();
			$nbResult=$stmt->rowCount();
			while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
			    $tabRes['listRecherche'][]=$ligne;
				$tabRes['sport'] = $ligne->nomSport;
				$tabRes['icone'] = $ligne->icone;
			}
			$tabRes['action']="rechercheAv";
			$tabRes['msg']="$nbResult membres pratiquent ce sport dans votre region";
		}catch(Exception $e){
		}finally{
			unset($unModele);
		}
	}
	function afficherProfileAutre($id_membre){
		global $tabRes;
		try{
			$requete="SELECT * FROM membre WHERE id_membre=?";
			$membreModele=new modele($requete,array($id_membre));
			$stmt=$membreModele->executer();
			$ligne = $stmt->fetch(PDO::FETCH_OBJ);
			$tabRes['autreMembre'][]=$ligne;
			$tabRes['action']="afficherProfileAutreVue";
			afficherSportProfAutre($id_membre);
			verifieAmi($id_membre);
		}catch(Exception $e){
			$tabRes['action']="cannotSeeProfile";
			$tabRes['msg']="Impossible de voir le profil";
		}finally{
			$membreModele->deconnecter();
		}
	}
	function afficherSportProfAutre($id_membre){
		//afficher le sport pour les membre autre et sont propre profile
		global $tabRes;
		try{
			$requette="SELECT ns.id_membre as id_membre, ns.id_sport as id_sport, ns.niveau as niveau, s.nom as nom FROM niveau_sport ns, sport s WHERE ns.id_sport=s.id_sport AND ns.id_membre=?";
			$membreModele2=new modele($requette,array($id_membre));
			$stmt=$membreModele2->executer();
			$nbResult=$stmt->rowCount();
			if($nbResult > 0){
				while($ligne=$stmt->fetch(PDO::FETCH_OBJ)){
					$tabRes['sportAutreMembre'][]=$ligne;
				}
				$tabRes['OK']="true";
			}else{
				$tabRes['OK']="false";
			}
		}catch(Exception $e){
		}finally{
			$membreModele2->deconnecter();
		}
	}
	function DemandeAmi($id_destinataire){
		global $tabRes;
		session_start();
		$id_moi = $_SESSION['u_id'];
		try{
			$requette="INSERT INTO reseau VALUES (?,?,NOW(),1)";
			$membreModele2=new modele($requette,array($id_moi,$id_destinataire));
			$stmt=$membreModele2->executer();
		}catch(Exception $e){
		}finally{
			$tabRes['msgDemande']="Demande Envoyez";
			$membreModele2->deconnecter();
		}
	}
	function verifieAmi($id_membre){
		global $tabRes;
		session_start();
		$id_moi = $_SESSION['u_id'];
		try{
			$requete="SELECT * FROM reseau WHERE id_membre=? AND id_ami=?";
			$verifieAmiModele=new modele($requete,array($id_moi,$id_membre));
			$stmt=$verifieAmiModele->executer();
			$count = $stmt->rowCount();
			if($count >0){
				$ligne = $stmt->fetch(PDO::FETCH_OBJ);
				if($ligne->statut == 1){
					$tabRes['msgDemande']="demandeDejaEnvoyez";
				}else if($ligne->statut == 2){
					$tabRes['msgDemande']="dejaAmi";
				}
			}else{
				try{
					$requette="SELECT * FROM reseau WHERE id_membre=? AND id_ami=?";
					$verifieAmiEnvoie=new modele($requette,array($id_membre,$id_moi));
					$stmt2=$verifieAmiEnvoie->executer();
					$count2= $stmt2->rowCount();
					if($count2 >0){
						$ligne2 = $stmt2->fetch(PDO::FETCH_OBJ);
						if($ligne2->statut == 1){
							$tabRes['msgDemande']="demandeRecu";
						}else if($ligne2->statut == 2){
							$tabRes['msgDemande']="dejaAmi";
						}
					}else{
						$verifieAmiModele->deconnecter();
						$tabRes['msgDemande']="aucuneDemande";
					}
				}catch(Exception $e){
				}finally{
					$verifieAmiEnvoie->deconnecter();
				}
			}
		}catch(Exception $e){
		}finally{
			$verifieAmiModele->deconnecter();
		}
	}
	//function ajouterSport
	//ajoute un sport 
	//function listSportSel
	//prend les sport dans la db et les envoies vers un Select
	//******************************************************
	//Contrôleur
	$action=$_POST['action'];
	if(isset($_POST['id_membre'])){
		$id_membre=$_POST['id_membre'];	
	}
	switch($action){
		case "rechercheAv" :
			rechercheAv();
		break;
		case "afficherProfileAutre":
			afficherProfileAutre($id_membre);
			break;
		case "DemandeAmi" :
			DemandeAmi($id_membre);
		break;
	}
    echo json_encode($tabRes);
?>