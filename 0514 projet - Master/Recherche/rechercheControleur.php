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
			$requete="SELECT * FROM membre WHERE  id_membre=?";
			$membreModele=new modele($requete,array($id_membre));
			$stmt=$membreModele->executer();
			$ligne = $stmt->fetch(PDO::FETCH_OBJ);
			$tabRes['autreMembre'][]=$ligne;
		}catch(Exception $e){
			$tabRes['action']="cannotSeeProfile";
			$tabRes['msg']="Impossible de voir le profil";
		}finally{
			$membreModele->deconnecter();
		}
	}
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
	}
    echo json_encode($tabRes);
?>